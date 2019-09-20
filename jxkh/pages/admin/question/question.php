<?php  require_once('../../../Connections/connjxkh.php'); ?>
<?php
header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	
if (!isset($_SESSION)) {
    session_start();
}

//获取title和question
$name=$_POST["name"];
 $data = json_decode($name);
 $length=count($data);

//获取答案类型
$type=$_POST['type'];
if($type=="S") $type=1;
if($type=="D") $type=0;
//echo $type;
//获取RecordID
$RecordID=$_SESSION['RecordID'];

mysql_query('SET NAMES UTF8');

mysql_select_db($database_connjxkh, $connjxkh);
/**获取Parent_qid*/
	$sql = "SELECT MAX(questionID) FROM question";
	$res = mysql_fetch_array(mysql_query($sql,$connjxkh));
	$parent_qid = $res["MAX(questionID)"];
//写入答案
	for($x=0;$x<$length;$x=$x+2) {
  mysql_query("INSERT INTO question(parent_qid,RecordID,type,title,question) 
  values('".$parent_qid."','".$RecordID."','".$type."','".$data[$x]."','".$data[$x+1]."');");
	}
 if (!mysql_query($sql,$connjxkh)) {
		 $json_obj= json_encode(array('code'=>400));	
 	 }
	 else{
		 $json_obj= json_encode(array('code'=>200));
		 }	
	echo $json_obj;
	mysql_close($connjxkh);	
		
?>
<?php unset($_SESSION['RecordID']);?>