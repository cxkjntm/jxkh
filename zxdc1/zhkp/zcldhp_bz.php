<?php require_once('../Connections/connjxkh.php'); require('knik.php');require('logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>2.中层领导班子互评</title> 
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
<body class="layui-main ">
	<form class="layui-form">
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
                    <td rowspan="1">单位</td>
                    <td colspan="1" align="center"><b>综合考核评价意见</b></td>
                    <td rowspan="2">总体评价(选填）</td>
            	</tr> 
            	
            </thead>
            <tbody align="center">
<?php

//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);

//查询用户所在的部门ID
$sql01="select DeptID from userinfo where Account=$Account";
$result01=mysql_fetch_assoc(mysql_query($sql01, $connjxkh));


//查询部门ID和部门名称（deptinfo表）
$sql = "SELECT DeptName,DeptID FROM deptinfo where DeptMemo<>'其它'";

//获得结果集
$result =mysql_query($sql, $connjxkh);

//While()的作用是将指针向后移动，将下一行的数据交给$row
while($row=mysql_fetch_row($result)){
	//输出部门名称
	
	echo "<tr><td>".$row[0]."</td>";
	//设置隐藏域，以便获取部门ID
	echo "<input name='DeptID' type='hidden' value='".$row[1]."' />";
	//设置单选组
	echo '<td><div class="layui-input-inline">
      <select name="manyi">
        <option value="0">非常满意</option>
        <option value="1" >满意</option>
        <option value="2">基本满意</option>
        <option value="3">不满意</option>
      </select>
    </div></td>';/*
	echo "<td> <input name='".$row[1]."' type='radio'  value='0'></td>";
	echo "<td> <input name='".$row[1]."' type='radio' value='1'></td>";
	echo "<td> <input name='".$row[1]."' type='radio' value='2'></td>";
	echo "<td> <input name='".$row[1]."' type='radio' value='3'></td>";*/
	//设置备注
	echo '<td><div class="layui-input-block">
      <textarea name="text" placeholder="请输入内容" class="layui-textarea"></textarea>
    </div></td></tr>';
}

//关闭数据库连接
mysql_close($connjxkh);
?>
            </tbody>
		</table><br>
		<div class="layui-form-item layui-col-xs-offset6">
        	<input class="layui-btn" type="button" onclick="test()" value="立即提交"/>
        </div>
	</form>
</body>
<script> 
	function test(){
		var j=0;
		var count=0;
		var radio = new Array();
		var text = new Array();
		var DeptID = new Array();
		
		//获取单选组选中的结果（通过标签名获取）
		var obj = document.getElementsByTagName("select");
		for(var i=0; i<obj.length; i++){
				radio[j]=obj[i].value;
				count++;j++;
				//alert(obj[i].value);
		
		}
		
		//获取备注内容（通过name获取）
		var els =document.getElementsByTagName("textarea");
		for (var i = 0, j = els.length; i < j; i++){
			text[i]= els[i].value;
			//alert(text[i]);
		}
		
		//获取DeptID（通过name获取）
		var el  =document.getElementsByName("DeptID");
		for (var i = 0, j = el.length; i < j; i++){
			DeptID[i]=el[i].value;
			//alert(el[i].value);

		}
		
		/**
		*ajax传值（2-2018save.php处理数据）
		*请求方式：POST
		*数据格式：JSON
		*/
		if(count == 45){
		$.ajax({
	      type:"POST",
	      url:"2-2018save.php",
	      data:'name='+JSON.stringify(radio)+'&DeptID='+JSON.stringify(DeptID)+'&text='+JSON.stringify(text),
	      dataType:"json",
	      success:function(data){
	        if(data.code==200){
				alert("提交成功，感谢您的回答！");
				window.location.href="../welcome.php";
	        }else{
				alert("保存失败！");
	        }
	      },
		  error:function(data){
			  alert("提交成功，感谢您的回答！");
				window.location.href="getvote0.php";},
	    });}else{
			alert("您有未选择的项目！");
		}
	}
</script>
<script>
layui.use('form', function(){
  var form = layui.form;
});
</script>
</html>
