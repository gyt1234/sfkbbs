<?php
if(!defined('AAA')){
	exit(':((');
} 
if(empty($_POST['module_id']) || !is_numeric($_POST['module_id'])){
	skip('publish.php', 'error', '所属版块id不合法！');exit();
}
$query="select * from sfk_son_module where id={$_POST['module_id']}";
$result=execute($link, $query);
if(mysqli_num_rows($result)!=1){
	skip('publish.php', 'error', '请选择一个所属板块！');exit();
}
if(empty($_POST['title'])){
	skip('publish.php', 'error', '标题不得为空！');exit();
}
if(mb_strlen($_POST['title'])>255){
	skip('publish.php', 'error', '标题不得超过255个字符！');exit();
}
?>