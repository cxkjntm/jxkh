<?php require_once('../../../Connections/connjxkh.php'); ?>
<link rel="stylesheet" type="text/css" href="../../../lib/layer/theme/default/layer.css"/>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../../lib/layer/layer.js"></script>
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
  $updateSQL = sprintf("UPDATE DeptInfo SET DeptName=%s, DeptMemo=%s, IsBanned=%s WHERE DeptID=%s",
                       GetSQLValueString($_POST['DeptName'], "text"),
                       GetSQLValueString($_POST['DeptMemo'], "text"),
                       GetSQLValueString($_POST['IsBanned'], "int"),
                       GetSQLValueString($_POST['DeptID'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());
  if($Result1)
	  echo "<script type='text/javascript'>layer.msg('部门修改成功！');</script>";
}
$colname_rsDept = "-1";
if (isset($_GET['DeptID'])) {
  $colname_rsDept = $_GET['DeptID'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsDept = sprintf("SELECT * FROM DeptInfo WHERE DeptID = %s", GetSQLValueString($colname_rsDept, "int"));
$rsDept = mysql_query($query_rsDept, $connjxkh) or die(mysql_error());
$row_rsDept = mysql_fetch_assoc($rsDept);
$totalRows_rsDept = mysql_num_rows($rsDept);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改部门</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
</head>

<body >
<form  class=" layui-form" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">部门名称</label>
       </span>
       <div class="layui-input-inline">
         <span class="layui-bg-gray">
           <input type="text" name="DeptName" value="<?php echo htmlentities($row_rsDept['DeptName'],  ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>

<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">备注</label>
       </span>
       <div class="layui-input-inline">
         <span class="layui-bg-gray">
          <input type="text" name="DeptMemo" value="<?php echo htmlentities($row_rsDept['DeptMemo'],  ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
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
         <input type="text" name="IsBanned" value="<?php echo htmlentities($row_rsDept['IsBanned'],  ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" />        		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div> 
</div>
<div class="layui-row">
<div class="layui-col-md3"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md3">
 	<div class="layui-form-item">
       <div class="layui-input-inline">
            <span class="layui-bg-gray">
            <input type="submit" value="更新记录"  class="layui-btn layui-btn-fluid" />
        </span></div>                 
   </div>
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
  
</div> 
<div>
   <span class="layui-bg-gray">
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="DeptID" value="<?php echo $row_rsDept['DeptID']; ?>" />
  </span></div> 
</form>

</body>
</html>
<?php
mysql_free_result($rsDept);
?>
