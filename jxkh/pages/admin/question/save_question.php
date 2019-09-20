<?php require_once('../../../Connections/connjxkh.php'); ?>

<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	
	//接收数据
	if(isset($_POST['type']))
		$type = $_POST['type'];
	if(isset($_POST['title']))	
	    $title = $_POST['title'];
	if(isset($_POST['question']))	
	    $question = $_POST['question'];
	mysql_select_db($database_connjxkh, $connjxkh);
	
	/**取RecordID*/
	$sql = "SELECT MAX(RecordID) FROM voterecord";
	$res = mysql_fetch_array(mysql_query($sql,$connjxkh));
	$RecordID = $res["MAX(RecordID)"];
	$parent_qid =0 ;
	//存入问题
	$sql="INSERT INTO question(parent_qid,RecordID,type,title,question) VALUES ($parent_qid,$RecordID,'$type','$title','$question')";	
	//echo $sql;
	if (!mysql_query($sql,$connjxkh)) {
		 $json_obj= json_encode(array('code'=>400));	
 	 }
	 else{
		 $json_obj= json_encode(array('code'=>200));
		 }			
	echo $json_obj;
	mysql_close($connjxkh);
?>
<?php 
	session_start();
	$_SESSION['RecordID']=$RecordID;
	$_SESSION['type']=$type;
?>