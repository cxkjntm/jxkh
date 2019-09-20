<?php require_once('../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>1、校级领导考核中层领导班子及成员</title> 
<link rel="stylesheet" href="../lib/layui245/css/layui.css"  media="all">
<script src="../lib/layui245/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../lib/jquery-3.2.1.js"></script>
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
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
          <legend align="center">校领导考核中层领导及成员</legend>
        </fieldset>
        <table class="layui-table">
            <colgroup>
              <col width="100">
              <col width="300">
              <col width="300">
              <col width="300">
              <col width="300">
              <col width="300">
              <col width="300">
              <col>
            </colgroup>
            <thead>
                <tr>
                    <td colspan=7 align="center">2018年度综合考核校领导评价-中层领导班子评价意见</td>
                </tr> 
                <tr>
                    <td>测评项目</td>
                    <td>班子建设党的建设</td>
                    <td>领导能力</td>
                    <td>工作实绩</td>
                    <td>党风廉政建设及反腐败工作</td>
                    <td>“两学一做”学习教育情况</td>	
                    <td>总体评价</td>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td>评价意见</td>
<?php 
//设置选项("A","B","C","D")
$title=array("A","B","C","D");
for($i=0;$i<6;$i++){
	$n1=rand(0,1000000);
	echo "<td>";
	for($m=0;$m<4;$m++)
		echo "<input name='".$n1."' title='".$title[$m]."' type='radio' value='".$m."'>";
	echo "</td>";
	}
?>
                </tr>
            </tbody>
        </table>
	注：分项评价意见〔A〕〔B〕〔C〕〔D〕分别为好、较好、一般、差，总体评价意见〔A〕〔B〕〔C〕〔D〕分别为优秀、称职、基本称职、不称职；
        <table class="layui-table">
            <colgroup>
                <col width="50">
                <col width="100">
                <col width="200">
                <col width="200">
                <col width="200">
                <col width="200">
                <col width="200">
                <col width="200">
            </colgroup>
            <thead align="center">
                <tr>
                    <td colspan=8 align="center">2018年度综合考核校领导评价-中层领导干部评价意见</td>
                </tr> 
                <tr align="center">
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
            <tbody align="center">
<?php

//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);

//查询用户、用户所属部门ID和用户ＩＤ（条件:LevelID=2）
$sql = "SELECT UserName,DeptID,UserID FROM userinfo where LevelID='2'";



//获得结果集
$result =mysql_query($sql, $connjxkh);

//While()的作用是将指针向后移动，将下一行的数据交给$row
while($row=mysql_fetch_row($result)){
	//输出用户名         
	echo "<tr><td>".$row[0]."</td>";
	//设置隐藏域，以便获取用户ID和部门ID
	echo "<input name='DeptID' type='hidden' value='".$row[1]."' />";
	echo "<input name='UserID' type='hidden' value='".$row[2]."' />";
	//设置单选组
	for($i=0;$i<7;$i++){
		$n1=rand(0,1000000);
		echo "<td>";
		for($m=0;$m<4;$m++){echo " <input name='".$n1."' type='radio'title='".$title[$m]."' value='".$m."'>";}
		echo "</td>";
		}
	echo "</tr>";
}

//关闭数据库连接
mysql_close($connjxkh);
?>
            </tbody>
        </table><br>
        <div class="layui-form-item layui-col-xs-offset6">
            <a href="" class="layui-btn" onclick="test()">立即提交</a>
        </div>
	</form>
</body>
<script> 
	function test(){
		var j=0;
		var count = 0;
		var radio = new Array();
		var DeptID = new Array();
		var UserID = new Array();
		//获取单选组选中的结果（通过标签名获取）
		var obj = document.getElementsByTagName("input");
		for(var i=0; i<obj.length; i++){
			if(obj[i].checked){
				radio[j]=obj[i].value;
				j++;count++;
				//alert(obj[i].value);
			}
			
		}
		
		//获取DeptID（通过name获取）
		//获取UserID（通过name获取）
		var el  =document.getElementsByName("UserID");
		var els =document.getElementsByName("DeptID");
		for (var i = 0, j = els.length; i < j; i++){
			DeptID[i]= els[i].value;
			UserID[i]=el[i].value;
			
		}
		alert(UserID.length);
		
		/**
		*ajax传值（1-2018save.php处理数据）
		*请求方式：POST
		*数据格式：JSON
		*/
		alert(count);
		if(count ==59*7){
			$.ajax({
	    	type:"POST",
		    url:"1-2018save.php",
		    data:'name='+JSON.stringify(radio)+'&UserID='+JSON.stringify(UserID)+'&DeptID='+JSON.stringify(DeptID),
		    dataType:"json",
		    success:function(data){
		    	if(data.code==200){
		    		alert("提交成功，感谢您的回答！");
					window.location.href="../welcome.html";
		    	}else{
					alert("保存失败！");
	        	}
	       		},
			error:function(data){alert("error");},
	   		});
		}else{
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
