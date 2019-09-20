<?php require_once('../Connections/connjxkh.php'); ?>
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
$UserIds=$_POST['userids'];

mysql_select_db($database_connjxkh, $connjxkh);
	//对userinfo表执行更新操作
$sql="update userinfo set IsDB=1 where UserID in (".$UserIds.")";
$result= mysql_query($sql);

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