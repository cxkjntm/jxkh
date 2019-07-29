<?php require_once('../Connections/connjxkh.php'); require('../knik.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>结果页</title> 
<link rel="stylesheet" href="../lib/layui245/css/layui.css"  media="all">
<script src="../lib/layui245/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../lib/jquery-3.2.1.js"></script>

<?php
if (!isset($_SESSION)) {
    session_start();
}

header("Content-type:text/html;charset=utf-8");
mysql_query('SET NAMES UTF8');
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

	
?>
</head>
<body class="layui-main ">
<form class="layui-form">
<div class="layui-form">
<table class="layui-table" lay-even="" lay-skin="row">
  <colgroup>
    <col width="150">
    <col width="150">
    <col width="200">
	<col width="200">
	<col width="200">
    <col>
  </colgroup>
  <thead align="center">
    <tr>
      <td>单位</td>
      <td>姓名</td>
      <td>综合考核评价意见</td>
	  <td>干部履职情况评价意见</td>
	  <td>参加“两学一做”学习教育情况评价意见</td>
	  <td>党风廉政建设和反腐败工作评价意见</td>
    </tr> 
  </thead>
  <tbody align="center">
    <?php
mysql_query('SET NAMES UTF8');
//链接数据库
mysql_select_db($database_connjxkh, $connjxkh);
//查询表名
$sql01="select RecordCode from voterecord where khtype=1";
$result01 = mysql_fetch_assoc(mysql_query($sql01, $connjxkh));

//得到表名
$tableName="zc_ldcykhinfo_".$result01['RecordCode'];

//查询用户提交后的数据
$sql02 = "SELECT * from ".$tableName." where UserID = ".$_SESSION['MM_UserID'];
$result02 =mysql_query($sql02, $connjxkh);
 while($row=mysql_fetch_row($result02)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
	//print_r($row);
	//echo "<br>";
	$sql03 = "SELECT d.DeptName,u.UserName,u.UserID FROM userinfo u,deptinfo d WHERE u.DeptID=d.DeptID and UserID=".$row[2];
	$result03=mysql_fetch_array(mysql_query($sql03, $connjxkh));
	//print_r($rs2);
	//echo "<br>";
	echo "<tr><td>".$result03['DeptName']."</td>";
	echo "<td>".$result03['UserName']."</td>";
	for($i = 3; $i <= 6 ; $i ++){
	switch($row[$i]){
		case 0 : echo "<td>非常满意</td>";break;
		case 1 : echo "<td>满意</td>";break;
		case 2 : echo "<td>基本满意</td>";break;
		case 3 : echo "<td>不满意</td>";break;
	}
	}
	echo "</tr>";
}

mysql_close($connjxkh);
?>
  </tbody>
</table>  

</html>
