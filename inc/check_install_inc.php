<?php
if(!defined('AAA')){
	exit(':((');
}
if(empty($_POST['db_host'])){
	exit('数据库地址不能为空!<a href="install.php">点击返回</a>');
}
if(empty($_POST['db_port'])){
	exit('数据库端口不能为空!<a href="install.php">点击返回</a>');
}
if(empty($_POST['db_user'])){
	exit('数据库用户名不能为空!<a href="install.php">点击返回</a>');
}
if(!isset($_POST['db_pw'])){
	exit('数据库密码不存在!<a href="install.php">点击返回</a>');
}
if(empty($_POST['db_database'])){
	exit('数据库名称不能为空!<a href="install.php">点击返回</a>');
}
$_POST['manage_name']='admin';
if(empty($_POST['manage_pw']) || mb_strlen($_POST['manage_pw'])<6 ){
	exit('后台管理员密码不得少于6位!<a href="install.php">点击返回</a>');
}
if(empty($_POST['manage_pw_confirm']) || $_POST['manage_pw']!=$_POST['manage_pw_confirm']){
	exit('两次密码输入不一致!<a href="install.php">点击返回</a>');
}
$link=@mysqli_connect($_POST['db_host'],$_POST['db_user'],$_POST['db_pw'],'',$_POST['db_port']);
if(mysqli_connect_error()){
    	exit('数据库密码连接失败，请填写正确的数据库连接信息!<a href="install.php">点击返回</a>');
    }
mysqli_set_charset($link,'utf8');
if(!mysqli_select_db($link,$_POST['db_database'])){//如果数据库名称不存在，则创建数据库
 	$query="CREATE DATABASE IF NOT EXISTS `{$_POST['db_database']}` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
 	mysqli_query($link,$query);
 	if(mysqli_errno($link)){
		exit('数据库密创建失败，请检查数据库权限!<a href="install.php">点击返回</a>');
	}
	mysqli_select_db($link,$_POST['db_database']);
 }
?>