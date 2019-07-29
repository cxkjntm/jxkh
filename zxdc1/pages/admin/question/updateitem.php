<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php

mysql_query('SET NAMES UTF8');
$colname_rsItem = "-1";
if (isset($_GET['questionID'])) {
  $colname_rsItem = (get_magic_quotes_gpc()) ? $_GET['questionID'] : addslashes($_GET['questionID']);
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsItem = sprintf("SELECT * FROM question WHERE parent_qid = %s", $colname_rsItem);
$rsItem = mysql_query($query_rsItem, $connjxkh) or die(mysql_error());
$row_rsItem = mysql_fetch_assoc($rsItem);
$totalRows_rsItem = mysql_num_rows($rsItem);

$colname_rsQue = "-1";
if (isset($_GET['questionID'])) {
  $colname_rsQue = (get_magic_quotes_gpc()) ? $_GET['questionID'] : addslashes($_GET['questionID']);
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
<table class="layui-table" width="900" border="1">
  <tr>
    <td width="14%" height="30">题目序号：<?php echo $row_rsQue['questionID']; ?></td>
    <td width="10%">题目类型:<?php echo $row_rsQue['type']; ?></td>
    <td width="10%">题目标记:<?php echo $row_rsQue['title']; ?></td>
    <td width="66%">题目内容:<?php echo $row_rsQue['question']; ?></td>
  </tr>
</table>
<form action="saveitem1.php" method="post">
<table class="layui-table" width="900" border="1">
<tr>
      <td height="30" align="center" valign="middle"><div align="center">选项标记</div></td>
      <td align="center" valign="middle"><div align="center">选项内容</div><input name="RecordID" type="hidden" value="<?php echo $_GET["RecordID"]; ?>" /></td>         
    </tr>
 <?php do { ?>
    <tr>
      <td height="30" align="center" valign="middle"><div align="center">
	  <input name="questionID[]" type="hidden" value="<?php echo $row_rsItem['questionID']; ?>" />
	  <input name="title[]" type="text"  value="<?php echo $row_rsItem['title']; ?>"/></div></td>
      <td align="center" valign="middle"><div align="center"><input name="question[]" type="text"  value="<?php echo $row_rsItem['question']; ?>"/></div></td>         
    </tr>
    <?php } while ($row_rsItem = mysql_fetch_assoc($rsItem)); ?>
	<tr>
      <td height="30" align="center" valign="middle"><div align="center">--></div></td>
      <td align="center" valign="middle"><div align="center"><input class="layui-btn" name="保存信息" type="submit" /></div></td>         
    </tr>
</table>


</form>
</body>
</html>
<?php
mysql_free_result($rsItem);

mysql_free_result($rsQue);
?>
