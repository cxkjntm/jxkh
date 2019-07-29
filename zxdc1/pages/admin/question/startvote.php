<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
$colname_rsQue = "7";
if (isset($_POST['RecordID'])) {
  $colname_rsQue = (get_magic_quotes_gpc()) ? $_POST['RecordID'] : addslashes($_POST['RecordID']);
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsQue = sprintf("SELECT * FROM voterecord WHERE  RecordID = %s", $colname_rsQue);
$rsQue = mysql_query($query_rsQue, $connjxkh) or die(mysql_error());
$row_rsQue = mysql_fetch_assoc($rsQue);
$khtype=$row_rsQue['khtype'];
$totalRows_rsQue = mysql_num_rows($rsQue);
?>
<?php
header("Content-type:text/html;charset=utf-8");
//echo $_POST['id'];
if(isset($_POST['recordcode']))
	$recordcode=$_POST['recordcode'];
//echo $recordcode;
//$recordcode=588258;
$tableName="";

//echo $tableName;
function startvote($sql,$database_connjxkh,$connjxkh){
	mysql_query('SET NAMES UTF8');
	mysql_select_db($database_connjxkh, $connjxkh);
	$result = mysql_query($sql, $connjxkh) or die(mysql_error());

}


//$khtype=$row_rsQue['khtype'];
//echo $khtype;
//exit;

//创建平时调查表
if ($khtype==0){
	$tableName="pswjdc_".$recordcode;
	$query_rsVoteRecord="CREATE TABLE ".$tableName."(`voteId` int(11) NOT NULL AUTO_INCREMENT,
`UserID` int(11) NOT NULL,
`DeptID` int(11) NOT NULL,
`voteTime` varchar(100) NOT NULL,	  
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
`zcgbzfjy24` varchar(200) NOT NULL, PRIMARY KEY (`voteId`) ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";
	  startvote($query_rsVoteRecord,$database_connjxkh,$connjxkh);
}  
//创建2019中层干部综合考核表
if($khtype==1){
	
	//创建中层领导班子互评表（校领导评中层班子）
	 $tableName="zc_ldbzkhinfo_".$recordcode;
	 $query_rsVoteRecord="CREATE TABLE ".$tableName."(`Id` int(11) NOT NULL AUTO_INCREMENT, 
	 `UserID` int(11) NOT NULL,
	 `DeptID` int(11) NOT NULL,
	 `voteTime` varchar(100) NOT NULL,	 
	 `ZHKH` varchar(255) NOT NULL, PRIMARY KEY (`Id`) ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";
	 startvote($query_rsVoteRecord,$database_connjxkh,$connjxkh);
	 
	 //创建中层领导干部互评表（校领导评中层干部）
	 $tableName="zc_ldcykhinfo_".$recordcode;
			 $query_rsVoteRecord="CREATE TABLE ".$tableName." (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `UserID` int(11) NOT NULL,
		  `BPUserID` int(11) NOT NULL,
		  `DeptID` int(11) NOT NULL,
		  `DDJS` varchar(255) NOT NULL,
		  `LDNL` varchar(255) NOT NULL,
		  `LZJS` varchar(255) NOT NULL,
		  `LXYZ` varchar(255) NOT NULL,
		  PRIMARY KEY (`id`) USING BTREE,
		  KEY `userid` (`UserID`) USING BTREE,
		  KEY `depid` (`DeptID`) USING BTREE,
		  KEY `bpuser` (`BPUserID`) USING BTREE
		) ENGINE=InnoDB DEFAULT CHARSET=utf8";
	startvote($query_rsVoteRecord,$database_connjxkh,$connjxkh);
	
	//创建正职评副职表
	 $tableName="qz_ldcykhinfo_".$recordcode;
	$query_rsVoteRecord="CREATE TABLE ".$tableName." (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `UserID` int(11) NOT NULL,
		  `BPUserID` int(11) NOT NULL,
		  `DeptID` int(11) NOT NULL,
		  `ZZSX` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `GZNL` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `GZZF` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `YFBS` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `LXYZ` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `LJZV` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `ZTPJ` varchar(255) CHARACTER SET utf8 NOT NULL,
		  PRIMARY KEY (`id`) USING BTREE,
		  KEY `userid1` (`UserID`) USING BTREE,
		  KEY `depid1` (`DeptID`) USING BTREE,
		  KEY `bpuser1` (`BPUserID`) USING BTREE
		) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
	  startvote($query_rsVoteRecord,$database_connjxkh,$connjxkh);
	  
	//创建群众评本部门领导班子表
	 $tableName="qz_ldbzkhinfo_".$recordcode;
			 $query_rsVoteRecord="CREATE TABLE ".$tableName." (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `UserID` int(11) NOT NULL,
		  `DeptID` int(11) NOT NULL,
		  `DDJS` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `LDNL` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `GZSJ` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `LZJS` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `XXJY` varchar(255) CHARACTER SET utf8 NOT NULL,
		  `ZTPJ` varchar(255) CHARACTER SET utf8 NOT NULL,
		  PRIMARY KEY (`id`) USING BTREE,
		  KEY `userid2` (`UserID`) USING BTREE,
		  KEY `depid2` (`DeptID`) USING BTREE
		) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT";
	startvote($query_rsVoteRecord,$database_connjxkh,$connjxkh);
}	
	
echo $query_rsVoteRecord;
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
