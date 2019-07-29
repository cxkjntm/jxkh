<?php require_once('Connections/connjxkh.php');require('logincheck.php'); ?>

<?php
if (!isset($_SESSION)) {
  session_start();
}
$Account=$_SESSION['MM_Username'];
mysql_select_db($database_connjxkh, $connjxkh);

//查询用户等级
$mysql="select LevelID from userinfo where account='".$Account."'";
$rs = mysql_fetch_assoc(mysql_query($mysql, $connjxkh));

//查询对应用户等级的菜单
$mysql01="SELECT r.menu_id,m.MenuName,m.Menu_URL,m.Pare_Menu_ID FROM role_menu r,menuinfo m
			WHERE r.menu_id=m.MenuID AND role_id=".$rs['LevelID'];
$result01=mysql_query($mysql01, $connjxkh);

?>
<?php require_once('include/config.php'); ?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  echo iconv("GB2312","UTF-8",$zzmc.$xtmc); ?></title>
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="lib/menu/css/font.css">
        <link rel="stylesheet" type="text/css" href="lib/menu/css/weadmin.css">
        <link rel="stylesheet" type="text/css" href="lib/layui230/css/layui.css">
		<script src="lib/layui230/layui.js" charset="utf-8"></script>		
	</head>
	
		<style type="text/css">
	.a:hover {
    background-color: #FFFFE0;
	}
</style>
	<body>
	
		<!-- 顶部开始 -->
		<div class="container layui-bg-gray" style="background-image:url(images/top.png);">
			<div class="logo">
				<a href="menutest1.php"><h5><font color="black">中层领导干部考核系统</font><h5></a>
			</div>
			<div class="left_open">
				<i title="展开左侧栏" class="iconfont">&#xe699;</i>
			</div>
			
			<ul class="layui-nav right" lay-filter="">
				<li class="layui-nav-item">
					<a href="javascript:;"><font color="black"><?php echo $_SESSION["MM_Username"];?></font></a>
					<dl class="layui-nav-child">
						<!-- 二级菜单 -->											
						<dd>
							<a class="loginout" href="logout.php">退出</a>
						</dd>
					</dl>
				</li>				
			</ul>

		</div>
		<!-- 顶部结束 -->
		<!-- 中部开始 -->
		<!-- 左侧菜单开始 -->
		<div class="left-nav"  style="background-image:url(images/left.png);">
			<div id="side-nav" >
				<ul id="nav" >
			<?PHP 
				//用于循环的参数
				$c=0;$t1=0;
				//小图标类型
				$b=array("&#xe6b2;","&#xe723;","&#xe6b8;");
				while($row=mysql_fetch_row($result01)){
				//如果MenuID=1或3或10
				if($row[3]==0){
					if($t1!=0) echo "</ul></li>";
					echo "<li>
						<a class='a' href='".$row[2]."'>
								<i class='iconfont'>".$b[$c++]."</i>
								<cite>".$row[1]."</cite>
								<i class='iconfont nav_right'>&#xe697;
								</i></a>";
					echo "<ul class='sub-menu'>";
					$t1++;
				}
				 else{
					 echo "<li>
							 <a class='a'  href='".$row[2]."' target='test2'>
								 <i class='iconfont'>&#xe6a7;</i>
								 <cite>".$row[1]."</cite>
							 </a>
						 </li>";
				}
				}
			?>	
				</ul>
			</div>
		</div>
		<!-- <div class="x-slide_left"></div> -->
		<!-- 左侧菜单结束 -->
		<!-- 右侧主体开始 -->
		<div class="page-content" >
		<iframe name="test2" src='welcome.php' frameborder="0"
		scrolling="yes" class="weIframe" style="width:100%;height:100%;"></iframe>
		</div>
		<div class="page-content-bg"></div>
		<!-- 右侧主体结束 -->
		<!-- 中部结束 -->
		<!-- 底部开始 -->
		<div class="footer layui-bg-gray">
			<div class="copyright">Copyright ©2019 <?php echo iconv("GB2312","UTF-8",$zzmc.$ywbm);?>  技术支持由<?php echo iconv("GB2312","UTF-8",$jszc);?>提供</div>
		</div>
		<!-- 底部结束 -->
		<script type="text/javascript">
			layui.config({
			  base: '{/}lib/menu/js/'
			  ,version: '101100'
			}).use('admin');
			layui.use(['jquery','admin'], function(){
				var $ = layui.jquery;				
			});

		</script>
		
	</body>

</html>
<?php
//mysql_free_result($rsRoleMenu);
?>