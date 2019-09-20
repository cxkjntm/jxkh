<?php require_once('Connections/connjxkh.php'); 
require('logincheck.php');
require('knik.php');
if (!isset($_SESSION)) {
  session_start();
}
if(!isset($_SESSION['MM_Username'])){
header("location:index.php");
}?>
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
	$colname_rsUser1 = '20161021';
	if(isset($_SESSION['MM_Username']))
	  $colname_rsUser1=$_SESSION['MM_Username'];
	mysql_query('SET NAMES UTF8');  
	mysql_select_db($database_connjxkh, $connjxkh);
	$query_rsUser = sprintf("SELECT userinfo.Account, userinfo.UserID, userinfo.UserName, userinfo.Photo, deptinfo.DeptName, levelinfo.LevelName FROM deptinfo, levelinfo, userinfo WHERE userinfo.DeptID=deptinfo.DeptID AND levelinfo.LevelID=userinfo.LevelID and  Account = %s ", GetSQLValueString($colname_rsUser1, "text"));
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
    

    <div id="body">
		<div class="container content row-offcanvas row-offcanvas-right">
			<div class="col-sm-2 " style="height:100%;margin-left: -15px;background-color: #f5f5f5;">
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
												?> 
								</div>
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
		<div class="container content row-offcanvas row-offcanvas-right">
			<?php include 'uploadimages/upImage.php';?>
		</div>
	</div>
	
</body>
</html>