<?php require_once('../Connections/connjxkh.php'); require('../knik.php');require('logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>7、综合考评双向互评（B）</title> 
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
<div class="layui-form">
<table class="layui-table">
    <colgroup>
      <col width="100">
      <col width="100">
      <col width="150">
      <col>
    </colgroup>
    <thead align="center">
      <tr>
       <td colspan=3>2018年度综合考核双向互评（B）</td>
      </tr> 
       <tr>
      
            <td rowspan="2">单位</td>
            <td  >综合考核评价意见</td>
            <td rowspan="2">总体评价（选填）</td>
      </tr> 
	</thead>
    <tbody align="center">
<?php

mysql_select_db($database_connjxkh, $connjxkh);

$sql = "SELECT DeptName,DeptID FROM deptinfo where DeptMemo like '%院部%' ";

$result =mysql_query($sql, $connjxkh);
//$rs=mysql_fetch_array($result);
 while($row=mysql_fetch_row($result)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
		echo "<tr><td>".$row[0]."</td>";
		echo "<input name='DeptID' type='hidden' value='".$row[1]."' />";
		echo '<td><div class="layui-input-inline">
      <select name="manyi">
        <option value="0">非常满意</option>
        <option value="1"  selected = "selected">满意</option>
        <option value="2">基本满意</option>
        <option value="3">不满意</option>
      </select>
    </div></td>';
		echo '<td><div class="layui-input-block">
      <textarea name="text" placeholder="请输入内容！" class="layui-textarea"></textarea>
    </div></td></tr>';
}

mysql_close($connjxkh);
?>
	</tbody>
</table></div><br>
	<div class="layui-form-item layui-col-xs-offset6">
    	<input  class="layui-btn" type="button" onclick="test()" value="立即提交"/>
    </div>
</form>
</body>
<script> 
	function test(){
		var j=0;
		var count=0;
		var num = new Array();
		var text = new Array();
		var DeptID = new Array();
		var radio = new Array();
		var num = new Array();
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
		//获取部门ID
		var DeptID = new Array();
		var el  =document.getElementsByName("DeptID");
		for (var i = 0, j = el.length; i < j; i++){
			DeptID[i]=el[i].value;
		}
		
		$.ajax({
	      type:"POST",
	      url:"7-2018save.php",
	      data:'name='+JSON.stringify(radio)+'&DeptID='+JSON.stringify(DeptID)+'&text='+JSON.stringify(text),
	      dataType:"json",
	      success:function(data){
	        if(data.code==200){
				alert("提交成功，感谢您的回答!");
				window.location.href="getvote0.php";
	        }else{
				alert("保存失败！");
	        }
	      },
			error:function(data){alert("error");}
	    });
	}
</script>
<script>
layui.use('form', function(){
  var form = layui.form;
 
});
</script>

</html>
