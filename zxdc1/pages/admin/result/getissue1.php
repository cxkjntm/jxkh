<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
header("Content-type:text/html;charset=utf-8");
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
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsIssue = "SELECT * FROM voterecord where status='Finished' and khtype=1";
$rsIssue = mysql_query($query_rsIssue, $connjxkh) or die(mysql_error());
$row_rsIssue = mysql_fetch_assoc($rsIssue);
$totalRows_rsIssue = mysql_num_rows($rsIssue);

$arr = array(); 
if($totalRows_rsIssue>0){
	
	 do 		
	 {
	  	 
		array_push($arr,$row_rsIssue); 		
		

	}while($row_rsIssue = mysql_fetch_assoc($rsIssue));
	
}
echo json_encode($arr,JSON_UNESCAPED_UNICODE); 	
?>

<?php
mysql_free_result($rsIssue);
?>
