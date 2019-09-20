<?php require_once('Connections/connjxkh.php'); ?>
<?php require_once('include/config.php'); ?>
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

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['noteid'])) {
  $colname_DetailRS1 = $_GET['noteid'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_DetailRS1 = sprintf("SELECT * FROM noteinfo  WHERE NoteID = %s", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $connjxkh) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/Login.css"/>
<link rel="stylesheet" type="text/css" href="lib/layui245/css/layui.css"/>
<title><?php echo $row_DetailRS1['NoteTitle']; ?></title>
</head>

<body class="layui-main">
<div id="login_main">
        <div class="loginBox">
            <div class="loginTop">
                <p class="login-college">
                    <img id="school_logo" class="banner-school-img" src="images/hncj.png" alt="">
                    <span id="school_name" style=""><?php echo iconv("GB2312","UTF-8",$zzmc);?></span>
                </p>
                <p class="login-paper" id="xtmc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo iconv("GB2312","UTF-8",$xtmc);?></p>
            </div>
		</div>
</div>            
<div><p><br />
</p></div>
<div class="layui-form-item" align="center"><h1><?php echo $row_DetailRS1['NoteTitle']; ?></h1></div>
<div class="layui-form-item">发布:组织部--<?php echo $row_DetailRS1['NotePublisher']; ?></div>

<div class="layui-form-item">时间：<?php echo $row_DetailRS1['ReleasedTime']; ?></div>
<div class=" Ncontent" ><?php echo $row_DetailRS1['NoteContent']; ?> </div>
 <div style=" border-top: 1px solid #bac4cd; background-color: #f4f4f4;">
            <div class="footer clearfix">
                
                <div class="logtext-box">
                      <p><span> <h3>© 2019-<span id="nowyear">2019</span> <?php echo iconv("GB2312","UTF-8",$zzmc.$ywbm);?></h3> </span></p>
					<p><br /></p>
					<p>	<br /></p>
					<p><span> <h3>基础技术由<?php echo iconv("GB2312","UTF-8",$jszc);?>提供</h3></span></p>
              </div>
            </div>
        </div>
    </div>
</body>
</html><?php
mysql_free_result($DetailRS1);
?>