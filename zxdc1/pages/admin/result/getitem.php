<?php require_once('../../../Connections/connjxkh.php'); ?>

<?php

if (!isset($_SESSION)) {
  session_start();
}
$colname_rsRecord = "-1";
if (isset($_SESSION['MM_VoteIssue'])) {
  $colname_rsRecord = (get_magic_quotes_gpc()) ? $_SESSION['MM_VoteIssue'] : addslashes($_SESSION['MM_VoteIssue']);
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsRecord = sprintf("SELECT RecordCode FROM voterecord WHERE RecordID = %s", $colname_rsRecord);
$rsRecord = mysql_query($query_rsRecord, $connjxkh) or die(mysql_error());
$row_rsRecord = mysql_fetch_assoc($rsRecord);
$totalRows_rsRecord = mysql_num_rows($rsRecord);

$voteissue=$row_rsRecord["RecordCode"];
$votetablename="pswjdc_".$voteissue;   
//echo 	$votetablename;

$data="";
$array= array();

class Vote{

    public $number;
	public $voteitem;
 }
	  


if(isset($_POST['deptid'])){
		 $deptid = $_POST['deptid'];
		}	   
if(isset($_POST['voteitemid'])){
		 $voteitemid = $_POST['voteitemid'];
		}

mysql_query("set names 'utf8'"); //Êý¾Ý¿âÊä³ö±àÂë
mysql_select_db($database_connjxkh, $connjxkh);
$query="SELECT * FROM question WHERE parent_qid=0 and questionID=".$voteitemid;

//echo $query;

$rsquestion=mysql_query($query, $connjxkh) or die(mysql_error());
$result_question=mysql_fetch_assoc($rsquestion);
$title=$result_question["title"];
//echo $title;

$query_count="SELECT COUNT(*)  as count FROM question WHERE parent_qid=".$voteitemid;
$rs_itemcount=mysql_query($query_count, $connjxkh) or die(mysql_error());
$result_itemcount=mysql_fetch_assoc($rs_itemcount);
$count=$result_itemcount["count"];

$titles = array("A","B","C","D"); 
switch($count){

	case 4:
		$titles = array("A","B","C","D"); 
		break;
    case 5:
		$titles = array("A","B","C","D","E"); 
		break;	
	case 6:
		$titles = array("A","B","C","D","E","F"); 
		break;
	case 7:
		$titles = array("A","B","C","D","E","F","G"); 
		break;		
	case 8:
		$titles = array("A","B","C","D","E","F","G","H"); 
		break;	
	default:
		$titles = array("A","B","C","D"); 
		break;				

}

foreach ($titles as $value) {
   //echo "$value <br>";
   //$sql="SELECT COUNT(".$votetablename.".".$title.") as count  FROM " . $votetablename ." WHERE ".$votetablename.".".$title."='".$value."'";
   $sql="SELECT COUNT(".$votetablename.".".$title.") as count  FROM " . $votetablename ." WHERE  FIND_IN_SET('".$value."'  , ". $title." )";
   //echo $sql;
   $rs_count=mysql_query($sql, $connjxkh) or die(mysql_error());
   $result_count=mysql_fetch_assoc($rs_count);
   $itemcount=$result_count["count"];
   //echo $itemcount;
   $query_item="SELECT question  FROM question WHERE parent_qid=".$voteitemid."  and title ='".$value."'";
   //echo $query_item;
   $rs_item=mysql_query($query_item, $connjxkh) or die(mysql_error());
   $result_item=mysql_fetch_assoc($rs_item);
   $voteitem=$result_item["question"];
   //echo $voteitem;
   
   $vote=new Vote();
   $vote->value= $itemcount;
   $vote->name= $voteitem;
   $array[]=$vote;
		
   mysql_free_result($rs_count);
   mysql_free_result($rs_item);
   
   
}

$data=json_encode($array);
  // echo "{".'"user"'.":".$data."}";
echo $data;


?>
<?php
mysql_free_result($rsquestion);
mysql_free_result($rs_itemcount);

mysql_free_result($rsRecord);
?>