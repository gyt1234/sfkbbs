<?php
if(!defined('AAA')){
	exit(':((');
}
if(empty($_POST['name'])){
	skip('login.php','error','用户名不得为空!');exit();

}
if(mb_strlen($_POST['name'])>32){
	skip('login.php','error','用户名不得超过32个字符!');exit();
}
if(empty($_POST['pw'])){
	skip('login.php','error','密码不得为空!');exit();

}
if(mb_strlen($_POST['pw'])<6){
	skip('login.php','error','密码不得少于6位!');exit();
}
if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){ //验证码不区分大小写
	skip('login.php','error','验证码输入错误!');exit();
}
if(empty($_POST['time']) || !is_numeric($_POST['time']) || $_POST['time']>2592000){
	$_POST['time']=2592000;

}


?>
