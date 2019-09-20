<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE LevelInfo SET LevelName=%s, IsBanned=%s WHERE LevelID=%s",
                       GetSQLValueString($_POST['LevelName'], "text"),
                       GetSQLValueString($_POST['IsBanned'], "int"),
                       GetSQLValueString($_POST['LevelID'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());
}

$colname_rsRole = "-1";
if (isset($_GET['LevelID'])) {
  $colname_rsRole = $_GET['LevelID'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsRole = sprintf("SELECT * FROM LevelInfo WHERE LevelID = %s", GetSQLValueString($colname_rsRole, "int"));
$rsRole = mysql_query($query_rsRole, $connjxkh) or die(mysql_error());
$row_rsRole = mysql_fetch_assoc($rsRole);
$totalRows_rsRole = mysql_num_rows($rsRole);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<title>修改角色</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">角色名称</label>
       </span>
       <div class="layui-input-inline">
         <span class="layui-bg-gray">
           <input type="text" name="LevelName" value="<?php echo htmlentities($row_rsRole['LevelName'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >        		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>
<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">是否禁用</label>
       </span>
       <div class="layui-input-inline">
         <span class="layui-bg-gray">
           <input type="text" name="IsBanned" value="<?php echo htmlentities($row_rsRole['IsBanned'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >        		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>

<div class="layui-row">
<div class="layui-col-md5"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <div class="layui-input-inline">
            <span class="layui-bg-gray">
            <input type="submit" value="更新记录"  class="layui-btn layui-btn-fluid" />
        </span></div>                 
   </div>
 </div>
 <div class="layui-col-md3"><span class="layui-bg-gray">&nbsp;</span></div>
  
</div> 
 <div>
   <span class="layui-bg-gray">
  		<input type="hidden" name="MM_update" value="form1" />
  		<input type="hidden" name="LevelID" value="<?php echo $row_rsRole['LevelID']; ?>" />
  </span>
 </div> 
</form>

</body>
</html>
<?php
mysql_free_result($rsRole);
?>
