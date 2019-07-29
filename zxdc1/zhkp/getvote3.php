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
<div class="layui-form">

<form class="layui-form">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center"><b>群众评领导班子及成员</b></legend>
</fieldset>
<table class="layui-table" lay-even="" lay-skin="row">
  <colgroup>
    <col width="150">
    <col width="150">
    <col width="200">
	<col width="200">
	<col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <td>测评项目</td>
            <td>班子建设党的建设</td>
            <td>领导能力</td>
            <td>工作实绩</td>
            <td>党风廉政建设及反腐败工作</td>
            <td>“两学一做”学习教育情况</td>	
            <td>总体评价</td>
    </tr> 
  </thead>
  <tbody>
    <?php
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
//查询表名
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="qz_ldbzkhinfo_".$rs['RecordCode'];

$sql = "SELECT * from ".$tableName." where UserID = ".$_SESSION['MM_UserID'];
$result =mysql_query($sql, $connjxkh);
 while($row=mysql_fetch_row($result)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
	echo "<td>评价意见</td>";
	for($i = 3; $i <= 8 ; $i ++){
	switch($row[$i]){
		case 0 : echo "<td>非常满意</td>";break;
		case 1 : echo "<td>满意</td>";break;
		case 2 : echo "<td>基本满意</td>";break;
		case 3 : echo "<td>不满意</td>";break;
	}
	}
	echo "</tr>";
}?>
</table>
</form>
</div>

<form class="layui-form">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center"><b>2018年度综合考核群众评价-中层领导干部评价意见</b></legend>
</fieldset>
<div class="layui-form">
<table class="layui-table" lay-even="" lay-skin="row">
<thead>
  <td rowspan="2" >姓名</td>
            <td>德</td>
            <td>能</td>
            <td>勤</td>
            <td>绩</td>
            <td>廉</td>
            <td>学</td>
			<td rowspan="2">总体评价</td>
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
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="qz_ldcykhinfo_".$rs['RecordCode'];
$sql = "select * from ".$tableName." where UserID in (select DeptID from userinformation where DeptID = ".$_SESSION["MM_DeptID"].")";
//echo $sql;
$sql = "SELECT * from ".$tableName." where UserID = ".$_SESSION['MM_UserID'];
//echo $sql;
$result =mysql_query($sql, $connjxkh);
 while($row=mysql_fetch_row($result)){
	$ssql = "select UserName from userinfo where UserID = ".$row[2];
	$result1 =mysql_query($ssql, $connjxkh);
	$rs2=mysql_fetch_array($result1);

	echo "<tr><td>".$rs2['UserName']."</td>";
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
</body>
</html>
