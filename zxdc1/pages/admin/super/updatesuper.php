<?php require_once('../../../Connections/connjxkh.php'); ?>
<link rel="stylesheet" type="text/css" href="../../../lib/layer/theme/default/layer.css"/>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../../lib/layer/layer.js"></script>
<?php
require '../../../lib/phpass/PasswordHash.php';

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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	$t_hasher = new PasswordHash(8, FALSE);	 
	$newpassword=$t_hasher->HashPassword($_POST['SuperPwd']);
  $updateSQL = sprintf("UPDATE superinfo SET SuperName=%s, SuperPwd=%s, SuperMemo=%s WHERE SuperID=%s",
                       GetSQLValueString($_POST['SuperName'], "text"),
                       GetSQLValueString($newpassword, "text"),
                       GetSQLValueString($_POST['SuperMemo'], "text"),
                       GetSQLValueString($_POST['SuperID'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());
  if($Result1)
	  echo "<script type='text/javascript'>layer.msg('管理员修改成功！');
				function jump(){parent.location.href='super.php';}
				setTimeout(jump,700);</script>";
}

$colname_rsSuper = "2";
if (isset($_GET['SuperID'])) {
  $colname_rsSuper = $_GET['SuperID'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsSuper = sprintf("SELECT * FROM superinfo WHERE SuperID = %s", GetSQLValueString($colname_rsSuper, "int"));
$rsSuper = mysql_query($query_rsSuper, $connjxkh) or die(mysql_error());
$row_rsSuper = mysql_fetch_assoc($rsSuper);
$totalRows_rsSuper = mysql_num_rows($rsSuper);
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
       <label class="layui-form-label layui-card ">管理员:</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="SuperName" value="<?php echo $row_rsSuper['SuperName']; ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>

<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">密码:</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="SuperPwd" value="<?php echo $row_rsSuper['SuperPwd']; ?>" size="32" class="layui-input" >        		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>

<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">备注:</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="SuperMemo" class="layui-input" value="<?php echo htmlentities($row_rsSuper['SuperMemo'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>
<div class="layui-row">
<div class="layui-col-md3"><span class="layui-bg-gray">&nbsp;</span></div>
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
  <input type="hidden" name="SuperID" value="<?php echo $row_rsSuper['SuperID']; ?>" />
</form>
 </span></div> 
</body>
</html>
<?php
mysql_free_result($rsSuper);
?>
