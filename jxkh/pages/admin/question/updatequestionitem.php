<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE question SET type=%s, title=%s, question=%s WHERE questionID=%s",
                       GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['question'], "text"),
                       GetSQLValueString($_POST['questionID'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());

  $updateGoTo = "questionlist.php?RecordID=".$RecordID;
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsQue = "-1";
if (isset($_GET['questionID'])) {
  $colname_rsQue = (get_magic_quotes_gpc()) ? $_GET['questionID'] : addslashes($_GET['questionID']);
}
$RecordID="-1";
if (isset($_GET['RecordID'])) {
  $RecordID = (get_magic_quotes_gpc()) ? $_GET['RecordID'] : addslashes($_GET['RecordID']);
}

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsQue = sprintf("SELECT * FROM question WHERE questionID = %s", $colname_rsQue);
$rsQue = mysql_query($query_rsQue, $connjxkh) or die(mysql_error());
$row_rsQue = mysql_fetch_assoc($rsQue);
$totalRows_rsQue = mysql_num_rows($rsQue);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui230/css/layui.css">
</head>

<body>

<form class="layui-form layui-form-panel" method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table width="59%" align="center" class="layui-table">
    <tr valign="baseline">
      <td height="30" align="left" valign="middle" nowrap><div align="center">类型:</div></td>
      <td height="30" align="left" valign="middle">
        <div align="left">
          <input type="text" name="type" value="<?php echo $row_rsQue['type']; ?>" size="80">
        </div></td>
    </tr>
    <tr valign="baseline">
      <td height="30" align="left" valign="middle" nowrap><div align="center">标记:</div></td>
      <td height="30" align="left" valign="middle">
        <div align="left">
          <input type="text" name="title" value="<?php echo $row_rsQue['title']; ?>" size="80">
        </div></td>
    </tr>
    <tr valign="baseline">
      <td height="30" align="left" valign="middle" nowrap><div align="center">题目内容:</div></td>
      <td height="30" align="left" valign="middle">
        <div align="left">
          <textarea name="question" cols="80" rows="5"><?php echo $row_rsQue['question']; ?></textarea>
        </div></td>
    </tr>
    <tr valign="baseline">
      <td height="30" align="left" valign="middle" nowrap><div align="center"></div></td>
      <td height="30" align="left" valign="middle">
        <div align="left">
          <input class="layui-btn" type="submit" value="更新记录">
        </div></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="questionID" value="<?php echo $row_rsQue['questionID']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsQue);
?>
