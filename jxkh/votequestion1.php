<?php require_once('/Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>预览</title> 
<link rel="stylesheet" href="lib/layui245/css/layui.css"  media="all">
<script src="lib/layui245/layui.js" charset="utf-8"></script>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['RecordID'])) {
  $RecordID = $_GET['RecordID'];
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

<form class="layui-form layui-form-pane" method="post" action="savevote2.php">
<div >
<?php

mysql_select_db($database_connjxkh, $connjxkh);
/**按Record搜索数据库*/

$sql = "SELECT RecordName FROM voterecord where RecordID =".$RecordID;
//echo $sql ;
$res = mysql_fetch_assoc(mysql_query($sql, $connjxkh));
echo "<div class='layui-fomr-item'><h1>&nbsp;&nbsp;&nbsp;&nbsp;".$res["RecordName"]."</h1></div>"; // 调查名输出

if (!function_exists("Perparation")) {
    function Perparation($result,$connjxkh,$RecordID)
    {
        $cnt = 0;
        while ($res = mysql_fetch_assoc($result)) {//取出表study_sql中的所有结果集
			$qid=$res["questionID"];
            $parent_qid = $res["parent_qid"];
			$title=$res["title"];
			
			$question=$res["question"];
			$type=$res["type"];
			if($parent_qid==0){
				
				echo "<div class='layui-form-item' pane=''><div class='layui-text' ><h3>".$title."、&nbsp;".$question."</h3></div>";
				
			}
			
			
			//echo $sqlitem;
			echo "<div class='layui-input-block '>";
			if($type =="T") 
				echo "<textarea placeholder='请输入内容'  name='".$title."' lay-verify='required' class='layui-textarea' value=''></textarea>";
			else{
				$sqlitem="SELECT * FROM question where RecordID =" . $RecordID."  and parent_qid=".$qid ." and parent_qid!=0 ";
				$resultitem = mysql_query($sqlitem, $connjxkh);
				while($resitem=mysql_fetch_assoc($resultitem)){			
					$questionID=$resitem["questionID"];
	            	$typeitem = $resitem["type"];
					$parent_qid_item = $resitem["parent_qid"];
					//echo $type;
	            	$titleitem = $resitem["title"];
	            	$question = $resitem["question"];
				//输出问卷问题
			
				//输出文本题答案
				
				//输出单选题答案
					if($typeitem==1&&$parent_qid_item!=0)  
						echo "<input type='radio' name='".$title."' title='".$titleitem."、".$question."' lay-skin='primary' value='".$titleitem."' />"; 		
				//输出多选题答案	
					if($typeitem==0&&$parent_qid_item!=0) 
						echo "<input type='checkbox' name='".$title."' title='".$titleitem."、".$question."' lay-skin='primary' value='".$titleitem."' />";
           
        		} 
			}				
			
			echo "</div>";
			echo "</div>";
			}
		}
			
    
}



$sql = "SELECT * FROM question where RecordID =" . $RecordID." and parent_qid=0 order by title";
//echo $sql;
$result = mysql_query($sql, $connjxkh);
$count=mysql_num_rows($result);
if ($count==0)
   echo "当前问卷还没有问题";
else
	Perparation($result,$connjxkh,$RecordID);

mysql_close($connjxkh);
?>
	<br>
	
	 <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
</div>
</form>
<script>

layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,$=layui.jquery
  
 function validate_all(){
    var radioName = new Array();
    $(":radio").each(function(){
        radioName.push($(this).attr("name"));
    });
    $(":checkbox").each(function(){
        radioName.push($(this).attr("name"));
    });	
    radioName.sort();
    $.unique(radioName);
    $.each(radioName,function(i,val){
		//alert(radioName[i]);
        if(!checkRadio(val)){
            alert("您还有未选择项，请选择，谢谢~");
			//$('input[name=radioName[i]]').eq(0).focus();			
            return false;
        }
    });
}
 

function checkRadio(radioName){
    return $("input[name="+radioName+"]:checked").val() == null ? false : true;
}

function  getCheckBoxValueOne(ctname) {
            //获取name="box"选中的checkBox的元素
            var  ids = $('input:checkbox[name='+ctname+']:checked');
             var data = '';
             //alert(ids);
             for (var i = 0; i < ids.length; i ++) {
                 //利用三元运算符去点
                 data += ids[i].value + (i == ids.length - 1 ? '':',');
             }
             //弹出结果
			//alert(data);
             return data;
}


  //监听提交
form.on('submit(demo1)', function(data){
	validate_all();
	layer.alert(JSON.stringify(data.field), {
      title: '最终的提交信息'
    });
	
    return true;
	
	   	
  });
  
  form.render();
});
</script>
</body>
</html>