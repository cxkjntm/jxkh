<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
header("Content-type:text/html;charset=utf-8");
//echo $_POST['id'];
if(isset($_POST['recordcode']))
	$recordcode=$_POST['recordcode'];
//echo $recordcode;
$query_rsVoteRecord=" Update voteRecord Set status='2'  where RecordCode=".$recordcode;
//echo $query_rsVoteRecord;
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$result = mysql_query($query_rsVoteRecord, $connjxkh) or die(mysql_error());
if($result)
	echo json_encode(array('code'=>200));
else
	echo json_encode(array('code'=>400));
mysql_close($connjxkh);
?>