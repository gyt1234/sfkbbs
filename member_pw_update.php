<?php 
include_once 'inc/config_inc.php';
include_once 'inc/mysql_inc.php';
include_once 'inc/tool_inc.php';
$link=connect();
if(!$member_id=is_login($link)){
	skip('login.php', 'error', '请登录之后再对自己的头像做设置!');exit();
}
$query="select * from sfk_member where id={$member_id}";
$result_member=execute($link,$query);
$data_member=mysqli_fetch_assoc($result_member);
if(isset($_POST['submit'])){
		if(mb_strlen($_POST['new_pw'])<6){
			skip('member_pw_update.php','error','密码不得少于6位!');exit();
		}
		$query="update sfk_member set pw=md5({$_POST['new_pw']}) where id={$member_id}";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			skip("member.php?id={$member_id}",'ok','密码修改成功！');exit();
		}else{
			skip('member_pw_update.php','error','密码修改失败，请重试');exit();
		}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<style type="text/css">
body {
	font-size:18px;
	font-family:微软雅黑;
}
h2 {
	padding:0 0 10px 0;
	border-bottom: 1px solid #e3e3e3;
	color:#444;
}
.submit {
	background-color: #3b7dc3;
	color:#fff;
	padding:5px 22px;
	border-radius:2px;
	border:0px;
	cursor:pointer;
	font-size:14px;
}
#main {
	width:30%;
	margin:0 auto;
}#main label{
	width: 50px;
	height: 20px
	font-size:20px;
}
.pw{
	height: 20px;
	margin-bottom: 10px;
}
</style>
</head>
<body>
<div id="main">
	<h2>修改密码</h2>
	<form method="post" enctype="multipart/form-data">
		<label>原密码：<input class="pw" type="password" name="pw" value="<?php echo $data_member['pw']?>" /></label><br/>
		<label>新密码：<input class="pw" type="password" name="new_pw" /></label><br/>
		<input class="submit" type="submit" name="submit" value="保存" />
		<div style="clear:both;"></div>
	</form>
</div>
</body>
</html>
