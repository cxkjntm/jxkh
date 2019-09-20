<?php require_once('../../../Connections/conninfo.php'); ?>
<?php

if (!isset($_SESSION)) {
  session_start();
}
$dbName='jxkh';
$voteissue=''; 
if (isset($_POST['voteissue'])) {
  $voteissue = $_POST['voteissue'];
}
$itemtype='';
if (isset($_POST['voteitem'])) {
  $voteitem = $_POST['voteitem'];
}
?>
<?php
$dbname_rstable = "-1";
if (isset($dbName)) {
  $dbname_rstable = (get_magic_quotes_gpc()) ? $dbName : addslashes($dbName);
}
$tablename_rstable = "-1";
$tablename_rstable="zcbz_result_".$voteissue;
if (isset($tableName)) {
  $tablename_rstable = (get_magic_quotes_gpc()) ? $tableName : addslashes($tableName);
}

mysql_query('SET NAMES UTF8');

mysql_select_db($database_conninfo, $conninfo);
$query_rstable = sprintf("SELECT TABLE_SCHEMA, TABLE_NAME FROM TABLES WHERE TABLE_SCHEMA = '%s' AND TABLES.TABLE_NAME='%s'", $dbname_rstable,$tablename_rstable);
$rstable = mysql_query($query_rstable, $conninfo) or die(mysql_error());
$row_rstable = mysql_fetch_assoc($rstable);
$totalRows_rstable = mysql_num_rows($rstable);
echo $totalRows_rstable;
if ($totalRows_rstable==0){
    system("python statjxkh_ty.py");
	}
else{
	$_SESSION["issuecode"]=$voteissue;
	$_SESSION["issueitem"]=$voteitem;
	switch ($voteitem){
		case 1:
			header("location:viewresult1.php");
			break;
		case 2:
			header("location:viewresult2.php");
			break;
		case 3:
			header("location:viewresult3.php");
			break;
		default:
			header("location:viewresult1.php");			
	}
	
}	

	
?>
<?php
mysql_free_result($rstable);
?>