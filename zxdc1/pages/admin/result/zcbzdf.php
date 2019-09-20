<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
mysql_query('SET NAMES UTF8');

function stat1($count, $sql, $db, $conn){
	mysql_select_db($db, $conn);
	$sql_stat=$sql;
	$result=mysql_query($sql_stat, $conn) or die(mysql_error());
	$row_result_num= mysql_fetch_assoc($result);
	$num=$row_result_num["num"];
	//echo $num;
	//echo "<br>";		
	return $num;
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsvote = "SELECT * FROM voterecord where khtype=1 and status='running' ";//应设为finished，即投票完成
$rsvote = mysql_query($query_rsvote, $connjxkh) or die(mysql_error());
$row_rsvote = mysql_fetch_assoc($rsvote);
$totalRows_rsvote = mysql_num_rows($rsvote);
$tableName="zc_ldbzkhinfo_".$row_rsvote["RecordCode"] ;
//mysql_select_db($database_connjxkh, $connjxkh);
$query_rsdept = "SELECT DeptID, DeptName, DeptMemo FROM deptinfo where DeptID<>1";
$rsdept = mysql_query($query_rsdept, $connjxkh) or die(mysql_error());
$count=0;

$result_num_xld=array();
$result_num_xld_0=array();
$result_num_xld_1=array();
$result_num_xld_2=array();
$result_num_xld_3=array();
$result_zcbz_xld=array();
$deptids=array();
while($row=mysql_fetch_row($rsdept)){
	//echo $row[0];	
	$deptids[$count]=$row[0];	
	//统计校领导投票数量
	$sql_xld_zcbz_voted_num="select count(*) as num from ".$tableName." where UserID IN (SELECT userID FROM userinfo WHERE LevelID=1) AND DeptID=".$row[0];
	$num=stat1($count, $sql_xld_zcbz_voted_num, $database_connjxkh, $connjxkh);
	$result_num_xld[$count]=$num;
	//统计校领导投票中的非常满意票数
	$sql_xld_zcbz_voted_num="select count(*) as num from ".$tableName." where UserID IN (SELECT userID FROM userinfo WHERE LevelID=1) AND DeptID=".$row[0]." AND ZHKH=0";
	$num=stat1($count, $sql_xld_zcbz_voted_num, $database_connjxkh, $connjxkh);
	$result_num_xld_0[$count]=$num;
	//统计校领导投票中的满意票数
	$sql_xld_zcbz_voted_num="select count(*) as num from ".$tableName." where UserID IN (SELECT userID FROM userinfo WHERE LevelID=1) AND DeptID=".$row[0]." AND ZHKH=1";
	$num=stat1($count, $sql_xld_zcbz_voted_num, $database_connjxkh, $connjxkh);
	$result_num_xld_1[$count]=$num;
	//统计校领导投票中的基本满意票数
	$sql_xld_zcbz_voted_num="select count(*) as num from ".$tableName." where UserID IN (SELECT userID FROM userinfo WHERE LevelID=1) AND DeptID=".$row[0]." AND ZHKH=2";
	$num=stat1($count, $sql_xld_zcbz_voted_num, $database_connjxkh, $connjxkh);
	$result_num_xld_2[$count]=$num;
	//统计校领导投票中的不满意票数
	$sql_xld_zcbz_voted_num="select count(*) as num from ".$tableName." where UserID IN (SELECT userID FROM userinfo WHERE LevelID=1) AND DeptID=".$row[0]." AND ZHKH=3";
	$num=stat1($count, $sql_xld_zcbz_voted_num, $database_connjxkh, $connjxkh);
	$result_num_xld_3[$count]=$num;
	
	$count ++;
	
	//echo $sql_xld_zcbz_voted_num;
	//echo "<br>";
	//$result_num=mysql_query($sql_xld_zcbz_voted_num, $connjxkh) or die(mysql_error());
	//$row_result_num= mysql_fetch_assoc($result_num);
	//$num=$row_result_num["num"];
	//echo $num;
	//echo "<br>";
}
for($i=0;$i<$count;$i++){
	print($deptids[$i].",");
	print($result_num_xld[$i].",");
	print($result_num_xld_0[$i].",");
	print($result_num_xld_1[$i].",");
	print($result_num_xld_2[$i].",");
	print($result_num_xld_3[$i].",");
	$result_zcbz_xld[$i]=$result_num_xld_0[$i]/$result_num_xld[$i]*1+$result_num_xld_1[$i]/$result_num_xld[$i]*0.8+$result_num_xld_2[$i]/$result_num_xld[$i]*0.6+$result_num_xld_3[$i]/$result_num_xld[$i]*0;
	print($result_zcbz_xld[$i]*20);
	print("<br>");
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>

</body>
</html>
<?php
mysql_free_result($rsvote);

mysql_free_result($rsdept);
?>
