<?php require_once('../Connections/connjxkh.php'); //require('../knik.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>投票信息详情统计</title> 
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
mysql_query('SET NAMES UTF8');
//查询此次调查编号
mysql_select_db($database_connjxkh, $connjxkh);
$sql01="select RecordCode from voterecord where khtype=1";
$result01 = mysql_fetch_assoc(mysql_query($sql01, $connjxkh));

//职工评本单位领导班子
$tableName01="qz_ldbzkhinfo_".$result01['RecordCode'];
//职工评本单位领导成员、本单位正职评本单位副职
$tableName02="qz_ldcykhinfo_".$result01['RecordCode'];
//领导班子互评表、
$tableName03="zc_ldbzkhinfo_".$result01['RecordCode'];
//领导成员互评表
$tableName04="zc_ldcykhinfo_".$result01['RecordCode'];

/*
 *中层正职（领导班子互评、领导成员互评、正职评副职）
 *中层副职（领导班子互评、领导成员互评）
 *职工代表（评价机关单位领导班子、评价本单位领导班子、评价本单位领导成员）
 *普通职工（评价本单位领导班子、评价本单位领导成员）
 *涉及到的表：
 *中层正职（$tableName02,$tableName03,$tableName04）
 *中层副职（$tableName03,$tableName04）
 *职工代表（$tableName01,$tableName02,$tableName03）
 *普通职工（$tableName01,$tableName02）
 */
//查询本部门所有人员的UserID 和 levelID
$sql02="select UserID,UserName,LevelID from userinfo";
$result02 = mysql_query($sql02, $connjxkh);
	
