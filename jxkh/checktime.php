<?php require_once('Connections/connjxkh.php'); ?>
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


$colname_rsVoteTime = "Running";
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsVoteTime = "SELECT * FROM voterecord WHERE status ='".$colname_rsVoteTime."'";
$rsVoteTime = mysql_query($query_rsVoteTime, $connjxkh) or die(mysql_error());
$row_rsVoteTime = mysql_fetch_assoc($rsVoteTime);
$totalRows_rsVoteTime = mysql_num_rows($rsVoteTime);



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>

<?php
date_default_timezone_set('PRC');
$startTime=strtotime($row_rsVoteTime["starttime"]);

$RecordID="";
$RecordID=$row_rsVoteTime["RecordID"];

if(isset($row_rsVoteTime["RecordCode"]))
	$_SESSION['MM_VoteIssue']=$row_rsVoteTime["RecordCode"];
//echo 	$_SESSION['MM_VoteIssue'];
//echo $startTime."<br>";
$endTime=strtotime($row_rsVoteTime["endtime"]);
mysql_free_result($rsVoteTime);


function isVoted($database_connjxkh, $connjxkh){
	$userid_rsVote = "1";
	if ($_SESSION['MM_UserID']!=null) {
	  $userid_rsVote = $_SESSION['MM_UserID'];
	}
	$deptid_rsVote = "1";
	if ($_SESSION["MM_DeptID"]!=null) {
	  $deptid_rsVote = $_SESSION["MM_DeptID"];
	}
	$voteissue_rsVote = "2019dc02";
	if ($_SESSION["MM_VoteIssue"]!=null) {
	  $voteissue_rsVote = $_SESSION["MM_VoteIssue"];
	}
	
	mysql_select_db($database_connjxkh, $connjxkh);
	$VoteTableName="voteRecord_".$_SESSION['MM_VoteIssue'];
	$query_rsVote = sprintf("SELECT * FROM ".$VoteTableName." WHERE ".$VoteTableName.".UserID=%s AND ".$VoteTableName.".DeptID=%s ", 
		GetSQLValueString($userid_rsVote, "int"),
		GetSQLValueString($deptid_rsVote, "int")
		);
	$rsVote = mysql_query($query_rsVote, $connjxkh) or die(mysql_error());
	$row_rsVote = mysql_fetch_assoc($rsVote);
	$totalRows_rsVote = mysql_num_rows($rsVote);
	if($totalRows_rsVote>=1)
		$Result=true;
     else
	    $Result=false;	
 	mysql_free_result($rsVote);
     return $Result;			
		
}


if (isVoted($database_connjxkh, $connjxkh)){
	echo "<script type='text/javascript'>layer.alert('您已经参与调查，不能再次提交！', {icon: 2});</script>";
}
else{

	echo $endTime."<br>";
	$CurrentDate=date('Y-m-d'); 
	echo $CurrentDate."<br>";
	$CurrentDate=strtotime($CurrentDate);
	echo $CurrentDate."<br>";
	if ($startTime<=$CurrentDate and $CurrentDate <=$endTime){
		echo "time is right";	
		sleep(1); 
		if ($RecordID==7)
			header("location:vote.html");
		else
			header("location:votequestion.php?RecordID=".$RecordID);
	}
}	

	
?>
</body>
</html>
<?php



?>
