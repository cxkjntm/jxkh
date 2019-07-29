<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php
 function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$RecordID="-1";
if (isset($_POST['RecordID'])) {
  $RecordID = (get_magic_quotes_gpc()) ? $_POST['RecordID'] : addslashes($_POST['RecordID']);
  echo $RecordID;
}


$questionID="-1";
$title="";
$question="";
if(isset($_POST['questionID']))
	$questionID=$_POST['questionID'];
if(isset($_POST['title']))
	$title=$_POST['title'];	
if(isset($_POST['question']))
	$question=$_POST['question'];	

//echo count($questionID);	
$size=count($questionID);
for($i=0;$i<$size;$i++){
	$updateSQL = sprintf("UPDATE question SET  title=%s, question=%s WHERE questionID=%s",
                       GetSQLValueString($title[$i], "text"),
                       GetSQLValueString($question[$i], "text"),                       
                       GetSQLValueString($questionID[$i], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());
 
}


 $updateGoTo = "questionlist.php?RecordID=".$RecordID;
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
?>
</body>
</html>
