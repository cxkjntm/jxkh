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
mysql_query('SET NAMES UTF8');
$maxRows_rsUser = 10;
$pageNum_rsUser = 0;
if (isset($_GET['pageNum_rsUser'])) {
  $pageNum_rsUser = $_GET['pageNum_rsUser'];
}
$startRow_rsUser = $pageNum_rsUser * $maxRows_rsUser;

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsUser = "SELECT userinfo.UserID, userinfo.UserName, userinfo.Passwd, userinfo.Rank, userinfo.Photo, userinfo.IsEvaluated, userinfo.IsPj, deptinfo.DeptName, levelinfo.LevelName, userinfo.Account, userinfo.IsBanned FROM deptinfo, levelinfo, userinfo WHERE userinfo.DeptID=deptinfo.DeptID AND levelinfo.LevelID=userinfo.Rank ORDER BY userinfo.UserID ASC";
$query_limit_rsUser = sprintf("%s LIMIT %d, %d", $query_rsUser, $startRow_rsUser, $maxRows_rsUser);
$rsUser = mysql_query($query_limit_rsUser, $connjxkh) or die(mysql_error());
$row_rsUser = mysql_fetch_assoc($rsUser);

if (isset($_GET['totalRows_rsUser'])) {
  $totalRows_rsUser = $_GET['totalRows_rsUser'];
} else {
  $all_rsUser = mysql_query($query_rsUser);
  $totalRows_rsUser = mysql_num_rows($all_rsUser);
}
$totalPages_rsUser = ceil($totalRows_rsUser/$maxRows_rsUser)-1;

$queryString_rsUser = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsUser") == false && 
        stristr($param, "totalRows_rsUser") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsUser = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsUser = sprintf("&totalRows_rsUser=%d%s", $totalRows_rsUser, $queryString_rsUser);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户信息</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
</head>

<body>
<table class="layui-table" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="center" valign="middle">序号</td>
    <td align="center" valign="middle">用户工号</td>
    <td height="30" align="center" valign="middle">用户名称</td>
    <td height="30" align="center" valign="middle">登录密码</td>
    <td height="30" align="center" valign="middle">个人照片</td>
    <td height="30" align="center" valign="middle">服务部门</td>
    <td height="30" align="center" valign="middle">个人职级</td>
    <td height="30" align="center" valign="middle">是否参评</td>
    <td height="30" align="center" valign="middle">是否评价</td>
    <td align="center" valign="middle">是否禁用</td>
    <td height="30" align="center" valign="middle">修改</td>
    <td height="30" align="center" valign="middle">禁用</td>
    <td height="30" align="center" valign="middle">启用</td>
  </tr>
  <?php do { ?>
    <tr>
      <td height="30" align="center" valign="middle"><?php echo $row_rsUser['UserID']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rsUser['Account']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsUser['UserName']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsUser['Passwd']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsUser['Photo']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsUser['DeptName']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsUser['LevelName']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsUser['IsEvaluated']; ?></td>
      <td height="30" align="center" valign="middle"><?php echo $row_rsUser['IsPj']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rsUser['IsBanned']; ?></td>
      <td height="30" align="center" valign="middle" ><a href="updateuser.php?UserID=<?php echo $row_rsUser['UserID']; ?>">修改</a></td>
      <td height="30" align="center" valign="middle"><a href="banuser.php?UserID=<?php echo $row_rsUser['UserID']; ?>">禁用</a></td>
      <td height="30" align="center" valign="middle"><a href="enableuser.php?UserID=<?php echo $row_rsUser['UserID']; ?>">启用</a></td>
    </tr>
    <?php } while ($row_rsUser = mysql_fetch_assoc($rsUser)); ?>
</table>
<table border="0">
  <tr>
    <td><?php if ($pageNum_rsUser > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsUser=%d%s", $currentPage, 0, $queryString_rsUser); ?>"><img src="../First.gif" /></a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsUser > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsUser=%d%s", $currentPage, max(0, $pageNum_rsUser - 1), $queryString_rsUser); ?>"><img src="../Previous.gif" /></a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsUser < $totalPages_rsUser) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsUser=%d%s", $currentPage, min($totalPages_rsUser, $pageNum_rsUser + 1), $queryString_rsUser); ?>"><img src="../Next.gif" /></a>
    <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_rsUser < $totalPages_rsUser) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsUser=%d%s", $currentPage, $totalPages_rsUser, $queryString_rsUser); ?>"><img src="../Last.gif" /></a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rsUser);
?>
