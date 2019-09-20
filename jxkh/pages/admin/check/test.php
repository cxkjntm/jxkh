<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>7、综合考评双向互评（B）</title> 
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
       <td colspan=6>2018年度综合考核双向互评（B）</td>
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
	</thead>
    <tbody align="center">
<?php

mysql_select_db($database_connjxkh, $connjxkh);
$n=array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p");

$sql = "SELECT DeptName FROM deptinfo where DeptID>17 and DeptID<34";
$y=0;
$result =mysql_query($sql, $connjxkh);
 while($row=mysql_fetch_row($result)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
    foreach ($row as $DeptName){
		echo "<tr><td>".$DeptName."</td>";
		echo "<td> <input  name='".$n[$y]."' type='radio' value='0'></td>";
		echo "<td> <input  name='".$n[$y]."' type='radio' value='1'></td>";
		echo "<td> <input  name='".$n[$y]."' type='radio' value='2'></td>";
		echo "<td> <input  name='".$n[$y]."' type='radio' value='3'></td>";
		echo "<td><input  name='text' type='text' /></td></tr>";
		$y++;
	}
}
mysql_close($connjxkh);
?>
	</tbody>
</table></div><br>
	<div class="layui-form-item layui-col-xs-offset6"><a href="" class="layui-btn" onclick="test();">立即提交</a></div>
    
    <div class="layui-form-item">
    <div class="layui-input-block">
          <button class="layui-btn" lay-submit="" lay-filter="demo1">保存</button>
      <button class="layui-btn layui-btn-primary" type="reset">重置</button>
    </div>
  </div>
  
</form>
</body>
<script>
var t;
	function test(){
		var obj = document.getElementsByTagName("input");
		var num = new Array();
		for(var i=0; i<obj.length; i++){
			if(obj[i].checked){
				num[i]=obj[i].value;
				//alert(obj[i].value);
			}else{
				t=1;
				//return false;
			}
		}
		
		var text = new Array();
		var els =document.getElementsByName("text");
		for (var i = 0, j = els.length; i < j; i++){
			test[i]= els[i].value;
			//alert(els[i].value);
		}
		
		/*$.ajax({
	      type:"POST",
	      url:"",
	      data:'name='+JSON.stringify(num),
	      dataType:"json",
	      success:function(data){
	        if(data.code==200){
	          	//alert("保存成功！");
				window.location.href="welcome.html";
	        }else{
				alert("保存失败！");
	        }
	      },
			error:function(data){alert("error");},
	    });*/
		
		
	}
	/*function t(){
		return false;
		}*/
</script>
<script>
layui.use('form', function(){
  var form = layui.form;
	 //监听提交
	    form.on('submit(demo1)', function(data){
		
	var t;
	    var obj = document.getElementsByTagName("input");
		var num = new Array();
		for(var i=0; i<obj.length; i++){
			if(obj[i].checked){
				num[i]=obj[i].value;
				alert(obj[i].value);
			}else{
				t=1;
								//return false;
			}
		}
		if(t==1){
			
		}
	});
	 layui.msg('sdfsd');
 
});
</script>

</html>
