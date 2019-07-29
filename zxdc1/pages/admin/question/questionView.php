<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>预览</title> 
<link rel="stylesheet" href="../../../lib/layui245/css/layui.css"  media="all">
<script src="../../../lib/layui245/layui.js" charset="utf-8"></script>
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

<form >
<div class="layui-container">
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
			if($parent_qid==0){
				
				echo "<div class='layui-row'><div class='layui-form-item'>&nbsp;&nbsp;&nbsp;&nbsp;<ul><li>".$title.".".$question."</li></ul></div>";
			}
			$sqlitem="SELECT * FROM question where RecordID =" . $RecordID."  and parent_qid=".$qid ." and parent_qid!=0 ";
			//echo $sqlitem;
			
			$resultitem = mysql_query($sqlitem, $connjxkh);
			while($resitem=mysql_fetch_assoc($resultitem)){			
				$questionID=$resitem["questionID"];
	            $type = $resitem["type"];
				$parent_qid_item = $resitem["parent_qid"];
				//echo $type;
	            $titleitem = $resitem["title"];
	            $question = $resitem["question"];
			//输出问卷问题
			
			//输出文本题答案
				if($type =="T") echo "<input type='text' name='".$title."' placeholder='请输入内容'>";
			//输出单选题答案
				if($type==1&&$parent_qid_item!=0)  
				echo "<input type='radio' name='".$title."' value='' /> &nbsp;&nbsp;".$titleitem."、&nbsp;".$question."&ensp;"; 		
			//输出多选题答案	
				if($type==0&&$parent_qid_item!=0) 
				echo "<input name='".$title."' type='checkbox' value='' /> &nbsp;&nbsp;".$titleitem."、&ensp;".$question."&emsp;";
           
        	} 
			echo "</div>";
			
			}
		}
			
    
}



$sql = "SELECT * FROM question where RecordID =" . $RecordID." and parent_qid=0 order by questionID";
//echo $sql;
$result = mysql_query($sql, $connjxkh);
$count=mysql_num_rows($result);
if ($count==0)
   echo "当前问卷还没有问题，请添新问题";
else
	Perparation($result,$connjxkh,$RecordID);

mysql_close($connjxkh);
?>
	<br>
	<div class="layui-form-item"><a href="addquestion.php" class="layui-btn" ">&nbsp;&nbsp;&nbsp;&nbsp;添加新问题</a></div>
</div>
</form>
</body>
</html>