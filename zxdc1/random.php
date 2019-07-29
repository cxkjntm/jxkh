<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php

 echo(rand(10,100));
 echo "<br>";
 echo(rand(100000,1000000));
 
$age=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
echo "Bill is " . $age['Bill'] . " years old.";
$sql=array(
            'id' =>  "pk",
            'entity' =>  "string(15) NOT NULL ",
            'entity_id' =>  "integer NOT NULL",
            'title' =>  "string(255) NOT NULL",
            'message' =>  "TEXT NOT NULL",
            'status' =>  "string(15) NOT NULL DEFAULT 'new' ",
            'importance' =>  "integer NOT NULL DEFAULT 1",
            'display_class' =>  "string(31) DEFAULT 'default' ",
            'hash' =>  "string(64)",
            'created' =>  "datetime",
            'first_read' =>  "datetime",
        );
echo $sql['id'];	
$sql=" CREATE TABLE `VoteInfo111` (
  `voteId` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `voteTime` varchar(100) NOT NULL,
  `voteIssue` varchar(40) NOT NULL,
  `zcgbztpj1` int(11) NOT NULL,
  `jcgbztpj2` int(11) NOT NULL,
  `zggbztpj3` int(11) NOT NULL,
  `zcbzjgpj4` int(11) NOT NULL,
  `zcgbzfpj5` int(11) NOT NULL,
  `zcbzzxpj6` int(11) NOT NULL,
  `zcbzjcpj7` int(11) NOT NULL,
  `zcbzyx8` varchar(40) NOT NULL,
  `zcgbyspj9` int(11) NOT NULL,
  `zcgbmzys10` int(11) NOT NULL,
  `zcgbddgc11` int(11) NOT NULL,
  `zcgbqzlz12` int(11) NOT NULL,
  `zcgbxnlj13` int(11) NOT NULL,
  `zcgbllxx14` int(11) NOT NULL,
  `zcgbdjfz15` int(11) NOT NULL,
  `zcgbzdj16` int(11) NOT NULL,
  `zcgbgzzt17` varchar(40) NOT NULL,
  `szydyxqk18` int(11) NOT NULL,
  `zcgbzfjs19` varchar(80) NOT NULL,
  `zcgbsztg20` varchar(20) NOT NULL,
  `zcgbblzf21` varchar(200) NOT NULL,
  `zcgbcyzd22` int(11) NOT NULL,
  `zcgbzfjq23` varchar(200) NOT NULL,
  `zcgbzfjy24` varchar(200) NOT NULL,
  PRIMARY KEY (`voteId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;	";

echo $sql;
?>
</body>
</html>
