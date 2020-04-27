<?php 
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
include_once '../inc/tool_inc.php';
$link=connect();
include_once 'inc/is_manage_login_inc.php';//验证管理员是否登录
if(isset($_POST['submit'])){
	//验证用户填写的信息
	$check_flag='add';
	include 'inc/check_father_module_inc.php';
		$query="insert into sfk_father_module(module_name,sort) values('{$_POST['module_name']}',{$_POST['sort']})";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			skip('father_module.php','ok','恭喜你，添加成功!');exit();
		}else{
			skip('father_module_add.php','error','对不起添加失败,请重试!');exit();
		}
}

$template['title']='添加父板块'; 
$template['css']=array('style/public.css');
?>

<?php include 'inc/header_inc.php'; ?>
<div id="main">
	<div class="title" style="margin-bottom: 20px;">添加父板块</div>
	<form method="post">
		<table class="au">
			<tr>
				<td>版块名称</td>
				<td><input name="module_name" type="text" /></td>
				<td>板块名称不能为空，最大不得超过66个字符</td>
			</tr>
			<tr>
				<td>排序</td>
				<td><input name="sort" value="0"　type="text" /></td>
				<td>填写一个数字即可</td>
			</tr>
		</table>
		<input style="margin-top:20px; cursor: pointer;" class="btn" type="submit" name="submit" value="添加" />
	</form>
</div>

<?php include 'inc/footer_inc.php'; ?>

<!--cursor: pointer控制鼠标为手型-->