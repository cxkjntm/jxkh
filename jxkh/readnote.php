<?php require_once('Connections/connjxkh.php'); ?>
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsnote = 10;
$pageNum_rsnote = 0;
if (isset($_GET['pageNum_rsnote'])) {
  $pageNum_rsnote = $_GET['pageNum_rsnote'];
}
$startRow_rsnote = $pageNum_rsnote * $maxRows_rsnote;

$colname_rsnote = "-1";
if (isset($_GET['NoteID'])) {
  $colname_rsnote = $_GET['NoteID'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsnote = sprintf("SELECT * FROM NoteInfo WHERE NoteID = %s", GetSQLValueString($colname_rsnote, "int"));
$query_limit_rsnote = sprintf("%s LIMIT %d, %d", $query_rsnote, $startRow_rsnote, $maxRows_rsnote);
$rsnote = mysql_query($query_limit_rsnote, $connjxkh) or die(mysql_error());
$row_rsnote = mysql_fetch_assoc($rsnote);

if (isset($_GET['totalRows_rsnote'])) {
  $totalRows_rsnote = $_GET['totalRows_rsnote'];
} else {
  $all_rsnote = mysql_query($query_rsnote);
  $totalRows_rsnote = mysql_num_rows($all_rsnote);
}
$totalPages_rsnote = ceil($totalRows_rsnote/$maxRows_rsnote)-1;

$queryString_rsnote = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsnote") == false && 
        stristr($param, "totalRows_rsnote") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsnote = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsnote = sprintf("&totalRows_rsnote=%d%s", $totalRows_rsnote, $queryString_rsnote);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="lib/layui245/css/layui.css"/>
</head>

<body>
<table border="1" align="center">
  <tr>
    <td>NoteID</td>
    <td>NoteTitle</td>
    <td>NotePublisher</td>
    <td>ReleasedTime</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="viewnote.php?recordID=<?php echo $row_rsnote['NoteID']; ?>"> <?php echo $row_rsnote['NoteID']; ?>&nbsp; </a></td>
      <td><?php echo $row_rsnote['NoteTitle']; ?>&nbsp; </td>
      <td><?php echo $row_rsnote['NotePublisher']; ?>&nbsp; </td>
      <td><?php echo $row_rsnote['ReleasedTime']; ?>&nbsp; </td>
    </tr>
    <?php } while ($row_rsnote = mysql_fetch_assoc($rsnote)); ?>
</table>
<br />
<table border="0">
  <tr>
    <td><?php if ($pageNum_rsnote > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsnote=%d%s", $currentPage, 0, $queryString_rsnote); ?>">第一页</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsnote > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsnote=%d%s", $currentPage, max(0, $pageNum_rsnote - 1), $queryString_rsnote); ?>">前一页</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsnote < $totalPages_rsnote) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsnote=%d%s", $currentPage, min($totalPages_rsnote, $pageNum_rsnote + 1), $queryString_rsnote); ?>">下一个</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_rsnote < $totalPages_rsnote) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsnote=%d%s", $currentPage, $totalPages_rsnote, $queryString_rsnote); ?>">最后一页</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
记录 <?php echo ($startRow_rsnote + 1) ?> 到 <?php echo min($startRow_rsnote + $maxRows_rsnote, $totalRows_rsnote) ?> (总共 <?php echo $totalRows_rsnote ?>
</body>
</html>
<?php
mysql_free_result($rsnote);
?>
