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
	if(isset($_POST['title'])){
		 $title = $_POST['title'];
		}	   	
	
	if(isset($_POST['question']))	
	    $question = $_POST['question'];
	$qtype = 'T';
	
    
	

	mysql_select_db($database_connjxkh, $connjxkh);
	//get last index of question 
	$sql="SELECT MAX(qid) AS lastqid FROM vote_questions WHERE parent_qid=0";
	$rsQuestion = mysql_query($sql, $connjxkh) or die(mysql_error());
	$row_rsQuestion = mysql_fetch_assoc($rsQuestion);
	$lastqid=$row_rsQuestion["lastqid"];
	
	$insertSQL = sprintf("INSERT INTO vote_questions (title, parent_qid,question, qtype) VALUES (%s, %s, %s,%s)",
                       GetSQLValueString($title, "text"),
					   GetSQLValueString($lastqid, "text"),                        
                       GetSQLValueString($question, "text"),
                       GetSQLValueString($qtype, "text")
					   );
   echo $insertSQL;					   
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
	header("location:additem.php");			   
