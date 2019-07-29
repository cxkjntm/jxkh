<?php require_once('../../../Connections/connjxkh.php'); ?>
<link rel="stylesheet" type="text/css" href="../../../lib/layer/theme/default/layer.css"/>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../../lib/layer/layer.js"></script>
<?php

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

mysql_query('SET NAMES UTF8');

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	
  $updateSQL = sprintf("UPDATE vote_questions SET title=%s,  question=%s, qtype=%s WHERE qid=%s",
                       GetSQLValueString($_POST['title'], "text"),                      
                       GetSQLValueString($_POST['question'], "text"),
                       GetSQLValueString($_POST['qtype'], "text"),					   
					   GetSQLValueString($_POST['qid'], "text"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());
  if($Result1)
	  echo "<script type='text/javascript'>layer.msg('记录修改成功，关闭页面后请刷新主页面！');</script>";
}

$colname_rsQuestion = "1";
if (isset($_GET['qid'])) {
  $colname_rsQuestion = $_GET['qid'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsQuestion = "SELECT * FROM vote_questions WHERE qid =".$colname_rsQuestion;
$rsQuestion = mysql_query($query_rsQuestion, $connjxkh) or die(mysql_error());
$row_rsQuestion = mysql_fetch_assoc($rsQuestion);
$totalRows_rsQuestion = mysql_num_rows($rsQuestion);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
</head>

<body>
<form class="layui-form" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">题目标记:</label>
       </span>
       <div class="layui-input-inline">
         <span class="layui-bg-gray">
           <input type="text" name="title" value="<?php echo htmlentities($row_rsQuestion['title'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>


<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">题目</label>
       </span>
       <div class="layui-input-inline">
         <span class="layui-bg-gray">
           <input type="text" name="question" value="<?php echo htmlentities($row_rsQuestion['question'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>

<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">类型</label>
       </span>
       <div class="layui-input-inline">
         <span class="layui-bg-gray">
           <input type="text" name="qtype" value="<?php echo htmlentities($row_rsQuestion['qtype'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>



<div class="layui-row">
<div class="layui-col-md4"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <div class="layui-input-inline">
            <span class="layui-bg-gray">
            <input type="submit" value="更新题目"  class="layui-btn layui-btn-fluid" />
        </span></div>                 
   </div>
 </div>
 <div class="layui-col-md5"><span class="layui-bg-gray">&nbsp;</span></div>
  
</div> 
<div>
   <span class="layui-bg-gray">
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="qid" value="<?php echo $row_rsQuestion['qid']; ?>" /> 
  </span>
 </div> 
</form>

</body>
</html>
<?php
mysql_free_result($rsQuestion);
?>
