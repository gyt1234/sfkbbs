<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
include_once '../inc/tool_inc.php';

$link=connect();
include_once 'inc/is_manage_login_inc.php';//验证管理员是否登录
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('son_module.php','error','id参数错误！'); exit();
}
$query="select * from sfk_manage where id={$_GET['id']}";
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
	skip('manage.php','error','这条管理员信息不存在！');exit();
}
$data=mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){
	//验证用户填写的信息
	$check_flag='update';
	include 'inc/check_manage_inc.php';
	$query="update sfk_manage set name='{$_POST['name']}',level={$_POST['level']},pw=md5({$_POST['pw']}),create_time=now() where id={$_GET['id']}";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		skip('manage.php','ok','修改成功！'); exit();
	}else{
		skip('manage.php','error','修改失败,请重试！'); exit();
	}
}
$template['title']='管理员修改页'; 
$template['css']=array('style/public.css');
?>
<?php include 'inc/header_inc.php'; ?>
<div id="main">
	<div class="title" style="margin-bottom: 20px;">修改管理员- <?php echo $data['name'] ?></div>
		<form method="post">
		<table class="au">
			<tr>
				<td>管理员名称</td>
				<td><input name="name" value="<?php echo $data['name'] ?>" type="text" /></td>
				<td>管理员名称不能为空，最大不得超过32个字符</td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="pw" />
				<td>管理员名称不能为空，最大不得超过32个字符</td>
			</tr>
			<tr>
				<td>等级</td>
				<td><input name="level" value="<?php echo $data['level'] ?>"　type="text" /></td>
				<td>0代表超级管理员，1代表普通管理员</td>
			</tr>
		</table>
		<input style="margin-top:20px; cursor: pointer;" class="btn" type="submit" name="submit" value="修改" />
	</form>
</div>
<?php include 'inc/footer_inc.php'; ?>