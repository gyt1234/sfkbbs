<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
include_once '../inc/tool_inc.php';
$link=connect();
include_once 'inc/is_manage_login_inc.php';//验证管理员是否登录
phpinfo();
?>