<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>3.中层领导干部互评</title> 
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

<body class="layui-main">
<form class="layui-form">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center">中层领导干部互评</legend>
</fieldset>
<div class="layui-form">
<table class="layui-table" lay-size="sm">
    <thead>
       <tr>
            <td rowspan="2">单位</td>
            <td rowspan="2">姓名</td>
             <td colspan="4">综合考核评价意见</td>
              <td colspan="4">干部履职情况评价意见</td>
               <td colspan="4">参加“两学一做”学习教育情况评价意见</td>
               <td colspan="4">党风廉政建设和反腐败工作评价意见</td>
      </tr> 
       <tr>
            <td >优秀</td>
            <td >称职</td>
            <td >基本称职</td>
            <td >不称职</td>
            <td >好</td>
            <td >较好</td>
            <td >一般</td>
            <td >差</td>
            <td >好</td>
            <td >较好</td>
            <td >一般</td>
            <td >差</td>
           <td >好</td>
            <td >较好</td>
            <td >一般</td>
            <td >差</td>
           
      </tr> 
    </thead><tbody align="center">
<?php

mysql_select_db($database_connjxkh, $connjxkh);


$sql = "SELECT DeptName,UserName FROM DeptInfo, UserInfo WHERE UserInfo.DeptID=DeptInfo.DeptID AND (Rank=3 OR Rank=2) ";
$a=0;
$result =mysql_query($sql, $connjxkh);
$row_rsUser = mysql_fetch_assoc($result);do{
	echo "<tr>";
	echo"<td>".$row_rsUser['DeptName']."</td>";
	echo"<td>".$row_rsUser['UserName']."</td>";
	$n1=rand(0,1000000);
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		$n1=rand(0,1000000);
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		$n1=rand(0,1000000);
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		$n1=rand(0,1000000);
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
	echo "</td>";
	}
while ($row_rsUser = mysql_fetch_assoc($result));
//echo"<td>".$row_rsUser['UserName']."</td>";
 while($row=mysql_fetch_row($result)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
 	echo "<tr>";
	//echo"<td>".$row_rsUser['UserName']."</td>";
   /* foreach ($row as $row_rsUser['UserName']){
		echo "<td>".$a++."".$row_rsUser['UserName']."</td>";
    }*/
	foreach($row as $DeptID){
		$n1=rand(0,1000000);
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		$n1=rand(0,1000000);
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		echo "<td> <input name='".$n1."' type='radio' value='0'></td>";
		
	}echo "</tr>";
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
