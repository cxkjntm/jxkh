 <?php require_once('Connections/connjxkh.php');//require('logincheck.php'); ?>

<?php
mysql_query('SET NAMES UTF8');
if (!isset($_SESSION)) {
  session_start();
}

$colname_rsdept = "-1";
if (isset($_SESSION['Admin_DeptID'])) {
  $colname_rsdept = (get_magic_quotes_gpc()) ? $_SESSION['Admin_DeptID'] : addslashes($_SESSION['Admin_DeptID']);
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsdept = sprintf("SELECT * FROM deptinfo WHERE DeptID = %s", $colname_rsdept);
$rsdept = mysql_query($query_rsdept, $connjxkh) or die(mysql_error());
$row_rsdept = mysql_fetch_assoc($rsdept);
$totalRows_rsdept = mysql_num_rows($rsdept);
$deptMemo=$row_rsdept["DeptMemo"];

//mysql_select_db($database_connjxkh, $connjxkh);
$mymenu="select MenuID,MenuName,MenuMid,Menu_URL from menuinfo where MenuID in (19,23)";
$result =mysql_query($mymenu, $connjxkh);
$a=7;
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
				<a href="#"><h5><font color="black">中层领导干部考核系统</font><h5></a>
			</div>
			<div class="left_open">
				<i title="展开左侧栏" class="iconfont">&#xe699;</i>
			</div>
			
			<ul class="layui-nav right" lay-filter="">
				<li class="layui-nav-item">
					<a href="javascript:;"><font color="black"><?php echo $_SESSION["Admin_Account"]?></font></a>
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
			$c=0;
			//小图标类型
			$b=array("&#xe6b2;","&#xe723;","&#xe6b8;");
			//获取父菜单
			while($row=mysql_fetch_row($result)){
				$ul = "select * from menuinfo where Pare_Menu_ID = ".$row[2];
				$result2 = mysql_query($ul,$connjxkh);
				//print_r($row);
				echo "<li ><a class='a' href='".$row[3]."'><i class='iconfont'>".$b[$c++]."</i><cite>".$row[1]."</cite><i class='iconfont nav_right'>&#xe697;</i></a><ul class='sub-menu'>";
				//获取子菜单
				while ($r= mysql_fetch_row($result2)) {
					//print_r($r);
					echo "<li><a class='a'  target='test2' href='".$r[3]."'><i class='iconfont'>&#xe6a7;</i><cite>".$r[1]."</cite></a></li>";
					
				} 
				if ($row[0]==19 and $deptMemo=='院部'){
					$url="person/view_member.php";
					$name="浏览9人考核小组成员";
					echo "<li><a class='a'  target='test2' href='".$url."'><i class='iconfont'>&#xe6a7;</i><cite>".$name."</cite></a></li>";
					$url="person/selectgroupmember.php";
					$name="选择9人考核小组成员";
					echo "<li><a class='a'  target='test2' href='".$url."'><i class='iconfont'>&#xe6a7;</i><cite>".$name."</cite></a></li>";
				}
				echo "</ul></li>";
				
					
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
</html>
<?php
mysql_free_result($rsdept);

//mysql_free_result($rsRoleMenu);
?>