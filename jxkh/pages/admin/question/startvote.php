<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
$colname_rsQue = "-1";
if (isset($_POST['RecordID'])) {
  $colname_rsQue = (get_magic_quotes_gpc()) ? $_POST['RecordID'] : addslashes($_POST['RecordID']);
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsQue = sprintf("SELECT * FROM question WHERE parent_qid=0 and RecordID = %s", $colname_rsQue);
$rsQue = mysql_query($query_rsQue, $connjxkh) or die(mysql_error());
$row_rsQue = mysql_fetch_assoc($rsQue);
$totalRows_rsQue = mysql_num_rows($rsQue);
?>
<?php
header("Content-type:text/html;charset=utf-8");
//echo $_POST['id'];
if(isset($_POST['recordcode']))
	$recordcode=$_POST['recordcode'];
//echo $recordcode;
//$recordcode=588258;
$tableName="voteRecord_".$recordcode;
//echo $tableName;
$query_rsVoteRecord="CREATE TABLE ".$tableName."(`voteId` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `voteTime` varchar(100) NOT NULL,
  `voteIssue` varchar(40) NOT NULL,";
$sql="";  
$yueshu="";
 do {  
 	if ($row_rsQue['type']="S")
		$yueshu=" varchar(4) NOT NULL,";
     else if($row_rsQue['type']="D")
	     	  $yueshu=" varchar(40) NOT NULL,";
		   else
		       $yueshu=" varchar(255) NOT NULL,";
		 
     $sql=$sql."`".$row_rsQue['title']."`"." ".$yueshu;
 	
 } while ($row_rsQue = mysql_fetch_assoc($rsQue));  
$sql1=" PRIMARY KEY (`voteId`) ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8";
$query_rsVoteRecord=$query_rsVoteRecord.$sql.$sql1;
//echo $query_rsVoteRecord;
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$result = mysql_query($query_rsVoteRecord, $connjxkh) or die(mysql_error());
$query_update="Update voterecord Set status='Running'  where RecordCode='".$recordcode."'";
$result = mysql_query($query_update, $connjxkh) or die(mysql_error());
if($result)
	echo json_encode(array('code'=>200));
else
	echo json_encode(array('code'=>400));
mysql_close($connjxkh);
?>
<?php
mysql_free_result($rsQue);
?>
