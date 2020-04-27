<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
include_once '../inc/tool_inc.php';
$link=connect();
if(!is_manage_login($link)){
	header('Location:login.php');//跳转到登录页面
}
session_unset();
session_destroy();
setcookie(session_name(),'',time()-3600,'/');
header('Location:login.php');

?>