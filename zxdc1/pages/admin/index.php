<?php require('checkin.php'); ?>
<?php require_once('../../include/config.php'); 
require('logincheck.php');
?>

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
        <link rel="stylesheet" type="text/css" href="../../lib/menu/css/font.css">
        <link rel="stylesheet" type="text/css" href="../../lib/menu/css/weadmin.css">
        <link rel="stylesheet" type="text/css" href="../../lib/layui230/css/layui.css">		
		<script src="../../lib/layui230/layui.js" ></script>	
	</head>

	<body>
		<!-- 顶部开始 -->
		<div class="container">
			<div class="logo">
				<a href=""><?php  echo iconv("GB2312","UTF-8",$zzmc.$xtmc); ?></a>
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
								<a target="iframe" href="dept/deptinfo.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览部门</cite>

								</a>
							</li>
							<li>
								<a target="iframe" href="dept/adddept.php">
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
								<a target="iframe" href="user/user.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览用户</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="user/adduser.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>单一添加用户</cite>
								</a>
							</li>
                            <li>
								<a target="iframe" href="user/uploadfile.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>上传用户文件</cite>
								</a>
							</li>
                            <li>
								<a target="iframe" href="user/exceltomysql_user.php">
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
								<a target="iframe" href="role/roleinfo.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>角色列表</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="role/addrole.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加角色</cite>
								</a>
							</li>
                           
						</ul>
					</li>
					
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6ce;</i>
							<cite>菜单管理</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a target="iframe" href="menu/menuinfo.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览菜单</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="menu/addMenu1.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加菜单</cite>
								</a>
							</li>							
						</ul>
					</li>
					
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6ce;</i>
							<cite>角色菜单管理</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a target="iframe" href="role/rolemenu.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览角色菜单</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="role/add_role_menu.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加角色菜单</cite>
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
								<a target="iframe" href="super/super.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>系统管理员</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="super_dept/super_dept.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>部门管理员</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="super/addsuper.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加系统管理员</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="super_dept/add_dept_admin.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加部门管理员</cite>
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6ce;</i>
							<cite>考核管理</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a target="iframe" href="question/questionnaire_list.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览考核设置</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="question/addtitle.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加新考核</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="result/selectvoteissue.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>平时调查结果展示</cite>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6ce;</i>
							<cite>综合中层干部考核结果</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a target="iframe" href="grades_view/get_dept_grade.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>领导班子考核结果量化</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="grades_view/get_person_grade.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>领导成员考核结果量化</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="../../voteinformation/admin_view.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>人员参与详情</cite>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
							<i class="iconfont">&#xe6ce;</i>
							<cite>考核通知</cite>
							<i class="iconfont nav_right">&#xe697;</i>
						</a>
						<ul class="sub-menu">
							<li>
								<a target="iframe" href="note/noteinfo.php">
									<i class="iconfont">&#xe6a7;</i>
									<cite>浏览考核通知</cite>
								</a>
							</li>
							<li>
								<a target="iframe" href="note/addnote.html">
									<i class="iconfont">&#xe6a7;</i>
									<cite>添加考核通知</cite>
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
			<iframe src='welcome.html' name="iframe" frameborder="0" scrolling="yes" class="weIframe" style="width:100%;height:100%;"></iframe>
		</div>
		<div class="page-content-bg"></div>
		<!-- 右侧主体结束 -->
		<!-- 中部结束 -->
		<!-- 底部开始 -->
		<div class="footer">
			<div class="copyright">Copyright ©2019 河南城建学院    技术支持：柳运昌 阙文斌 刘孝炎</div>
		</div>
		<!-- 底部结束 -->
		<script type="text/javascript">
			layui.config({
			  base: '/zxdc1/lib/menu/js/'
			  ,version: '101100'
			}).use('admin');
			layui.use(['jquery','admin'], function(){
				var $ = layui.jquery;				
			});

		</script>
	</body>

</html>