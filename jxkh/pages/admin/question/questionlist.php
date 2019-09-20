<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
$colname_rsQue = "-1";
if (isset($_GET['RecordID'])) {
  $colname_rsQue = (get_magic_quotes_gpc()) ? $_GET['RecordID'] : addslashes($_GET['RecordID']);
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsQue = sprintf("SELECT * FROM question WHERE parent_qid=0 and RecordID = %s", $colname_rsQue);
$rsQue = mysql_query($query_rsQue, $connjxkh) or die(mysql_error());
$row_rsQue = mysql_fetch_assoc($rsQue);
$totalRows_rsQue = mysql_num_rows($rsQue);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../../lib/layui230/css/layui.css">
<title>问卷题目信息</title>

</head>

<body>

<table class="layui-table" width="1000" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8%" height="34" align="center" valign="middle"><div align="center">序号</div></td>
    <td width="8%" align="center" valign="middle"><div align="center">父ID</div></td>
    <td width="8%" align="center" valign="middle"><div align="center">题目类型</div></td>
    <td width="8%" align="center" valign="middle"><div align="center">题目标记</div></td>
    <td width="50%" align="center" valign="middle"><div align="center">题目内容</div></td>
    <td width="8%" align="center" valign="middle">修改题目</td>
    <td width="8%" align="center" valign="middle">修改选项</td>
  </tr>
  <?php do { ?>
    <tr>
      <td height="30" align="center" valign="middle"><div align="center"><?php echo $row_rsQue['questionID']; ?></div></td>
      <td align="center" valign="middle"><div align="center"><?php echo $row_rsQue['parent_qid']; ?></div></td>
      <td align="center" valign="middle"><div align="center"><?php echo $row_rsQue['type']; ?></div></td>
      <td align="center" valign="middle"><div align="center"><?php echo $row_rsQue['title']; ?></div></td>
      <td align="center" valign="middle"><div align="left"><?php echo $row_rsQue['question']; ?></div></td>
      <td align="center" valign="middle"><p><a href="updatequestionitem.php?questionID=<?php echo $row_rsQue['questionID']; ?>&RecordID=<?php echo $_GET['RecordID']; ?>">修改题目</a></p>      </td>
      <td align="center" valign="middle"><a href="updateitem.php?questionID=<?php echo $row_rsQue['questionID']; ?>&RecordID=<?php echo $_GET['RecordID']; ?>">修改选项</a></td>
    </tr>
    <?php } while ($row_rsQue = mysql_fetch_assoc($rsQue)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($rsQue);
?>