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

$colname_rsRole = "-1";
if (isset($_POST['LevelID'])) {
  $colname_rsRole = $_POST['LevelID'];
}
//echo $colname_rsRole;
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsRole = sprintf("update levelinfo set IsBanned=False WHERE LevelID = %s", GetSQLValueString($colname_rsRole, "int"));
$Result = mysql_query($query_rsRole, $connjxkh) or die(mysql_error());
if($Result)
	echo json_encode(array('code'=>200));
else
	echo json_encode(array('code'=>400));
mysql_close($connjxkh);
?>


