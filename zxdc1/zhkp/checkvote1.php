<?php require_once('../Connections/connjxkh.php'); require('logincheck.php');?>
<link rel="stylesheet" type="text/css" href="lib/layer/theme/default/layer.css"/>
<script type="text/javascript" src="lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="lib/layer/layer.js"></script>
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


mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$sql1="select RecordCode from voterecord where khtype=1 and status='running' ";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="zc_ldcykhinfo_".$rs['RecordCode'];




?>
<html>
<head>
</head>
<body>
<?php
date_default_timezone_set('PRC');
//获取用户账号
$Account=$_SESSION['MM_Username'];
header("Content-type:text/html;charset=utf-8");
mysql_query('SET NAMES UTF8');
//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);

//查询用户所在的部门ID
$sql01="select DeptID from userinfo where Account=$Account";
$result01=mysql_fetch_assoc(mysql_query($sql01, $connjxkh));

//查找每个部门中层领导的用户名和所属部门名称（条件：Rank=2或Rank=3,除了本部门）
$sql = "SELECT Count(*) as usernum from userinformation where (LevelID=2 OR LevelID=3 ) AND userid NOT IN (SELECT bpuserid FROM zc_ldcykhinfo_472739 WHERE userid=".$_SESSION['MM_UserID'].") and DeptID != ".$result01['DeptID'];

echo $sql;
//获取结果集
$result =mysql_query($sql, $connjxkh) or die(mysql_error());;
$row_rs = mysql_fetch_assoc($result);
$count = $row_rs['usernum'];
echo $count ;

if ($count<30)
	if($count!=0)	
	    header("location:3-2018-5.php");
	else{
		echo '<script language="JavaScript">alert("已投票，正在跳转投票详情")</script>';
		header("location:getvote1.php");
		}		
else
   	header("location:3-2018-1.php");
?>
</body>
</html>