?>
</head>
<body class="layui-main ">
<form class="layui-form">
<div class="layui-form">
<table class="layui-table" lay-even="" lay-skin="row">
  <colgroup>
    <col width="50">
    <col width="50">
    <col width="100">
    <col width="100">
    <col width="100">
    <col width="100">
    <col width="100">
    <col>
  </colgroup>
  
  <thead align="center">
	<tr>
		<td colspan=7 align="center">本单位人员参与考核情况</td>
	</tr> 
	 <tr>
      <td rowspan=2>姓名</td> 
	  <td rowspan=2>职级</td> 
      <td colspan=5>调查</td> 
    </tr> 
    <tr>
      <td>领导班子互评</td>
      <td>领导成员互评</td>
      <td>本单位正职评本单位副职</td>
	  <td>职工评本单位领导班子</td>
	  <td>职工评本单位领导成员</td>
    </tr> 
  </thead>
  <tbody align="center">
    <?php
		while($row=mysql_fetch_row($result02)){
			//查询用户职级
			$sql03="select LevelName from levelinfo where LevelID=".$row[2];
			$result03 = mysql_fetch_assoc(mysql_query($sql03, $connjxkh));
			echo "<tr><td>".$row[1]."</td>";
			echo "<td>".$result03['LevelName']."</td>";
			if($row[2]==1){
				//查询校级领导是否参与考核领导班子互评
				$sql015="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName03 WHERE UserID =".$row[0];
				$result015 =	mysql_fetch_assoc(mysql_query($sql015, $connjxkh));
				//查询校级领导是否参与考核领导成员互评
				$sql016="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName04 WHERE UserID =".$row[0];
				$result016 =	mysql_fetch_assoc(mysql_query($sql016, $connjxkh));
				if($result015['num']==1){echo "<td>已参与（校级领导评领导班子）</td>";} else {echo "<td>未参与（校级领导评领导班子）</td>";}
				if($result016['num']==1){echo "<td>已参与（校级领导评领导成员）</td>";} else {echo "<td>未参与（校级领导评领导成员）</td>";}
				echo "<td>——</td>";
				echo "<td>——</td>";
				echo "<td>——</td></tr>";
			}
			if($row[2]==2){
				//查询正职领导是否参与考核领导班子互评
				$sql04="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName03 WHERE UserID =".$row[0];
				$result04 =	mysql_fetch_assoc(mysql_query($sql04, $connjxkh));
				//查询正职领导是否参与考核领导成员互评
				$sql05="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName04 WHERE UserID =".$row[0];
				$result05 =	mysql_fetch_assoc(mysql_query($sql05, $connjxkh));
				//查询正职领导是否参与本单位正职评本单位副职
				$sql06="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName02 WHERE UserID =".$row[0];
				$result06 =	mysql_fetch_assoc(mysql_query($sql06, $connjxkh));
				if($result04['num']==1){echo "<td>已参与</td>";} else {echo "<td>未参与</td>";}
				if($result05['num']==1){echo "<td>已参与</td>";} else {echo "<td>未参与</td>";}
				if($result06['num']==1){echo "<td>已参与</td>";} else {echo "<td>未参与</td>";}
				echo "<td>——</td>";
				echo "<td>——</td></tr>";
			}
			if($row[2]==3){
				//查询正职领导是否参与考核领导班子互评
				$sql07="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName03 WHERE UserID =".$row[0];
				$result07 =	mysql_fetch_assoc(mysql_query($sql07, $connjxkh));
				//查询正职领导是否参与考核领导成员互评
				$sql08="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName04 WHERE UserID =".$row[0];
				$result08 =	mysql_fetch_assoc(mysql_query($sql08, $connjxkh));
				if($result07['num']==1){echo "<td>已参与</td>";} else {echo "<td>未参与</td>";}
				if($result08['num']==1){echo "<td>已参与</td>";} else {echo "<td>未参与</td>";}
				echo "<td>——</td>";
				echo "<td>——</td>";
				echo "<td>——</td></tr>";
			}
			if($row[2]==4){
				//查询教工代表是否参与考核机关单位领导班子
				$sql010="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName03 WHERE UserID =".$row[0];
				$result010 = mysql_fetch_assoc(mysql_query($sql010, $connjxkh));
				//查询教工代表是否参与考核本单位的领导成员
				$sql011="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName02 WHERE UserID =".$row[0];
				$result011 = mysql_fetch_assoc(mysql_query($sql011, $connjxkh));
				//查询教工代表是否参与考核本单位领导班子
				$sql012="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName01 WHERE UserID =".$row[0];
				$result012 = mysql_fetch_assoc(mysql_query($sql012, $connjxkh));
				if($result010['num']==1){echo "<td>已参与（机关单位领导班子）</td>";} else {echo "<td>未参与（机关单位领导班子）</td>";}
				echo "<td>——</td>";
				echo "<td>——</td>";
				if($result012['num']==1){echo "<td>已参与</td>";} else {echo "<td>未参与</td>";}
				if($result011['num']==1){echo "<td>已参与）</td>";} else {echo "<td>未参与</td></tr>";}
			}
			if($row[2]==5){
				//查询科室职工是否参与考核教学单位领导班子
				$sql010="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName03 WHERE UserID =".$row[0];
				$result010 = mysql_fetch_assoc(mysql_query($sql010, $connjxkh));
				//查询科室职工是否参与考核本单位的领导成员
				$sql011="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName02 WHERE UserID =".$row[0];
				$result011 = mysql_fetch_assoc(mysql_query($sql011, $connjxkh));
				//查询科室职工是否参与考核本单位领导班子
				$sql012="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName01 WHERE UserID =".$row[0];
				$result012 = mysql_fetch_assoc(mysql_query($sql012, $connjxkh));
				if($result010['num']==1){echo "<td>已参与（教学单位领导班子）</td>";} else {echo "<td>未参与（教学单位领导班子）</td>";}
				echo "<td>——</td>";
				echo "<td>——</td>";
				if($result012['num']==1){echo "<td>已参与</td>";} else {echo "<td>未参与</td>";}
				if($result011['num']==1){echo "<td>已参与）</td>";} else {echo "<td>未参与</td></tr>";}
			}
			if($row[2]==6){
				//查询普通教职工是否参与考核本单位的领导成员
				$sql013="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName02 WHERE UserID =".$row[0];
				$result013 = mysql_fetch_assoc(mysql_query($sql013, $connjxkh));
				//查询普通教职工是否参与考核本单位领导班子
				$sql014="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName01 WHERE UserID =".$row[0];
				$result014 = mysql_fetch_assoc(mysql_query($sql014, $connjxkh));
				echo "<td>——</td>";
				echo "<td>——</td>";
				echo "<td>——</td>";
				if($result014['num']==1){echo "<td>已参与</td>";} else {echo "<td>未参与</td>";}
				if($result013['num']==1){echo "<td>已参与）</td>";} else {echo "<td>未参与</td></tr>";}
			}
			if($row[2]==7){
				echo "<td>——</td>";
				echo "<td>——</td>";
				echo "<td>——</td>";
				echo "<td>——</td>";
				echo "<td>——</td><tr>";
			}
		}
		mysql_close($connjxkh);
	?>
  </tbody>
</table>  

</form>
</div>
</body>
</html>
