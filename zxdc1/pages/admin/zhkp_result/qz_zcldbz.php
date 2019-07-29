<?php require_once('../../../Connections/connjxkh.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>群众评领导班子结果统计</title> 
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
//查询共有多少位普通职工需要参加考核
$sql01="SELECT COUNT(*) as num FROM userinfo WHERE Rank=4";
$result01 = mysql_fetch_assoc(mysql_query($sql01, $connjxkh));

//获取表名
$sql02="select RecordCode from voterecord where khtype=1";
$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));
$tableName01="qz_ldbzkhinfo_".$result02['RecordCode'];
$tableName02="qz_ldcykhinfo_".$result02['RecordCode'];

//查询共有多少位普通职工需要参加考核
$sql03="SELECT COUNT(UserID) as num FROM $tableName01;";
$result03 = mysql_fetch_assoc(mysql_query($sql03, $connjxkh));
	
?>
</head>

<body class="layui-main ">
<form class="layui-form" action="outExcel.php" method="post"  id="excelfromtable">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center"><b>群众评领导班子结果统计</b></legend>
  <legend align="center">本次应有<?php echo $result01['num']?>位普通职工参与评审，当前已有<?php echo $result03['num']?>位普通职工参与</legend>
	<h3 align="center">注：A代表非常满意的人数；B代表满意的人数；C代表基本满意的人数；D代表不满意的人数。</h3>
</fieldset>
<div class="layui-form">
<div class="layui-container">
<table class="layui-table" id="tablelist">
    <colgroup>
      <col width="150">
      <?php $i=0;while($i<24){echo "<col width='40'>";$i++;}?>
      <col>
    </colgroup>
    <thead>
      <tr>
       <td colspan=25 align="center"><b>2018年度综合考核群众评价-中层领导班子评价意见</b></td>
      </tr> 
       <tr>
            <td rowspan="2">单位</td>
            <td colspan="4">班子建设党的建设</td>
            <td colspan="4">领导能力</td>
            <td colspan="4">工作实绩</td>
            <td colspan="4">党风廉政建设及反腐败工作</td>
            <td colspan="4">两学一做”学习教育情况</td>	
            <td colspan="4">总体评价</td>
      </tr> 
	  <tr>
		<?php $i=0;while($i<6){echo "<td>A</td><td>B</td><td>C</td><td>D</td>";$i++;}?>
	  </td>
    </thead>
    <tbody>
      <?php 
		//查询被评价的单位
		$sql04 = "SELECT DISTINCT d.DeptName,d.DeptID
				FROM deptinfo d,".$tableName01." q 
				WHERE d.DeptID=q.DeptID;";
		$result04 = mysql_query($sql04, $connjxkh);
		while($row01=mysql_fetch_row($result04)){  
			echo "<tr><td>".$row01[0]."</td>";
			//查询班子建设党的建设评价意见的各项有多少人
			$cars=array("DDJS","LDNL","GZSJ","LZJS","XXJY","ZTPJ");
			for($j=0;$j<6;$j++){
				for($i=0;$i<4;$i++){
					$sql05="SELECT IFNULL(COUNT(".$cars[$j]."),0) as num FROM $tableName01 
							WHERE ".$cars[$j]."='".$i."' AND DeptID='".$row01[1]."';";
					$result05=mysql_fetch_assoc(mysql_query($sql05, $connjxkh));
					echo "<td>".$result05['num']."</td>";
				}
			}
		}
	  ?>
    </tbody>
  </table></div>
<br>
	<div class="layui-form-item layui-col-xs-offset6">
		<input class="layui-btn" type="button"  id="export" value="导出表格"/>
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
