<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
include_once '../inc/tool_inc.php';

$link=connect();
include_once 'inc/is_manage_login_inc.php';//验证管理员是否登录
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('son_module.php','error','id参数错误！'); exit();
}
$query="select * from sfk_son_module where id={$_GET['id']}";
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
	skip('son_module.php','error','这条子版块信息不存在！');exit();
}
$data=mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){
	//验证用户填写的信息
	$check_flag='update';
	include 'inc/check_son_module_inc.php';
	$query="update sfk_son_module set father_module_id={$_POST['father_module_id']},module_name='{$_POST['module_name']}',info='{$_POST['info']}',member_id={$_POST['member_id']},sort={$_POST['sort']} where id={$_GET['id']}";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		skip('son_module.php','ok','修改成功！'); exit();
	}else{
		skip('son_module.php','error','修改失败,请重试！'); exit();
	}
}
$template['title']='子版块修改页'; 
$template['css']=array('style/public.css');
?>
<?php include 'inc/header_inc.php'; ?>
<div id="main">
	<div class="title" style="margin-bottom: 20px;">修改子板块- <?php echo $data['module_name'] ?></div>
		<form method="post">
		<table class="au">
			<tr>
				<td>所属父板块</td>
				<td>
					<select name="father_module_id">
						<option value="0">===请选择一个父板块===</option>
						<?php
						$query="select * from sfk_father_module";
						$result_father=execute($link,$query);
						while($data_father=mysqli_fetch_assoc($result_father)){
							if($data['father_module_id']==$data_father['id']){
								echo "<option selected='selected' value='{$data_father['id']}'>{$data_father['module_name']}</option>";
							}else{
								echo "<option value='{$data_father['id']}'>{$data_father['module_name']}</option>";
							}
						}
						?>
					</select>
				</td>
				<td>必须选择一个所属的父板块</td>
			</tr>
			<tr>
				<td>板块名称</td>
				<td><input name="module_name" value="<?php echo $data['module_name'] ?>" type="text" /></td>
				<td>板块名称不能为空，最大不得超过66个字符</td>
			</tr>
			<tr>
				<td>板块简介</td>
				<td>
					<textarea name="info"><?php echo $data['info'] ?></textarea>
				</td>
				<td>板块简介最大不得超过255个字符</td>
			</tr>
			<tr>
				<td>版主</td>
				<td>
					<select name="member_id">
						<option value="0">===请选择一个会员作为版主===</option>
					</select>
				</td>
				<td>你可以选择一个会员作为版主，也可以不选</td>
			</tr>
			<tr>
				<td>排序</td>
				<td><input name="sort" value="<?php echo $data['sort'] ?>"　type="text" /></td>
				<td>填写一个数字即可</td>
			</tr>
		</table>
		<input style="margin-top:20px; cursor: pointer;" class="btn" type="submit" name="submit" value="修改" />
	</form>
</div>
<?php include 'inc/footer_inc.php'; ?>