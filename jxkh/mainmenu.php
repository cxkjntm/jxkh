<?php require('checkin.php'); ?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>在线问卷调查系统</title>
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

	<body>
		<!-- 顶部开始 -->
		<div class="container">
			<div class="logo">
				<a href="index.html">在线问卷调查系统</a>
			</div>
			<div class="left_open">
				<i title="展开左侧栏" class="iconfont">&#xe699;</i>
			</div>
			
			<ul class="layui-nav right" lay-filter="">
				<li class="layui-nav-item">
					<a href="javascript:;"><?php echo $_SESSION["MM_Username"]?></a>
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
		<div class="left-nav">
			<div id="side-nav">
				<ul id="nav">
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6b8;</i>
							<cite>问卷调查</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="checktime.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>参与调查</cite>

								</a>
							</li>
												
						</ul>
					</li>
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6b8;</i>
							<cite>平常调查</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="pages/admin/check/index.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>参与调查</cite>

								</a>
							</li>
												
						</ul>
					</li>
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe723;</i>
							<cite>账户管理</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="getUserInfo.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>个人信息</cite>
								</a>
							</li>
							<li>
								<a _href="myPwd.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>修改密码</cite>
								</a>
							</li>
                            
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
		<!-- <div class="x-slide_left"></div> -->
		<!-- 左侧菜单结束 -->
		<!-- 右侧主体开始 -->
		<div class="page-content">
			<div class="layui-tab tab" lay-filter="wenav_tab" id="WeTabTip" lay-allowclose="true">
				<ul class="layui-tab-title" id="tabName">
					<li>欢迎你</li>
				</ul>
				<div class="layui-tab-content">
					<div class="layui-tab-item layui-show">
						<iframe src='welcome.html' frameborder="0" scrolling="yes" class="weIframe"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="page-content-bg"></div>
		<!-- 右侧主体结束 -->
		<!-- 中部结束 -->
		<!-- 底部开始 -->
		<div class="footer">
			<div class="copyright">Copyright ©2018 ****有限公司   技术支持：河南城建学院</div>
		</div>
		<!-- 底部结束 -->
		<script type="text/javascript">
//			layui扩展模块的两种加载方式-示例
//		    layui.extend({
//			  admin: '{/}../../static/js/admin' // {/}的意思即代表采用自有路径，即不跟随 base 路径
//			});
//			//使用拓展模块
//			layui.use('admin', function(){
//			  var admin = layui.admin;
//			});
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