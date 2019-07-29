<?php require_once('../../../Connections/connjxkh.php'); //require('../knik.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>领导班子考核结果量化</title> 
<link rel="stylesheet" href="../../../lib/layui245/css/layui.css"  media="all">
<script src="../../lib/layui245/layui.js" charset="utf-8"></script>
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

  
?>
</head>
<body class="layui-main ">
<div class="layui-form">

<form class="layui-form"action="outExcel.php" method="post"  id="excelfromtable">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center"><b>中层领导班子当前分数</b></legend>
</fieldset>
<table class="layui-table" lay-even="" lay-skin="row" id="tablelist">
  <colgroup>
    <col width="200">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
            <td>部门</td>
            <td>当前分数</td>
    </tr> 
  </thead>
  <tbody>
    <?php
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
//查询表名
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="bz_grade_".$rs['RecordCode'];

$sql = "SELECT * from ".$tableName;
//echo $sql;
$result =mysql_query($sql, $connjxkh);
    while($row=mysql_fetch_row($result)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
         //print_r($row);
          echo "<tr>";
          $sqlinfo = "select DeptName from deptinfo where DeptID = ".$row[1];
          //echo $sqlinfo;
          $rs2 = mysql_fetch_assoc(mysql_query($sqlinfo, $connjxkh));
          //print_r($rs2);
          echo "<td>".$rs2['DeptName']."</td>";
          echo "<td>".$row[2]."</td></tr>";
    }
?>
</table>
<div class="layui-form-item layui-col-xs-offset6">
		<input class="layui-btn" type="button" onclick="test()"  id="export" value="导出表格"/>
	</div>
</div>
  <input name="excelContent" id="excelContent" type="hidden" value="" autocomplete="off"/>
</form>
</div>
<script type="text/javascript">    
   $(function(){           
	$('#export').click(function(){    
	var excelContent = $('#tablelist').html(); //获取表格内容        
	$('input[name=excelContent]').val(excelContent);//赋值给表单          
	$('#excelfromtable').submit();//表单提交，提交到php         
		})       
	})    
</script>
</body>
</html>
