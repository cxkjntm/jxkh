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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO MenuInfo (MenuName, MenuMid, Menu_URL, Pare_Menu_ID, `Order`, Status) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['MenuName'], "text"),
                       GetSQLValueString($_POST['MenuMid'], "int"),
                       GetSQLValueString($_POST['Menu_URL'], "text"),
                       GetSQLValueString($_POST['Pare_Menu_ID'], "text"),
                       GetSQLValueString($_POST['Order'], "int"),
                       GetSQLValueString($_POST['Status'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($insertSQL, $connjxkh) or die(mysql_error());
  if($Result1)
	  echo "<script type='text/javascript'>layer.msg('菜单添加成功！');</script>";
  $insertGoTo = "menuinfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
      <td><input type="text" name="MenuName" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">菜单编码:</td>
      <td><input type="text" name="MenuMid" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">指向网址:</td>
      <td><input type="text" name="Menu_URL" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">上级菜单:</td>
      <td><input type="text" name="Pare_Menu_ID" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">排序:</td>
      <td><input type="text" name="Order" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">状态:</td>
      <td><input type="text" name="Status" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="插入记录" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>