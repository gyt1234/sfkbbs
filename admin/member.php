<?php
include_once '../inc/config_inc.php';
include_once '../inc/mysql_inc.php';
include_once '../inc/tool_inc.php';
$link=connect();
include_once 'inc/is_manage_login_inc.php';//验证管理员是否登录
$template['title']='管理员列表页'; 
$template['css']=array('style/public.css');
?>
<?php include 'inc/header_inc.php'; ?>
<div id="main">
	<div class="title">用户列表</div>
	<table class="list">
		<tr>
			<th>名称</th>	 	 	
			<th>注册日期</th>
			<th>上一次登录时间</th>
			<th>操作</th>
		</tr>
		<?php
			$query="select * from sfk_member";
			$result=execute($link,$query);
			while($data=mysqli_fetch_assoc($result)){
				$url=urlencode("member_delete.php?id={$data['id']}");
				$return_url=urlencode($_SERVER['REQUEST_URI']);
				$message="你真的要删除用户 {$data['name']} 吗?";
				$delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
$html=<<<A
            	<tr>
					<td>{$data['name']} [id:{$data['id']}]</td>
			    	<td>{$data['register_time']}</td>
			    	<td>{$data['last_time']}</td>
			    	<td><a href="{$delete_url}">[删除]</a></td>
             	</tr>
A;
					echo $html;		    
				}
			?>	
	</table>
</div>
<?php include 'inc/footer_inc.php'; ?>