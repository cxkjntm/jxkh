<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>3.中层领导干部互评1</title> 
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

?>
</head>
<body class="layui-main">
    <form class="layui-form">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
          <legend align="center">中层领导干部互评</legend>
        </fieldset>
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
            </thead>
            <tbody align="center">
<?php

//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);



//查找每个部门中层领导的用户名和所属部门名称（条件：Rank=2或Rank=3）
$sql = "SELECT UserID,UserName,DeptName,DeptInfo.DeptID FROM DeptInfo, UserInfo WHERE UserInfo.DeptID=DeptInfo.DeptID AND Rank<4 LIMIT 0,30";

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
		$n1=rand(0,1000000);
		for($m=0;$m<4;$m++) 
			echo "<td><input name='".$n1."' type='radio' value='".$m."'></td>";
	}
}
	
//关闭数据库连接
mysql_close($connjxkh);

?>
            </tbody>
		</table><br>
		<div class="layui-form-item layui-col-xs-offset6">
        	<a href="" class="layui-btn" onclick="test()">下一页</a>
        </div>
	</form>
</body>
<script> 
	function test(){
		var j=0;
		var count=0;
		var radio = new Array();
		
		//获取选项
		var obj = document.getElementsByTagName("input");
		for(var i=0; i<obj.length; i++){
			if(obj[i].checked){
				radio[j]=obj[i].value;
				j++;count++;
				//alert(obj[i].value);
			}
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
		alert(count);
		if(count==30*4){
		$.ajax({
	      type:"POST",
	      url:"3-2018save.php",
	      data:'name='+JSON.stringify(radio)+'&BPUserID='+JSON.stringify(BPUserID)+'&DeptID='+JSON.stringify(DeptID),
	      dataType:"json",
	      success:function(data){
	        if(data.code==200){
	          	alert("保存成功！");
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
