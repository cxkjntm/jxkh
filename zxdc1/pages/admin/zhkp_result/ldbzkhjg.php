<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>处级领导班子考核结果展示</title> 
<link rel="stylesheet" href="../../../lib/layui245/css/layui.css"  media="all">
<script src="../../../lib/layui245/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>

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
mysql_select_db($database_connjxkh, $connjxkh);
//查询共有多少位中层领导需要参加考核
$sql02="SELECT COUNT(*) as num FROM userinfo WHERE LevelID=2 OR LevelID=3";
$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));

//查询参与考核的校领导有几人
$sql03="SELECT COUNT(UserID) as num FROM userinfo WHERE LevelID=1 and DeptID=0;";
$result03 = mysql_fetch_assoc(mysql_query($sql03, $connjxkh));

//获取表名
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName01="zc_ldbzkhinfo_".$rs['RecordCode'];
$tableName02="qz_ldbzkhinfo_".$rs['RecordCode'];
 /**
  *处级领导班子考核结果量化分项：
  *一、校领导评测得分（20%）
  *二、本单位教职工评测得分（40%）
  *三、教学单位与机关部门互评得分（20%）
  *四、处级干部互评得分（20%）
  *
  */
 
 /**
 *处级领导班子考核结果量化
 *分项一：校领导评测得分（20%）
 */
//查询校级领导ID
$sql04="select UserID from userinfo where DeptID=0 and LevelID=1";
$result04 = mysql_query($sql04, $connjxkh);
while($row01=mysql_fetch_row($result04)){
	for($i=1;$i<=46;$i++){
		for($j=0;$j<4;$j++){
			//查询单项,校领导对某一领导班子评价为优秀、称职、基本称职、不称职的结果
			$sql05="SELECT IFNULL(COUNT(ZHKH),0) AS num FROM $tableName01  
					WHERE ZHKH=$j AND DeptID=$i AND UserID='".$row01[0]."';";
			$result05=mysql_fetch_assoc(mysql_query($sql05, $connjxkh));
			//优秀票数/总票数=优秀率
			$a01[$j]=$result05/$result03['num'];
		}
		//校领导测评得分=(优秀率*1.0+称职率*0.8+基本称职率*0.6+不称职率*0)*20
		$grade01=20*($a01[0]+$a01[1]*0.8+$a01[2]*0.6+$a01[3]*0);
		//保留两位小数
		$cars01[$i]=round($grade01,2);
	}
}

/**
 *处级领导班子考核结果量化
 *分项二：本单位教职工评测得分（40%）
 */
 for($i=1;$i<=46;$i++){
	//查询本单位职工ID
	$sql06="SELECT UserID FROM userinfo WHERE LevelID=4 AND DeptID=$i;";
	$result06 = mysql_query($sql06, $connjxkh);
	while($row02=mysql_fetch_row($result06)){
		for($j=0;$j<4;$j++){
			//统计本单位职工对本单位领导班子评价优秀、称职、基本称职、不称职的票数
			$sql07="SELECT IFNULL(COUNT(ZTPJ),0) FROM $tableName02
					WHERE ZTPJ=$j AND DeptID=$i;";
			$result07=mysql_fetch_assoc(mysql_query($sql07, $connjxkh));
			//优秀票数/总票数=优秀率
			$a02[$j]=$result07/$result06['num'];
		}
		//本单位职工测评得分=(优秀率*1.0+称职率*0.8+基本称职率*0.6+不称职率*0)*40
		$grade02=40*($a02[0]+$a02[1]*0.8+$a02[2]*0.6+$a02[3]*0);
		//保留两位小数
		$cars02[$i]=round($grade02,2);
	}
 }

/**
 *处级领导班子考核结果量化 *分项三：教学单位与机关部门互评得分（20%）
 */
for($i=1;$i<=46;$i++){
	//统计几位中层领导，参与中层领导班子互评
	$sql08="SELECT COUNT(DISTINCT z.UserID) FROM $tableName01 z,userinfo u
				WHERE z.UserID = u.UserID AND (LevelID=3 OR LevelID=2);";
	$result08 = mysql_query($sql08, $connjxkh);
	while($row03=mysql_fetch_row($result08)){
		for($j=0;$j<4;$j++){
			//统计本单位职工对本单位领导班子评价优秀、称职、基本称职、不称职的票数
			$sql09="SELECT COUNT(ZHKH) FROM zc_ldbzkhinfo_472739 z,userinfo u
					WHERE z.UserID = u.UserID AND (LevelID=3 OR LevelID=2) AND (z.ZHKH=$j AND z.DeptID=$i)";
			$result09=mysql_fetch_assoc(mysql_query($sql09, $connjxkh));
			//优秀票数/总票数=优秀率
			$a03[$j]=$result09/$result08['num'];
		}
		//本单位职工测评得分=(优秀率*1.0+称职率*0.8+基本称职率*0.6+不称职率*0)*40
		$grade03=20*($a03[0]+$a03[1]*0.8+$a03[2]*0.6+$a03[3]*0);
		//保留两位小数
		$cars03[$i]=round($grade03,2);
	}
}

/**
 *处级领导班子考核结果量化
 *分项三：处级干部互评得分（20%）
 */

?>
</head>

<body class="layui-main ">
<form class="layui-form" action="outExcel.php" method="post"  id="excelfromtable">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center"><b>处级领导班子考核结果展示</b></legend>
</fieldset>
<div class="layui-form">
<div class="layui-container">
<table class="layui-table" lay-skin="row" lay-even="" id="tablelist">
    <colgroup>
      <col width="500">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col>
    </colgroup>
    <thead align="center">
      <tr>
       <td colspan=5><b>2018年度综合考核-领导班子互评结果</b></td>
      </tr> 
       <tr>
            <td >单位</td>
            <td >校领导测评得分(20%)</td>
            <td >本单位教职工测评得分(40%)</td>
            <td >教学单位与机关单位互评得分(20%)</td>
            <td >处级干部互评得分(20%)</td>
            <td >总得分</td>
            <td >综合评价</td>
      </tr> 
    </thead>
    <tbody align="center">
		<?php 
			//查询评价部门各四项满意度的人数
			$sql01="SELECT DeptID,DeptName FROM deptinfo;";
			$result01 = mysql_query($sql01, $connjxkh);
			while($row01=mysql_fetch_row($result01)){
				echo "<tr><td>".$row01[1]."</td>";
				//查询对部门评价为非常满意、满意、基本满意、不满意的分别有多少人
				for($i=0;$i<4;$i++){
					$sql="SELECT IFNULL(COUNT(ZHKH),0) AS num FROM $tableName WHERE ZHKH=".$i." AND DeptID=".$row01[0]."";
					$result=mysql_fetch_assoc(mysql_query($sql, $connjxkh));
					echo "<td>".$result['num']."</td>";
				}
				echo "</tr>";
			}
			mysql_close($connjxkh);
		?>
    </tbody>
  </table>
  </div>
<br>
	<div class="layui-form-item layui-col-xs-offset6">
		<input class="layui-btn" type="button" onclick="test()"  id="export" value="导出表格"/>
	</div>
</div>
  <input name="excelContent" id="excelContent" type="hidden" value="" autocomplete="off"/>
</form>
</body>
<script type="text/javascript">    
   $(function(){           
	$('#export').click(function(){    
	var excelContent = $('#tablelist').html(); //获取表格内容        
	$('input[name=excelContent]').val(excelContent);//赋值给表单          
	$('#excelfromtable').submit();//表单提交，提交到php         
		})       
	})    
</script>

<script>
layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});
</script>
</html>
