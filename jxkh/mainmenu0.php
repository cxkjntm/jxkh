<?php require_once('Connections/connjxkh.php'); ?>
<?php

if (!isset($_SESSION)) {
  session_start();
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
	$colname_rsUser1 = 'admin888';
	if(isset($_SESSION['MM_Username']))
	  $colname_rsUser1=$_SESSION['MM_Username'];
	mysql_query('SET NAMES UTF8');  
	mysql_select_db($database_connjxkh, $connjxkh);
	$query_rsUser = sprintf("SELECT UserInfo.Account, UserInfo.UserID, UserInfo.UserName, UserInfo.Photo, DeptInfo.DeptName, LevelInfo.LevelName FROM DeptInfo, LevelInfo, UserInfo WHERE UserInfo.DeptID=DeptInfo.DeptID AND LevelInfo.LevelID=UserInfo.Rank and  Account = %s ", GetSQLValueString($colname_rsUser1, "text"));
	$rsUser = mysql_query($query_rsUser, $connjxkh) or die(mysql_error());	
	$row_rsUser= mysql_fetch_assoc($rsUser);
?>

<!DOCTYPE html>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<meta http-equiv="Expires" content="0">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<title>河南城建学院干部考核系统--个人信息</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ry-framwork.css" rel="stylesheet">
<link href="css/ry-center.css" rel="stylesheet">

<!--[if lt IE 9]>
  <script src="/js/lib/html5shiv.min.js"></script>
  <script src="/js/lib/respond.min.js"></script>
<![endif]-->
</head>
<body>
    
<div id="head" class="navbar-wrapper">
	<div class="container">
		<nav class="navbar navbar-static-top">
				<div>
					<button type="button" class="navbar-toggle pull-left" data-toggle="offcanvas" data-target="#rightMenu">
						<i class="glyphicon glyphicon-list"></i>
					</button>
					<a class="navbar-brand text-hide logo" href="#">河南城建学院干部考核</a>
				</div>
					
					<ul class="nav navbar-nav nav-ry hidden-xs">
						<li class="menu-index"><a href="#">首页</a></li>
						<li class="menu-index"><a href="#">个人信息</a></li>
					
					</ul>
					<div id="login" class="pull-right">
						<ul class="nav nav-pills nav-info">
							
								
									<li class="dropdown pull-right"><a data-toggle="dropdown" class="dropdown-toggle" href="logout.php"> <i class="glyphicon glyphicon-user"></i>退出
											<b class="caret"></b></a>
										</li>
								
								
							
						</ul>
						<div class="call-num">服务热线:0375-2089030</div>
					</div>
		</nav>
	</div>
</div>
    <div id="body">
		<div class="container content row-offcanvas row-offcanvas-right">
			<div class="col-sm-2 " style="height:100%;margin-left: -15px;background-color: #f5f5f5;">
	
		<div id="leftMenu" class="row row-offcanvas-left ">
			
			<div id="accountSet" class="panel panel-menu">
				<div class="panel-heading">账号设置</div>
				<div class="list-group">
					<ul class="sec-item2">
						<li class="myInfo active"><a href="https://www.ry.com.cn/center/getMyInfoList.htm">我的信息</a></li>						
						<li class="changePwd"><a href="https://www.ry.com.cn/center/personal/updatePwd.htm">修改密码</a></li>
						
					</ul>
				</div>
			</div>
			<div id="accountInfo" class="panel panel-menu">
				<div class="panel-heading">平时调查</div>
				<div class="list-group">
					<ul class="sec-item2">
<!-- 						<li class="charge"><a href="">充值</a></li> -->


						<li class="buyInfo"><a href="checktime.php">调查问卷</a></li>
					</ul>
				</div>
	
			</div>
		</div>
	
	</div>
			<div class="col-sm-10 " style="margin-left: 15px;">
				
				

	<div id="myInfo" class="row row-offcanvas-left mt20">
		<div>
			<h3>我的信息   </h3>  
		</div>	
		
		
			
				<div id="myPhoto" class="col-sm-2">
					<img class="img-circle img-responsive img-head center-block" src="<?php echo $row_rsUser["Photo"]?>">
				</div>
				<!-- 初始-->
				
				<!-- 未绑定-->
				
				<!-- 已绑定 -->
				
					<div id="myInformation" class="col-sm-7">
						<div class="form-horizontal form-xs">                       	  
                        	
							<div class="form-group">
							  <label class="col-sm-4  control-label">用户名：</label>
								<div class="col-xs-8 pt7"> <?php
                                                echo $row_rsUser["Account"];
												?> </div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4  control-label">真实姓名：</label>
								<div class="col-xs-8 pt7"> <?php
                                                echo $row_rsUser["UserName"];
												?> </div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">部门：</label>
								<div class="col-xs-8 pt7"><?php
                                                echo $row_rsUser["DeptName"];
												?>  </div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">职级：</label>
								<div class="col-xs-8 pt7 "> <?php
                                                echo $row_rsUser["LevelName"];
												?> </div>
							</div>
							
					  </div>
					</div>
				
				
			
			
		
	</div>
	<!-- 未绑定-->
	

			</div>
	    </div>
	</div>
	
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<div class="breadcrumbs hidden-xs">
					<div class="container">
						<ul class="breadcrumb ">
							<li><a href="#">关于我们</a></li>
							
							<li><a href="#">联系我们</a></li>
						</ul>
					</div>
				</div>
				
				<p class="muted credit hidden-xs">
					版权所有 <span class="glyphicon glyphicon-copyright-mark"></span> 2019 河南城建学院组织部
				</p>
				
			</div>
			<div class="col-sm-4 hidden-xs">
				<div class="footer_logo pull-right"></div>
			</div>
		</div>
	</div>
</footer>

</body>
</html>