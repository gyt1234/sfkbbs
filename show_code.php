<?php
//显示验证码
session_start();
include_once 'inc/vcode_inc.php';
$_SESSION['vcode']=vcode(100,40,30,4);
?>