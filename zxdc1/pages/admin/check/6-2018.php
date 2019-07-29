<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>6、综合考评双向互评（A）</title> 
<link rel="stylesheet" href="../../../lib/layui245/css/layui.css"  media="all">
<script src="../../../lib/layui245/layui.js" charset="utf-8"></script>

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
<div class="layui-container">
<table class="layui-table">
    <colgroup>
      <col width="400">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col>
    </colgroup>
    <thead align="center">
      <tr>
       <td colspan=6>2018年度综合考核双向互评（A）</td>
      </tr> 
       <tr>
            <td rowspan="2">单位</td>
            <td colspan="4" align="center">综合考核评价意见</td>
            <td rowspan="2">总体评价</td>
      </tr> 
       <tr>
            <td >非常满意</td>
            <td >满意</td>
            <td >基本满意</td>
            <td >不满意</td>
           
      </tr> 
    </thead><tbody align="center">
<?php

mysql_select_db($database_connjxkh, $connjxkh);


$sql = "SELECT DeptName DeptID FROM deptinfo where DeptID<18 OR DeptID>33";

$result =mysql_query($sql, $connjxkh);
 while($row=mysql_fetch_row($result)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
    foreach ($row as $DeptName){
		echo "<tr><td>".$DeptName."</td>";
		
    }
	foreach($row as $DeptID){
	echo "<td> <input name='".$DeptID."' type='radio' value='0'></td>";
		echo "<td> <input name='".$DeptID."' type='radio' value='0'></td>";
		echo "<td> <input name='".$DeptID."' type='radio' value='0'></td>";
		echo "<td> <input name='".$DeptID."' type='radio' value='0'></td>";
		echo "<td><input name='".$DeptID."' type='text' /></td></tr>";
	}
}
mysql_close($connjxkh);
?></tbody></table></div>
<br>
	<div class="layui-form-item layui-col-xs-offset6"><a href="addquestion.php" class="layui-btn" ">立即提交</a></div>
</div>
</form>
</body>
<script>
layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});
</script>
</html>
