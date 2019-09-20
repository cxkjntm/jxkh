<?php require_once('../../Connections/connjxkh.php'); ?>
<?php
require '../../lib/phpass/PasswordHash.php';

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
$colname_rsSuper1 = '-1';
$loginUsername="-1";

if (isset($_POST['SuperName'])) {
  $colname_rsSuper1 = $_POST['SuperName'];    
}

//echo $colname_rsSuper1;

$loginUsername= $colname_rsSuper1;
//echo $loginUsername;
$colname_rsSuper2= '123456';
if (isset($_POST['SuperPwd'])) {
  $colname_rsSuper2 = $_POST['SuperPwd'];
}
//echo $colname_rsSuper2;
mysql_select_db($database_connjxkh, $connjxkh);
//$query_rsSuper = sprintf("SELECT * FROM SuperInfo WHERE SuperName = %s and SuperPwd=%s", GetSQLValueString($colname_rsSuper1, "text"),GetSQLValueString($colname_rsSuper2, "text"));
$query_rsSuper = sprintf("SELECT * FROM superinfo WHERE SuperName = %s ", GetSQLValueString($colname_rsSuper1, "text"));
//echo $query_rsSuper."<br>";
$rsSuper = mysql_query($query_rsSuper, $connjxkh) or die(mysql_error());
$row_rsSuper = mysql_fetch_assoc($rsSuper);

//echo $totalRows_rsSuper."<br>";
$dbpassword=$row_rsSuper["SuperPwd"];
//echo $dbpassword."<br>";
$t_hasher = new PasswordHash(8, FALSE);
$hash = $t_hasher->HashPassword($colname_rsSuper2);

//echo 'Hash: ' . $hash . "<br>";
$check = $t_hasher->CheckPassword($colname_rsSuper2, $dbpassword);
//echo $check;
if ($check){
	 $loginStrGroup = "";
	 if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Supername'] = $loginUsername;
    
	 $json_obj= json_encode(array('code'=>200));  
	}
		
else
   $json_obj= json_encode(array('code'=>400));	
echo $json_obj;   

mysql_free_result($rsSuper);
?>
