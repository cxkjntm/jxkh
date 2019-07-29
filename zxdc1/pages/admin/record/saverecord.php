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

	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	if(isset($_POST['recordname'])){
		 $recordname = $_POST['recordname'];
		}	   
		
	$recordcode =rand(100000,1000000);
	if(isset($_POST['starttime']))	
	    $starttime = $_POST['starttime'];
	if(isset($_POST['endtime']))	
	    $endtime = $_POST['endtime'];
	$status="0";
    
	
    
	

	mysql_select_db($database_connjxkh, $connjxkh);
	$insertSQL = sprintf("INSERT INTO voteRecord (RecordName, RecordCode, starttime, endtime,status) VALUES (%s, %s, %s, %s,%s)",
                       GetSQLValueString($recordname, "text"),
                       GetSQLValueString($recordcode, "int"),
                       GetSQLValueString($starttime, "text"),
                       GetSQLValueString($endtime, "text"),
					   GetSQLValueString($status, "text"));
   //echo $insertSQL;					   
    $Result1 = mysql_query($insertSQL, $connjxkh) or die(mysql_error());					   

		
	if (!$Result1)
 		 {
		 $json_obj= json_encode(array('code'=>400));			
  
 	 }
	 else{
		 $json_obj= json_encode(array('code'=>200));	
		 }			
	echo $json_obj;
	mysql_close($connjxkh);
?>


