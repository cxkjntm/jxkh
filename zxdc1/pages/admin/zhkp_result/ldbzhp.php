<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>领导班子互评结果展示</title> 
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
$sql02="SELECT COUNT(*) as num FROM userinfo WHERE Rank=2 OR Rank=3";
$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));

//查询共有多少位普通职工需要参加考核
$sql03="SELECT COUNT(*) as num FROM userinfo WHERE Rank=4;";
$result03 = mysql_fetch_assoc(mysql_query($sql03, $connjxkh));

//获取表名
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="zc_ldbzkhinfo_".$rs['RecordCode'];

//查询实有多少人参与考核
$sql04="SELECT  COUNT(DISTINCT UserID) as num FROM $tableName;";
$result04 = mysql_fetch_assoc(mysql_query($sql04, $connjxkh));
?>
</head>

<body class="layui-main ">
<form class="layui-form" action="outExcel.php" method="post"  id="excelfromtable">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center"><b>2018年度综合考核-领导班子互评结果展示</b></legend>
  <legend align="center">本次考核应有<?php echo $result02['num']?>位中层领导、<?php echo $result03['num']?>位普通职工参加,当前已有<?php echo $result04['num']?>人参加</legend>
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
            <td rowspan="2">单位</td>
            <td colspan="4">综合考评意见</td>
      </tr> 
	  <tr>
			<td>非常满意人数</td>
            <td>满意人数</td>
            <td>基本满意人数</td>
            <td>不满意人数</td>
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
