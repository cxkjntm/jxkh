<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
require '../../../lib/phpass/PasswordHash.php';
mysql_query('SET NAMES UTF8');
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
//获取修改后的值
$Account=$_POST['Account'];
$Passwd=$_POST['Passwd'];
$DeptID=$_POST['DeptID'];
$AdminID=$_POST['AdminID'];
mysql_select_db($database_connjxkh, $connjxkh);
//获取用户原先的密码
$sql04="select Passwd from deptadmin where Account=".$Account;
$result04 = mysql_fetch_assoc(mysql_query($sql04, $connjxkh));
//比较接收的密码值与原来的密码值是否一致
//如果不相等
//echo $Passwd;
//echo "<br>";
if(strcmp($Passwd,$result04['Passwd'])){
	//对密码进行加密
	$t_hasher = new PasswordHash(8, FALSE);
	$Passwd= $t_hasher->HashPassword($Passwd);
	//同时对userinfo表执行更新操作
	$sql03="update userinfo set Passwd='".$Passwd."' where Account=".$Account;
	$result03= mysql_query($sql03);
}
	//echo $Passwd;
//执行更新语句
$sql01="update deptadmin set Account='".$Account."',Passwd='".$Passwd."',DeptID='".$DeptID."'
		where AdminID = '".$AdminID."'";
		$result01= mysql_query($sql01);
	
	if(!$result01) {
		$json_obj= json_encode(array('code'=>400));	
 	}
	else{
		$json_obj= json_encode(array('code'=>200));
	}	
	//echo $sql01;
	echo $json_obj;
	mysql_close($connjxkh);	

?>