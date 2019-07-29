<?php require_once('../Connections/connjxkh.php'); require('../knik.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>7、综合考评双向互评（B）</title> 
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
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>单位</th>
      <th>综合考核评价意见</th>
      <th>总体评价</th>
    </tr> 
  </thead>
  <tbody>
    <?php
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="zc_ldbzkhinfo_".$rs['RecordCode'];
$sql = "SELECT * from ".$tableName." where UserID = ".$_SESSION['MM_UserID'];
//echo $sql;
$result =mysql_query($sql, $connjxkh);
 while($row=mysql_fetch_row($result)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
	$ssql = "select DeptName from Deptinfo where DeptID = ".$row[2];
	//echo $ssql;
	$result1 =mysql_query($ssql, $connjxkh);
	$rs2=mysql_fetch_array($result1);
	echo "<tr><td>".$rs2[0]."</td>";
	switch($row[4]){
		case 0 : echo "<td>非常满意</td>";break;
		case 1 : echo "<td>满意</td>";break;
		case 2 : echo "<td>基本满意</td>";break;
		case 3 : echo "<td>不满意</td>";break;
	}
	if($row[5]!=null)
	echo "<td>".$row[5]."</td></tr>";
	else echo "<td>暂无评价</td>";
}

mysql_close($connjxkh);
?>
  </tbody>
</table>  

</html>
