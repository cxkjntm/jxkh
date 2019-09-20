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

function isVoted($database_connjxkh, $connjxkh,$tableName){
	mysql_select_db($database_connjxkh, $connjxkh);
	$sql = "select count(*) from ".$tableName." where UserID = '".$_SESSION['MM_UserID']."'";
	//echo $sql;
	$rsVoteTime = mysql_query($sql, $connjxkh) or die(mysql_error());
	$row_rsVoteTime = mysql_fetch_assoc($rsVoteTime);
	$count = $row_rsVoteTime['count(*)'];
	//print_r($row_rsVoteTime);
	$cc = intval(floor($count/30))+1;
	//echo '<script language="JavaScript">alert("'.$cc.'");</script>;';
	if($count>0){
		$cc = intval(floor($count/30))+1;
		if($cc <5)
		header("location:3-2018-".$cc.".php");
		else{
			echo '<script language="JavaScript">alert("已投票，正在跳转投票详情")</script>';
			header("location:getvote1.php");
		}
	}
	else header("location:3-2018-1.php");
}
isVoted($database_connjxkh, $connjxkh,$tableName);
?>
</body>
</html>

