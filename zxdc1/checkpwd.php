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
//echo $colname_rsUser2;

mysql_select_db($database_connjxkh, $connjxkh);
//$query_rsUser = sprintf("SELECT * FROM UserInfo WHERE UserName = %s and UserPwd=%s", GetSQLValueString($colname_rsUser1, "text"),GetSQLValueString($colname_rsUser2, "text"));
$query_rsUser = sprintf("SELECT * FROM UserInfo WHERE Account = %s ", GetSQLValueString($colname_rsUser1, "text"));
	//echo $query_rsUser."<br>";
$rsUser = mysql_query($query_rsUser, $connjxkh) or die(mysql_error());	
$row_rsUser= mysql_fetch_assoc($rsUser);
$count=mysql_num_rows($rsUser);
if($count>0){	

	$dbpassword=$row_rsUser["Passwd"];
		//echo $dbpassword."<br>";
	$t_hasher = new PasswordHash(8, FALSE);
	$hash = $t_hasher->HashPassword($colname_rsUser2);

		//echo 'Hash: ' . $hash . "<br>";
	$check = $t_hasher->CheckPassword($colname_rsUser2, $dbpassword);
	if ($check){
		$loginStrGroup = "";
		if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}	    
			
			
    
	 		$json_obj= json_encode(array('code'=>200));  
			echo $json_obj;   
			mysql_free_result($rsUser);
		}
		
		else{
			$json_obj= json_encode(array('code'=>'400'));	
			echo $json_obj;   
			mysql_free_result($rsUser);		
			}
   		
		}
	else{
		echo  $json_obj= json_encode(array('code'=>'404'));
		exit();
		
		}	
	





?>
