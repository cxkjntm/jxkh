<?php require_once('../../../Connections/connjxkh.php'); ?>
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

$currentPage = $_SERVER["PHP_SELF"];


$maxRows_rsrm = 10;
$pageNum_rsrm = 0;
if (isset($_GET['pageNum_rsrm'])) {
  $pageNum_rsrm = $_GET['pageNum_rsrm'];
}
$startRow_rsrm = $pageNum_rsrm * $maxRows_rsrm;

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsrm = "SELECT MenuInfo.MenuName, MenuInfo.Menu_URL, LevelInfo.LevelName, Role_Menu.id, Role_Menu.status FROM Role_Menu, MenuInfo, LevelInfo WHERE Role_Menu.status = 0 AND LevelInfo.LevelID=Role_Menu.role_id AND MenuInfo.MenuID=Role_Menu.menu_id";
$query_limit_rsrm = sprintf("%s LIMIT %d, %d", $query_rsrm, $startRow_rsrm, $maxRows_rsrm);
$rsrm = mysql_query($query_limit_rsrm, $connjxkh) or die(mysql_error());
$row_rsrm = mysql_fetch_assoc($rsrm);

if (isset($_GET['totalRows_rsrm'])) {
  $totalRows_rsrm = $_GET['totalRows_rsrm'];
} else {
  $all_rsrm = mysql_query($query_rsrm);
  $totalRows_rsrm = mysql_num_rows($all_rsrm);
}
$totalPages_rsrm = ceil($totalRows_rsrm/$maxRows_rsrm)-1;

$queryString_rsrm = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsrm") == false && 
        stristr($param, "totalRows_rsrm") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsrm = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsrm = sprintf("&totalRows_rsrm=%d%s", $totalRows_rsrm, $queryString_rsrm);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<table border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="center" valign="middle">序号</td>
    <td height="30" align="center" valign="middle">角色</td>
    <td height="30" align="center" valign="middle">菜单</td>
    <td align="center" valign="middle">网址</td>
    <td height="30" align="center" valign="middle">状态</td>
  </tr>
  
    <?php do { ?>
    <tr>
      <td height="30" align="center" valign="middle"><?php echo $row_rsrm['id']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsrm['LevelName']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsrm['MenuName']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rsrm['Menu_URL']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsrm['status']; ?></td>
      </tr>
      <?php } while ($row_rsrm = mysql_fetch_assoc($rsrm)); ?>
  
</table>
<table border="0">
  <tr>
    <td><?php if ($pageNum_rsrm > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsrm=%d%s", $currentPage, 0, $queryString_rsrm); ?>">第一页</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsrm > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsrm=%d%s", $currentPage, max(0, $pageNum_rsrm - 1), $queryString_rsrm); ?>">前一页</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsrm < $totalPages_rsrm) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsrm=%d%s", $currentPage, min($totalPages_rsrm, $pageNum_rsrm + 1), $queryString_rsrm); ?>">下一个</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_rsrm < $totalPages_rsrm) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsrm=%d%s", $currentPage, $totalPages_rsrm, $queryString_rsrm); ?>">最后一页</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rsrm);
?>
