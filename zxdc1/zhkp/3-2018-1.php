<?php require_once('../Connections/connjxkh.php'); require('logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>3.中层领导干部互评1</title> 
<link rel="stylesheet" href="../lib/layui245/css/layui.css"  media="all">
<script src="../lib/layui245/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../lib/jquery-3.2.1.js"></script>
<?php
if (!isset($_SESSION)) {
    session_start();
}
//获取用户账号
$Account=$_SESSION['MM_Username'];

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
   
		<table class="layui-table" lay-size="sm" >
            <thead>
            	<tr>
                	<td rowspan="2"  align = "center" >单位</td>
                	<td align = "center" >姓名</td>
                	<td colspan="1"  align = "center" >综合考核评价意见</td>
                	<td colspan="1"  align = "center" >干部履职情况评价意见</td>
                	<td colspan="1"  align = "center" >参加“两学一做”学习教育情况评价意见</td>
                	<td colspan="1"  align = "center" >党风廉政建设和反腐败工作评价意见</td>
            	</tr> 
         
            </thead>
            <tbody align="center">
<?php

//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);

//查询用户所在的部门ID
$sql01="select DeptID from userinfo where Account=$Account";
$result01=mysql_fetch_assoc(mysql_query($sql01, $connjxkh));

//查找每个部门中层领导的用户名和所属部门名称（条件：Rank=2或Rank=3,除了本部门）
$sql = "SELECT * from userinformation where (LevelID=2 OR LevelID=3 ) and DeptID != '".$result01['DeptID']."' LIMIT 0,30";

//获取结果集
$result =mysql_query($sql, $connjxkh);

//mysql_fetch_array($result)从结果集中获取一行作为索引数据
while($row_rsUser = mysql_fetch_array($result))
{
	echo "<tr>";
	//输出用户名、部门名
	echo"<td>".$row_rsUser['DeptName']."</td>";
	echo"<td>".$row_rsUser['UserName']."</td>";
	echo "<input name='BPUserID' type='hidden' value='".$row_rsUser['UserID']."' />";
	echo "<input name='DeptID' type='hidden' value='".$row_rsUser['DeptID']."' />";
	//设置单选组
	for($i=0;$i<4;$i++){
		echo '<td><div class="layui-input-inline">
		<select name="manyi">
        <option value="0">非常满意</option>
        <option value="1" >满意</option>
        <option value="2">基本满意</option>
        <option value="3">不满意</option>
      </select>
    </div></td>';
	}
	echo "</tr>";
}
	
//关闭数据库连接
mysql_close($connjxkh);

?>
            </tbody>
		</table><br>
		<div class="layui-form-item layui-col-xs-offset6">
        	<input  class="layui-btn" type="button" onclick="test()" value="下一页"/>
        </div>
	</form>
</body>
<script> 
	function test(){
		var j=0;
		var count=0;
		var radio = new Array();
		
		//获取选项
		var obj = document.getElementsByTagName("select");
		for(var i=0; i<obj.length; i++){
			
				radio[j]=obj[i].value;
				j++;count++;
				//alert(obj[i].value);
			
		}
		
		//获取BPUserID
		var BPUserID = new Array();
		var DeptID = new Array();
		var els=document.getElementsByName("DeptID");
		var el  =document.getElementsByName("BPUserID");
		for (var i = 0, j = el.length; i < j; i++){
			BPUserID[i]=el[i].value;
			DeptID[i]=els[i].value;
			//alert(el[i].value);
			//alert(BPUserID[i]);
		}
		//alert(count);
		if(count==30*4){
		$.ajax({
	      type:"POST",
	      url:"3-2018save.php",
	      data:'name='+JSON.stringify(radio)+'&BPUserID='+JSON.stringify(BPUserID)+'&DeptID='+JSON.stringify(DeptID),
	      dataType:"json",
	      success:function(data){
	        if(data.code==200){
	          	//alert("保存成功！");
				window.location.href="3-2018-2.php";
	        }else{
				alert("保存失败！");
	        }
	      },
			error:function(data){alert("error");},
	    });}else{
			alert("您有未选择的项目！");
		}
	}
</script>
<script>
layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});
</script>
</html>
