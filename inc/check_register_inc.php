<?php
if(!defined('AAA')){
	exit(':((');
}
if(empty($_POST['name'])){
	skip('register.php','error','用户名不得为空!');exit();

}
if(mb_strlen($_POST['name'])>32){
	skip('register.php','error','用户名不得超过32个字符!');exit();
}
if(empty($_POST['pw'])){
	skip('register.php','error','密码不得为空!');exit();

}
if(mb_strlen($_POST['pw'])<6){
	skip('register.php','error','密码不得少于6位!');exit();
}
if(empty($_POST['confirm_pw'])){
	skip('register.php','error','确认密码不得为空!');exit();

}
if($_POST['pw']!=$_POST['confirm_pw']){
	skip('register.php','error','两次密码输入不一致!');exit();
}
if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){ //验证码不区分大小写
	skip('register.php','error','验证码输入错误!');exit();
}
$_POST=escape($link,$_POST);//转义
$query="select * from sfk_member where name='{$_POST['name']}'";
$result=execute($link,$query);
if(mysqli_num_rows($result)){
	skip('register.php','error','这个用户名已经被别人注册了!');exit();
}
?>