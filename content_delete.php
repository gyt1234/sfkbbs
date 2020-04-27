<?php
include_once './inc/config_inc.php';
include_once './inc/mysql_inc.php';
include_once './inc/tool_inc.php';
$link=connect();
$is_manage_login=is_manage_login($link);//验证是否是后台管理员
$member_id=is_login($link);
if(!$member_id && !$is_manage_login){//如果既不是前台用户，也不是后台管理员，则需要重新登录
	skip('login.php', 'error', '您没有登录!');exit();
}
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('index.php', 'error', '帖子id参数不合法!');exit();
}
$query="select member_id from sfk_content where id={$_GET['id']}";
$result_content=execute($link, $query);
if(mysqli_num_rows($result_content)==1){
	$data_content=mysqli_fetch_assoc($result_content);
	if(check_user($member_id,$data_content['member_id'],$is_manage_login)){
		$query="delete from sfk_content where id={$_GET['id']}";
		execute($link, $query);
		if(isset($_GET['return_url'])){
				$return_url=$_GET['return_url'];
			}else{
				$return_url="member.php?id={$member_id}";
			}
		if(mysqli_affected_rows($link)==1){
			skip($return_url, 'ok', '恭喜你，删除成功!');exit();
		}else{
			skip($return_url, 'error', '对不起删除失败!');exit();
		}
	}else{
		skip('index.php', 'error', '这个帖子不属于你，你没有权限!');exit();
	}
}else{
	skip('index.php', 'error', '帖子不存在!');exit();
}
?>