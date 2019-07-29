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
	
  $updateSQL = sprintf("UPDATE voteRecord SET RecordName=%s,  starttime=%s, endtime=%s, describtion=%s, welcome=%s, end=%s WHERE RecordID=%s",
                       GetSQLValueString($_POST['RecordName'], "text"),                      
                       GetSQLValueString($_POST['starttime'], "text"),
                       GetSQLValueString($_POST['endtime'], "text"),
					   GetSQLValueString($_POST['describtion'], "text"),
					   GetSQLValueString($_POST['welcome'], "text"),
					   GetSQLValueString($_POST['end'], "text"),					   
					   GetSQLValueString($_POST['RecordID'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());
  if($Result1)
	  echo "<script type='text/javascript'>layer.msg('记录修改成功，关闭页面后请刷新主页面！');</script>";
}

$colname_rsRecord = "2";
if (isset($_GET['RecordID'])) {
  $colname_rsRecord = $_GET['RecordID'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsRecord = "SELECT * FROM voterecord WHERE RecordID =".$colname_rsRecord;
$rsRecord = mysql_query($query_rsRecord, $connjxkh) or die(mysql_error());
$row_rsRecord = mysql_fetch_assoc($rsRecord);
$totalRows_rsRecord = mysql_num_rows($rsRecord);
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
       <label class="layui-form-label layui-card ">记录名称:</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="RecordName" value="<?php echo htmlentities($row_rsRecord['RecordName'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>


<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">开始时间</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="starttime" value="<?php echo htmlentities($row_rsRecord['starttime'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>

<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">结束时间</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="endtime" value="<?php echo htmlentities($row_rsRecord['endtime'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>


<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">简介</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="describtion" value="<?php echo htmlentities($row_rsRecord['describtion'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>

<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">欢迎词</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="welcome" value="<?php echo htmlentities($row_rsRecord['welcome'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>


<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">感谢语</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="end" value="<?php echo htmlentities($row_rsRecord['end'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>

<div class="layui-row">
<div class="layui-col-md1"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md2">
 	<div class="layui-form-item">
       <div class="layui-input-block">
            <span class="layui-bg-gray">
            <input type="submit" value="更新记录"  class="layui-btn layui-btn-fluid" />
        </span></div>                 
   </div>
 </div>
 <div class="layui-col-md5"><span class="layui-bg-gray">&nbsp;</span></div>
  
</div> 
<div>
   <span class="layui-bg-gray">
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="RecordID" value="<?php echo $row_rsRecord['RecordID']; ?>" /> 
  </span>
 </div> 
</form>

</body>
</html>
<?php
mysql_free_result($rsRecord);
?>
