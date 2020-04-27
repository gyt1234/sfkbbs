<?php
define('AAA',true);//通过定义常量可以使引入的inc下面的文件用浏览器打开不会出错
include_once './inc/config_inc.php';
include_once './inc/mysql_inc.php';
include_once './inc/tool_inc.php';
$link=connect();
if(!$member_id=is_login($link)){
	skip('login.php', 'error', '请登录之后再做回复!');exit();
}
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('index.php', 'error', '帖子id参数不合法!');exit();
}
$query="select sc.id,sc.title,sm.name from sfk_content sc,sfk_member sm where sc.id={$_GET['id']} and sc.member_id=sm.id";
$result_content=execute($link,$query);
if(mysqli_num_rows($result_content)!=1){
	skip('index.php', 'error', '您要回复的帖子不存在!');exit();
}
if(isset($_POST['submit'])){
	include 'inc/check_reply_inc.php';
	$_POST=escape($link,$_POST);//对特殊字符进行转义，以影响入库
	$query="insert into sfk_reply(content_id,content,time,member_id) values ({$_GET['id']},'{$_POST['content']}',now(),{$member_id})";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		skip("show.php?id={$_GET['id']}", 'ok', '回复成功!');exit();
	}else{
		skip($_SERVER['REQUEST_URI'], 'error', '回复失败,请重试!');exit();
	}
}
$data_content=mysqli_fetch_assoc($result_content);
$data_content['title']=htmlspecialchars($data_content['title']);//防止用户发帖时嵌入html代码

$template['title']='帖子回复页';
$template['css']=array('style/public.css','style/publish.css');
?>

<?php include 'inc/header_inc.php'; ?>

<div id="position" class="auto">
	 <a href="index.php">首页</a> &gt; 回复帖子
</div>
<div id="publish">
	<div>回复：由 <?php echo $data_content['name']?> 发布的 <?php echo $data_content['title']?></div>
	<form method="post">
		<textarea name="content" class="content"></textarea>
		<input class="reply" type="submit" name="submit" value="" />
		<div style="clear:both;"></div>
	</form>
</div>
<?php include 'inc/footer_inc.php'; ?>
