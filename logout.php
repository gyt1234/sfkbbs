<?php 
include_once './inc/config_inc.php';
include_once './inc/mysql_inc.php';
include_once './inc/tool_inc.php';
$link=connect();
$member_id=is_login($link);
if(!$member_id){
	skip('index.php','error','你没有登录，不需要退出！');exit();
}
setcookie('sfk[name]','',time()-3600);//设置为过去的时间即可
setcookie('sfk[pw]','',time()-3600);
skip('index.php','ok','退出成功！');exit();

?>
