<?php require_once('../../../Connections/connjxkh.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>正职评副职评价意见统计</title> 
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
$sql02="SELECT COUNT(*) as num FROM userinfo WHERE Rank=2";
$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));

//查询共有多少位中层副职被考核
$sql03="SELECT COUNT(*) as num FROM userinfo WHERE Rank=3;";
$result03 = mysql_fetch_assoc(mysql_query($sql03, $connjxkh));

//获取表名
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="qz_ldcykhinfo_".$rs['RecordCode'];

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
	  <legend align="center"><b>正职评副职评价意见统计</b></legend>
	  <legend align="center">本次评审应有<?php echo $result02['num']?>位正职领导参与，<?php echo $result03['num']?>位副职领导被评审</legend>
	  <legend align="center">当前已有<?php echo $result04['num']?>位正职领导参与，<?php echo $result05['num']?>位副职领导被评审</legend>
	</fieldset>
	<div class="layui-form">
<table class="layui-table" id="tablelist">
<colgroup>
      <col width="80">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col width="150">
      <col>
    </colgroup>
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
			</tr>
	</thead>
  <tbody lay-even="" lay-skin="row">
	<?php
mysql_query('SET NAMES UTF8');
//查询中层副职被考核的结果
$sql = "SELECT u.UserName,q.ZZSX,q.GZNL,q.GZZF,q.YFBS,q.LXYZ,q.LJZV,q.ZTPJ
FROM $tableName q,userinfo u WHERE q.BPUserID=u.UserID AND u.Rank=3;";
$result =mysql_query($sql, $connjxkh);

 while($row=mysql_fetch_row($result)){    
	echo "<tr><td>".$row[0]."</td>";
	for($i = 1 ;$i <=7 ; $i ++){
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
