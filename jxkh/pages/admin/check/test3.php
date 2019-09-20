<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>1、校级领导考核中层领导班子及成员</title> 
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
$number=array();

$number[0]=1;
$number[1]=2;
$number[2]=3;
$number[3]=4;
$number[4]=5;
$number[5]=6;

for($i=0;$i<6;$i++){
	$n1=rand(0,1000000);
	echo "<td>";
	for($m=0;$m<4;$m++)
		echo "<input name='".$number[$i]."' title='".$title[$m]."' type='radio' value='".$m."'>";
	echo "</td>";
	}
?>
                </tr>
            </tbody>
        </table>
        <p>
          <label>
            <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" />
            单选</label>
          <br />
          <label>
            <input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1" />
            单选</label>
          <br />
          <label>
            <input type="radio" name="RadioGroup1" value="3" id="RadioGroup1_2" />
            单选</label>
          <br />
        </p>
<div class="layui-form-item layui-col-xs-offset6">
      <a href="" class="layui-btn" onclick="test()">立即提交</a>
    </div>
	</form>
</body>
<script> 
	function test(){
		var radio = new Array();
		var DeptID = new Array();
		var UserID = new Array();
		var j=0;
		  var state=0;
		var c=document.getElementsByClassName(1);
		//alert(c.value);
		
		var d=document.getElementsByClassName(RadioFroup1);
		//alert(d[0].value);
		
		//获取单选组选中的结果（通过标签名获取）
		var obj = document.getElementsByTagName("RadioFroup1");
		for(var i=0; i<obj.length; i++){
			if(obj[i].checked){
				radio[j]=obj[i].value;j++;
				alert(obj[i].value);
			}else{
				state=1;
				}
				
		}
		if(state==1){
			alert("你有未选择的项目");
		}
			
		var el  =document.getElementsByName("UserID");
		var els =document.getElementsByName("DeptID");
		for (var i = 0, j = els.length; i < j; i++){
			DeptID[i]= els[i].value;
			UserID[i]=el[i].value;
			//alert(DeptID[i]);
			//alert(UserID[i]);
		}
		
	}
</script>
<script>
layui.use('form', function(){
	var form = layui.form;
});
</script>
</html>
