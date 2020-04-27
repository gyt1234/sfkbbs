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
	skip('index.php', 'error', '帖子回复id参数不合法!');exit();
}
$query="select sc.id,sm.name from sfk_content sc,sfk_member sm where sc.id={$_GET['id']} and sc.member_id=sm.id";
$result_content=execute($link, $query);
if(mysqli_num_rows($result_content)!=1){
	skip('index.php', 'error', '您要回复的帖子不存在!');exit();
}
$data_content=mysqli_fetch_assoc($result_content);
if(!isset($_GET['reply_id']) || !is_numeric($_GET['reply_id'])){
	skip('index.php', 'error', '您要删除的回复id参数不合法!');exit();
}
$query="select sfk_reply.member_id from sfk_reply,sfk_member where sfk_reply.id={$_GET['reply_id']} and sfk_reply.content_id={$_GET['id']} and sfk_reply.member_id=sfk_member.id";
$result_reply=execute($link, $query);
if(mysqli_num_rows($result_reply)!=1){
	skip('index.php', 'error', '您要删除的回复不存在!');exit();
}else{
	$data_reply=mysqli_fetch_assoc($result_reply);
	if(check_user($member_id,$data_reply['member_id'],$is_manage_login)){
		$query="delete from sfk_reply where id={$_GET['reply_id']}";
		execute($link, $query);
		if(isset($_GET['return_url'])){
				$return_url=$_GET['return_url'];
			}else{
				$return_url="show.php?id={$_GET['id']}";
			}
		if(mysqli_affected_rows($link)==1){
			skip($return_url, 'ok', '恭喜你，删除成功!');exit();
		}else{
			skip($return_url, 'error', '对不起删除失败!');exit();
		}
	}else{
		skip('index.php', 'error', '这个帖子不属于你，你没有权限!');exit();
	}
}
?>