<?php require_once('../../../Connections/connjxkh.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>领导成员互评结果统计</title> 
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
//查询共有多少位中层正职领导需要参加考核
$sql02="SELECT COUNT(*) as num FROM userinfo WHERE Rank=2 OR Rank=3";
$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));

//获取表名
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="zc_ldcykhinfo_".$rs['RecordCode'];

//实有多少位中层正职领导需要参加考核
$sql04="SELECT COUNT(DISTINCT UserID) as num FROM $tableName;";
$result04 = mysql_fetch_assoc(mysql_query($sql04, $connjxkh));

//实有多少位中层副职被考核
$sql05="SELECT COUNT(BPUserID) as num FROM $tableName;";
$result05 = mysql_fetch_assoc(mysql_query($sql05, $connjxkh));

?>
</head>
<body class="layui-main ">

<form class="layui-form" action="outExcel.php" method="post"  id="excelfromtable">
	<fieldset class="layui-elem-field layui-field-title"  style="margin-top: 20px;">
	  <legend align="center"><b>领导成员互评结果统计</b></legend>
	  <legend align="center">本次评审应有<?php echo $result02['num']?>位中层领导参与，
	  当前已有<?php echo $result04['num']?>位中层领导参与</legend>
	  <h3 align="center">注：A代表非常满意的人数；B代表满意的人数；C代表基本满意的人数；D代表不满意的人数。</h3>
	</fieldset>
	<div class="layui-form">
<table class="layui-table" lay-even="" lay-skin="row"  id="tablelist">
  <colgroup>
    <col width="180">
    <col width="80">
	<?php $i=0;while($i<16){echo "<col width='40'>";$i++;}?>
    <col>
  </colgroup>
  <thead align="center">
    <tr>
      <td rowspan=2>单位</td>
      <td rowspan=2>姓名</td>
      <td colspan="4">综合考核评价意见</td>
	  <td colspan="4">干部履职情况评价意见</td>
	  <td colspan="4">参加“两学一做”学习教育情况评价意见</td>
	  <td colspan="4">党风廉政建设和反腐败工作评价意见</td>
    </tr> 
	<tr>
	<?php $i=0;while($i<4){echo "<td>A</td><td>B</td><td>C</td><td>D</td>";$i++;}?>
	</tr>
	 
  </thead>
  <tbody>
  <tbody lay-even="" lay-skin="row" align="center">
	<?php
mysql_query('SET NAMES UTF8');
//查询中层副职被考核的结果
$sql = "SELECT d.DeptName,u.UserName,u.UserID FROM userinfo u,deptinfo d WHERE u.DeptID=d.DeptID;";
$result06 =mysql_query($sql, $connjxkh);
 while($row=mysql_fetch_row($result06)){  
 
	echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td>";
	//查询综合考核评价意见的各项有多少人
	for($i=0;$i<4;$i++){
		$sql="SELECT IFNULL(COUNT(DDJS),0) AS num FROM $tableName WHERE DDJS='".$i."' AND BPUserID='".$row[2]."';";
		$result=mysql_fetch_assoc(mysql_query($sql, $connjxkh));
		echo "<td>".$result['num']."</td>";
	}
	for($i=0;$i<4;$i++){
		$sql="SELECT IFNULL(COUNT(LDNL),0) AS num FROM $tableName WHERE LDNL='".$i."' AND BPUserID='".$row[2]."';";
		$result=mysql_fetch_assoc(mysql_query($sql, $connjxkh));
		echo "<td>".$result['num']."</td>";
	}
	for($i=0;$i<4;$i++){
		$sql="SELECT IFNULL(COUNT(LZJS),0) AS num FROM $tableName WHERE LZJS='".$i."' AND BPUserID='".$row[2]."';";
		$result=mysql_fetch_assoc(mysql_query($sql, $connjxkh));
		echo "<td>".$result['num']."</td>";
	}
	for($i=0;$i<4;$i++){
		$sql="SELECT IFNULL(COUNT(LXYZ),0) AS num FROM $tableName WHERE LXYZ='".$i."' AND BPUserID='".$row[2]."';";
		$result=mysql_fetch_assoc(mysql_query($sql, $connjxkh));
		echo "<td>".$result['num']."</td>";
	}
	
	echo "</tr>";
}
mysql_close($connjxkh);
?>
  </tbody>
</table>  
	<div class="layui-form-item layui-col-xs-offset6">
		<input class="layui-btn" type="button"  id="export" value="导出表格"/>
	</div>
</div>
  <input name="excelContent" id="excelContent" type="hidden" value="" autocomplete="off"/>
</form>
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
</body>
</html>
