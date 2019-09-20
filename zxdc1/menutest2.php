<?php require_once('Connections/connjxkh.php');require('logincheck.php'); ?>

<?php
if (!isset($_SESSION)) {
  session_start();
}
$Account=$_SESSION['MM_Username'];
mysql_select_db($database_connjxkh, $connjxkh);

//查询用户等级
$mysql="select LevelID, IsDB from userinfo where account='".$Account."'";
$rs = mysql_fetch_assoc(mysql_query($mysql, $connjxkh));
			
//校领导菜单,中层副职领导菜单
if($rs['LevelID']==1||$rs['LevelID']==3){
	$mymenu="select MenuID,MenuName,Menu_URL from menuinfo where MenuID in (1,2,3,4,5,10,11,12)";
	$result =mysql_query($mymenu, $connjxkh);
	$a=5;//综合考核菜单,二级菜单结束的id
}

//中层正职领导菜单
if($rs['LevelID']==2){
	$mymenu="select MenuID,MenuName,Menu_URL from menuinfo where MenuID in (1,2,3,4,5,6,10,11,12)";
	$result =mysql_query($mymenu, $connjxkh);
	$a=6;
}

//学院职工菜单
if($rs['LevelID']==6){
	if ($rs['IsDB']==1){
		$mymenu="select MenuID,MenuName,Menu_URL from menuinfo where MenuID in (1,2,3,7,8,10,11,12)";
		$a=8;
	}
	else {
		$mymenu="select MenuID,MenuName,Menu_URL from menuinfo where MenuID in (1,2,3,7,10,11,12)";
		$a=7;
	}
		
	$result =mysql_query($mymenu, $connjxkh);
	
}
//科室职工菜单
if($rs['LevelID']==5){
	$mymenu="select MenuID,MenuName,Menu_URL from menuinfo where MenuID in (1,2,3,7,9,10,11,12)";
	$result =mysql_query($mymenu, $connjxkh);
	$a=9;
}
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
			//
			if($rs['LevelID'] !=1&&$rs['LevelID']!=2&&$rs['LevelID']!=3&&$rs['LevelID']!=5&&$rs['LevelID']!=6){
				echo "<li>
						<a href='javascript:;'>
							<i class='iconfont'>&#xe723;</i>
							<cite>账户管理</cite>
							<i class='iconfont nav_right'>&#xe697;</i>
						</a>
						<ul class='sub-menu'>
							<li>
								<a target='test2' href='getUserInfo.php'>
									<i class='iconfont'>&#xe6a7;</i>
									<cite>个人信息</cite>
								</a>
							</li>
							<li>
								<a target='test2' href='myPwd.php'>
									<i class='iconfont'>&#xe6a7;</i>
									<cite>修改密码</cite>
								</a>
							</li>
						</ul>
					</li>";
			}else{
			//用于循环的参数
			$c=0;
			//小图标类型
			$b=array("&#xe6b2;","&#xe723;","&#xe6b8;");
			while($row=mysql_fetch_row($result)){
				//如果MenuID=1或3或10
				if($row[0]==1||$row[0]==3||$row[0]==10){
					echo "<li ><a class='a' href='".$row[2]."'><i class='iconfont'>".$b[$c++]."</i><cite>".$row[1]."</cite><i class='iconfont nav_right'>&#xe697;</i></a><ul class='sub-menu'>";}
				else if($rs['LevelID']==1&&$row[0]==6)
					echo "<li><a class='a'  target='test2' href='".$row[2]."'><i class='iconfont'>&#xe6a7;</i><cite>校领导评中层班子</cite></a></li>";
				else if($rs['LevelID']==1&&$row[0]==5)
					echo "<li><a class='a' target='test2' href='".$row[2]."'><i class='iconfont'>&#xe6a7;</i><cite>校领导评中层干部</cite></a></li>";
				else
					echo "<li><a class='a'  href='".$row[2]."' target='test2'><i class='iconfont'>&#xe6a7;</i><cite>".$row[1]."</cite></a></li>";
				if($row[0]==2||$row[0]==$a||$row[0]==12){echo "</ul></li>";}
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
		<iframe name="test2" src='welcome.php' frameborder="0" scrolling="yes" class="weIframe" style="width:100%;height:100%;"></iframe>
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
	<!--Tab菜单右键弹出菜单-->
	<ul class="rightMenu" id="rightMenu">
        <li data-type="fresh">刷新</li>
        <li data-type="current">关闭当前</li>
        <li data-type="other">关闭其它</li>
        <li data-type="all">关闭所有</li>
    </ul>

</html>
<?php
//mysql_free_result($rsRoleMenu);
?>