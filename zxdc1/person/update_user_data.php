<?php require_once('../Connections/connjxkh.php'); ?>
<?PHP require '../lib/phpass/PasswordHash.php';?>
<?php
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
$UserName=$_POST['UserName'];
$Passwd=$_POST['Passwd'];
$LevelID=$_POST['LevelID'];
$DeptID=$_POST['DeptID'];
$UserID=$_POST['UserID'];

mysql_select_db($database_connjxkh, $connjxkh);
//查询用户原来的密码
$sql05="select Passwd from userinfo where UserID=".$UserID;
$result05 = mysql_fetch_assoc(mysql_query($sql05, $connjxkh));
echo $Passwd;
echo "<>";
echo $result05['Passwd'];
//如果密码有所改动就加密
if(strcmp($Passwd,$result05['Passwd'])){
	//密码加密
	$t_hasher = new PasswordHash(8, FALSE);
	$Passwd= $t_hasher->HashPassword($Passwd);
}

//查询用户的Account
$sql04="select Account from userinfo where UserID =".$UserID;
$result04 = mysql_fetch_assoc(mysql_query($sql04, $connjxkh));

//查询该用户是否是管理员
$sql02="select count(Account) as num from deptadmin where Account=".$result04['Account'];
$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));
if($result02['num']==1){
	//对deptadmin表执行更新操作
	$sql03="update deptadmin set Passwd='".$Passwd."' where Account=".$Account;
	$result03= mysql_query($sql03);
}
//执行更新语句
$sql01="update userinfo set UserName='".$UserName."',Passwd='".$Passwd."',LevelID='".$LevelID."',DeptID='".$DeptID."'
		where UserID = '".$UserID."'";
		$result01= mysql_query($sql01);

	if(!$result) {
		$json_obj= json_encode(array('code'=>400));	
 	}
	else{
		$json_obj= json_encode(array('code'=>200));
	}	
	//echo $sql01;
	echo $json_obj;
	mysql_close($connjxkh);	

?>