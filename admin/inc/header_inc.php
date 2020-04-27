<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo $template['title'] ?></title>
<meta name="keywords" content="后台界面" />
<meta name="description" content="后台界面" />
<?php
foreach ($template['css'] as $var) {
	echo "<link rel='stylesheet' type='text/css' href='{$var}' />";
}
?>

</head>
<body>
<!--top部分-->
<div id="top">
		<div class="logo">
			管理中心
		</div>
		<ul class="nav">
			<li><a href="http://www.sifangku.com" target="_blank">私房库</a></li>
			<li><a href="http://www.sifangku.com" target="_blank">私房库</a></li>
		</ul>
		<div class="login_info">
			<a href="../index.php" style="color:#fff;" target="_blank">网站首页</a>&nbsp;|&nbsp;
			管理员： <?php echo $_SESSION['manage']['name']?> &nbsp; <a href="logout.php">[注销]</a>
		</div>
</div>
<!--下左边部分-->
<div id="sidebar">
		<ul>
			<li>
				<div class="small_title">系统</div>
				<ul class="child">
					<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='index.php'){echo 'class="current"';} ?> href="index.php">后台首页</a></li>
					<li><a  <?php if(basename($_SERVER['SCRIPT_NAME'])=='manage.php'){echo 'class="current"';} ?> href="manage.php">管理员列表</a></li>
					<li><a  <?php if(basename($_SERVER['SCRIPT_NAME'])=='manage_add.php'){echo 'class="current"';} ?> href="manage_add.php">添加管理员</a></li>
					<li><a  <?php if(basename($_SERVER['SCRIPT_NAME'])=='web_set.php'){echo 'class="current"';} ?> href="web_set">站点设置</a></li>
				</ul>
			</li>
			<li><!--  class="current" -->
				<div class="small_title">内容管理</div>
				<ul class="child">
					<li><a  <?php if(basename($_SERVER['SCRIPT_NAME'])=='father_module.php'){echo 'class="current"';} ?> href="father_module.php">父板块列表</a></li>
					<li><a  <?php if(basename($_SERVER['SCRIPT_NAME'])=='father_module_add.php'){echo 'class="current"';} ?> href="father_module_add.php">添加父板块</a></li>
					<?php
					if(basename($_SERVER['SCRIPT_NAME'])=='father_module_update.php'){//获取当前页面的名字
						echo '<li><a class="current">修改父板块</a></li>';
					}
					?>
					<li><a  <?php if(basename($_SERVER['SCRIPT_NAME'])=='son_module.php'){echo 'class="current"';} ?> href="son_module.php">子板块列表</a></li>
					<li><a  <?php if(basename($_SERVER['SCRIPT_NAME'])=='son_module_add.php'){echo 'class="current"';} ?> href="son_module_add.php">添加子板块</a></li>
					<?php
					if(basename($_SERVER['SCRIPT_NAME'])=='son_module_update.php'){//获取当前页面的名字
						echo '<li><a class="current">修改子板块</a></li>';
					}
					?>
					<li><a  target="_blank" <?php if(basename($_SERVER['SCRIPT_NAME'])=='../index.php'){echo 'class="current"';} ?> href="../index.php">帖子管理</a></li>
				</ul>
			</li>
			<li>
				<div class="small_title">用户管理</div>
				<ul class="child">
					<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='member.php'){echo 'class="current"';} ?> href="member.php">用户列表</a></li>
				</ul>
			</li>
		</ul>
</div>
