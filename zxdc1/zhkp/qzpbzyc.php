<?php require_once('../Connections/connjxkh.php'); require('logincheck.php');require('knik.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>5.群众评领导班子及成员</title> 
<link rel="stylesheet" href="../lib/layui245/css/layui.css"  media="all">
<script src="../lib/layui245/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../lib/jquery-3.2.1.js"></script>

<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['title'])) {
  $t = $_POST['title'];
}
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
mysql_select_db($database_connjxkh, $connjxkh);
$sql1="SELECT d.DeptID,d.DeptName FROM userinfo i JOIN deptinfo d ON d.DeptID=i.DeptID WHERE Account='".$Account."'";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
	
?>
</head>

<body class="layui-main ">
<form class="layui-form">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center"><b>群众评领导班子及成员</b></legend>
</fieldset>
<div class="layui-form">
<div class="layui-container">
<table class="layui-table">
    <colgroup>
      <col width="200">
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
       <td colspan=7 align="center"><b>2018年度综合考核群众评价-中层领导班子评价意见</b></td>
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
  </table><b>
  注：分项评价意见〔A〕〔B〕〔C〕〔D〕分别为好、较好、一般、差，总体评价意见〔A〕〔B〕〔C〕〔D〕分别为优秀、称职、基本称职、不称职；</b>
<table class="layui-table">
    <thead align="center">
     <tr>
       <td colspan=8 align="center"><b>2018年度综合考核群众评价-中层领导干部评价意见(<?php echo $rs['DeptName']?>)</td>
      </b></tr> 
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
    </thead><tbody align="center">
<?php
$title=array("A","B","C","D");
mysql_select_db($database_connjxkh, $connjxkh);

//查询该部门中中层领导干部的姓名和ID
$sql = "SELECT UserName,UserID FROM userinfo where DeptID=".$rs['DeptID']." and (LevelID=2 OR LevelID=3)";

$result =mysql_query($sql, $connjxkh);
echo "<input id='DeptID' name='DeptID' type='hidden' value='".$rs['DeptID']."' />";
 while($row=mysql_fetch_row($result)){       
		echo "<tr><td>".$row[0]."</td>";
		echo "<input name='UserID' type='hidden' value='".$row[1]."' />";
		
		for($i=0;$i<7;$i++){
			$n1=rand(0,1000000);
			echo "<td>";
			for($m=0;$m<4;$m++){echo " <input name='".$n1."' type='radio'title='".$title[$m]."' value='".$m."'>";}
			echo "</td>";
		}
		echo "</tr>";
}
//查询该部门的中层领导有多少位
$sql2 = "SELECT COUNT(LevelID)as number FROM userinfo WHERE DeptID=".$rs['DeptID']." AND LevelID=2 GROUP BY LevelID;";
$result2=(mysql_query($sql2,$connjxkh));
while($row1 = mysql_fetch_array($result2))
echo "<input id='number1' name='number' type='hidden' value='".$row1['number']."'/>";

$sql3 = "SELECT COUNT(LevelID)as number FROM userinfo WHERE DeptID=".$rs['DeptID']." AND LevelID=3 GROUP BY LevelID;";
$result3=(mysql_query($sql3,$connjxkh));
while($row2 = mysql_fetch_array($result3))
echo "<input id='number2' name='number' type='hidden' value='".$row2['number']."'/>";

mysql_close($connjxkh);
?></tbody></table></div>
<br>
	<div class="layui-form-item layui-col-xs-offset6">
		<input class="layui-btn" type="button" onclick="test()" value="立即提交"/>
	</div>
</div>
</form>
</body>
<script> 
	function test(){
		var j=0;
		var count=0;
		var radio = new Array();
		var UserID = new Array();
		//获取选项
		var obj = document.getElementsByTagName("input");
		for(var i=0; i<obj.length; i++){
			if(obj[i].checked){
				radio[j]=obj[i].value;
				j++;count++;
				//alert(obj[i].value);
			}
		}
		//alert(radio.length);
		//alert(count);
		//获取UserID
		var el  =document.getElementsByName("UserID");
		for (var i = 0, j = el.length; i < j; i++){
			UserID[i]=el[i].value;
			//alert(el[i].value);
		}
		//获取该部门中层领导的人数
		var number1=document.getElementById("number1").value;
		var number2=document.getElementById("number2").value;
		if(number1*7+number2*7+6==count){
		//传值
		$.ajax({
	      type:"POST",
	      url:"5-2018save.php",
	      data:'name='+JSON.stringify(radio)+'&UserID='+JSON.stringify(UserID),
	      dataType:"json",
	      success:function(data){
	        if(data.code==200){
	          	//alert("保存成功！");
				alert("提交成功，感谢您的回答！");
				window.location.href="getvote3.php";
	        }else{
				alert("保存失败！");
				
	        }
	      },
			error:function(data){alert("提交成功，感谢您的回答！");
				window.location.href="getvote3.php";},
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
