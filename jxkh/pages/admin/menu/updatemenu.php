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
  $updateSQL = sprintf("UPDATE MenuInfo SET MenuName=%s, MenuMid=%s, Menu_URL=%s, Pare_Menu_ID=%s, `Order`=%s, status=%s WHERE MenuID=%s",
                       GetSQLValueString($_POST['MenuName'], "text"),
                       GetSQLValueString($_POST['MenuMid'], "int"),
                       GetSQLValueString($_POST['Menu_URL'], "text"),
                       GetSQLValueString($_POST['Pare_Menu_ID'], "text"),
                       GetSQLValueString($_POST['Order'], "int"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['MenuID'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());
  if($Result1)
	  echo "<script type='text/javascript'>layer.msg('菜单修改成功！');</script>";
}

$colname_rsMenu = "-1";
if (isset($_GET['MenuID'])) {
  $colname_rsMenu = $_GET['MenuID'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsMenu = sprintf("SELECT * FROM MenuInfo WHERE MenuID = %s", GetSQLValueString($colname_rsMenu, "int"));
$rsMenu = mysql_query($query_rsMenu, $connjxkh) or die(mysql_error());
$row_rsMenu = mysql_fetch_assoc($rsMenu);
$totalRows_rsMenu = mysql_num_rows($rsMenu);

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsMainMenu = "SELECT * FROM MenuInfo WHERE Pare_Menu_ID = '0'";
$rsMainMenu = mysql_query($query_rsMainMenu, $connjxkh) or die(mysql_error());
$row_rsMainMenu = mysql_fetch_assoc($rsMainMenu);
$totalRows_rsMainMenu = mysql_num_rows($rsMainMenu);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>无标题文档</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">菜单名称:</td>
      <td><input type="text" name="MenuName" value="<?php echo htmlentities($row_rsMenu['MenuName'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">菜单编码:</td>
      <td><input type="text" name="MenuMid" value="<?php echo htmlentities($row_rsMenu['MenuMid'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">指向网页:</td>
      <td><input type="text" name="Menu_URL" value="<?php echo htmlentities($row_rsMenu['Menu_URL'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">上级菜单:</td>
      <td>
        <select name="Pare_Menu_ID" id="Pare_Menu_ID">
        <option value="<?php echo $row_rsMenu['Pare_Menu_ID']?>"><?php echo $row_rsMainMenu['MenuName']?></option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsMainMenu['MenuMid']?>"><?php echo $row_rsMainMenu['MenuName']?></option>
          <?php
} while ($row_rsMainMenu = mysql_fetch_assoc($rsMainMenu));
  $rows = mysql_num_rows($rsMainMenu);
  if($rows > 0) {
      mysql_data_seek($rsMainMenu, 0);
	  $row_rsMainMenu = mysql_fetch_assoc($rsMainMenu);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">排序:</td>
      <td><input type="text" name="Order" value="<?php echo htmlentities($row_rsMenu['Order'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">状态:</td>
      <td><input type="text" name="status" value="<?php echo htmlentities($row_rsMenu['Status'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="更新记录" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="MenuID" value="<?php echo $row_rsMenu['MenuID']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsMenu);

mysql_free_result($rsMainMenu);
?>
