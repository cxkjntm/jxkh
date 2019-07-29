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
<table class="layui-table">
<thead align="center">
  <td rowspan="2" >姓名</td>
            <td rowspan="2">总体评价</td>
            <td>德</td>
            <td>能</td>
            <td>勤</td>
            <td>绩</td>
            <td>廉</td>
            <td>学</td>
       </tr>
       <tr>
            <td>政治态度思想品质</td>
            <td>工作思路组织协调业务能力</td>
            <td>精神状态努力程度工作作风</td>
            <td>履职成效解决复杂问题遵守法律依法办事</td>
            <td>廉洁自律履行廉政职责</td>	
            <td>参加“两学一做”学习教育</td>
	</thead>
  <tbody>
<?php
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
//查询表名
$sql01="select RecordCode from voterecord where khtype=1";
$result = mysql_fetch_assoc(mysql_query($sql01, $connjxkh));
$tableName="qz_ldcykhinfo_".$result['RecordCode'];

$sql02 = "SELECT * from ".$tableName." where UserID = ".$_SESSION['MM_UserID'];
//echo $sql;
$result01 =mysql_query($sql02, $connjxkh);
 while($row=mysql_fetch_row($result01)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
	$sql03 = "SELECT UserName FROM userinfo WHERE UserID= ".$row[2];
	$result02=mysql_fetch_array(mysql_query($sql03, $connjxkh));
	echo "<tr><td>".$result02['UserName']."</td>";
	for($i = 3 ;$i <=9 ; $i ++){
	switch($row[$i]){
		case 0 : echo "<td>非常满意</td>";break;
		case 1 : echo "<td>满意</td>";break;
		case 2 : echo "<td>基本满意</td>";break;
		case 3 : echo "<td>不满意</td>";break;
	}
	}echo "</tr>";
}

mysql_close($connjxkh);
?>
  </tbody>
</table>  

</html>
