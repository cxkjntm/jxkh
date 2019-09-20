<?php require_once('Connections/connjxkh.php'); ?>
<?php
require 'lib/phpass/PasswordHash.php';

if (!isset($_SESSION)) {
  session_start();
}

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

$colname_rsUser1 = 'admin888';
$loginUsername="-1";
if (isset($_POST['username'])) {
  $colname_rsUser1 = $_POST['username'];  
  $loginUsername=$colname_rsUser1;
}
//echo $colname_rsUser1;

$colname_rsUser2= '123456';
if (isset($_POST['password'])) {
  $colname_rsUser2 = $_POST['password'];
}

$t_hasher = new PasswordHash(8, FALSE);
$hash = $t_hasher->HashPassword($colname_rsUser2);
	
//echo $colname_rsUser2;
//echo $hash;
mysql_select_db($database_connjxkh, $connjxkh);
$updateSQL = sprintf("UPDATE userinfo SET Passwd=%s Where userinfo.Account=%s",
                       GetSQLValueString($hash, "text"),
					   GetSQLValueString($colname_rsUser1, "text"));

$Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());

//查询用户是否是部门管理员
$sql01="select count(Account) as num from deptadmin where Account =".$colname_rsUser1;
$result01 =	mysql_fetch_assoc(mysql_query($sql01, $connjxkh));

//如果是部门管理员，同时更新deptadmin表中的对应密码
if($result01['num']>=1){
	$sql02="update deptadmin set Passwd = '".$hash."' where Account=".$colname_rsUser1;
	mysql_query($sql02, $connjxkh);
}

if($Result1){
	$json_obj= json_encode(array('code'=>200));  
	echo $json_obj; 
	}
	  
mysql_close($connjxkh);

?>
