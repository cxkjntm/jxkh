<?php require_once('../../../Connections/connjxkh.php'); ?>
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
  `voteIssue` varchar(40) NOT NULL,
  `zcgbztpj1` varchar(4) NOT NULL,
  `jcgbztpj2` varchar(4) NOT NULL,
  `zggbztpj3` varchar(4) NOT NULL,
  `zcbzjgpj4` varchar(4) NOT NULL,
  `zcgbzfpj5` varchar(4) NOT NULL,
  `zcbzzxpj6` varchar(4) NOT NULL,
  `zcbzjcpj7` varchar(4) NOT NULL,
  `zcbzyx8` varchar(40) NOT NULL,
  `zcgbyspj9` varchar(4) NOT NULL,
  `zcgbmzys10` varchar(4) NOT NULL,
  `zcgbddgc11` varchar(4) NOT NULL,
  `zcgbqzlz12` varchar(4) NOT NULL,
  `zcgbxnlj13` varchar(4) NOT NULL,
  `zcgbllxx14` varchar(4) NOT NULL,
  `zcgbdjfz15` varchar(4) NOT NULL,
  `zcgbzdj16` varchar(4) NOT NULL,
  `zcgbgzzt17` varchar(40) NOT NULL,
  `szydyxqk18` varchar(4) NOT NULL,
  `zcgbzfjs19` varchar(40) NOT NULL,
  `zcgbsztg20` varchar(40) NOT NULL,
  `zcgbblzf21` varchar(40) NOT NULL,
  `zcgbcyzd22` varchar(4) NOT NULL,
  `zcgbzfjq23` varchar(40) NOT NULL,
  `zcgbzfjy24` varchar(200) NOT NULL, PRIMARY KEY (`voteId`) ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8";
//echo $query_rsVoteRecord;
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$result = mysql_query($query_rsVoteRecord, $connjxkh) or die(mysql_error());
$query_update="Update voteRecord Set status='1'  where RecordCode=".$recordcode;
$result = mysql_query($query_update, $connjxkh) or die(mysql_error());
if($result)
	echo json_encode(array('code'=>200));
else
	echo json_encode(array('code'=>400));
mysql_close($connjxkh);
?>