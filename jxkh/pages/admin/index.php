<?php require('checkin.php'); ?>
<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>在线问卷调查系统后台管理</title>
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="../../lib/menu/css/font.css">
        <link rel="stylesheet" type="text/css" href="../../lib/menu/css/weadmin.css">
        <link rel="stylesheet" type="text/css" href="../../lib/layui245/css/layui.css">		
		<script src="../../lib/layui230/layui.js" ></script>		
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
					<a href="javascript:;">Admin</a>
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
							<cite>部门管理</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="dept/deptinfo.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览部门</cite>

								</a>
							</li>
							<li>
								<a _href="dept/adddept.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加部门</cite>

								</a>
							</li>							
						</ul>
					</li>
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe705;</i>
							<cite>用户管理</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="user/user.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览用户</cite>
								</a>
							</li>
							<li>
								<a _href="user/adduser.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>单一添加用户</cite>
								</a>
							</li>
                            <li>
								<a _href="user/uploadfile.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>上传用户文件</cite>
								</a>
							</li>
                            <li>
								<a _href="user/exceltomysql_user.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>批量添加用户</cite>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe723;</i>
							<cite>角色管理</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="role/roleinfo.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>角色列表</cite>
								</a>
							</li>
							<li>
								<a _href="role/addrole.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加角色</cite>
								</a>
							</li>
                           
						</ul>
					</li>
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe726;</i>
							<cite>管理员管理</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="super/super.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览管理员</cite>
								</a>
							</li>
							<li>
								<a _href="super/addsuper.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加管理员</cite>
								</a>
							</li>
							
						</ul>
					</li>
					
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6ce;</i>
							<cite>调查问卷</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="question/questionnaire_list.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览调查问卷</cite>
								</a>
							</li>
							<li>
								<a _href="question/addtitle.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加调查问卷</cite>
								</a>
							</li>
							<li>
								<a _href="result/selectvoteissue.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>调查结果展示</cite>
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6ce;</i>
							<cite>调查通知</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="note/noteinfo.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览通知</cite>
								</a>
							</li>
							<li>
								<a _href="note/addnote.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加通知</cite>
								</a>
							</li>
							
						</ul>
					</li>
					
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6ce;</i>
							<cite></cite>菜单管理
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a _href="menu/menuinfo.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览菜单</cite>
								</a>
							</li>
							<li>
								<a _href="menu/addmenu.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加菜单</cite>
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
					<li>我的桌面</li>
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
			  base: '/jxkh/lib/menu/js/'
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