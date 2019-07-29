<?php require_once('../../../Connections/connjxkh.php'); ?>

<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	
	//接收数据
	if(isset($_POST['recordname']))
		$recordname = $_POST['recordname'];
	if(isset($_POST['description']))	
	    $description = $_POST['description'];
	if(isset($_POST['welcome']))	
	    $welcome = $_POST['welcome'];
	if(isset($_POST['end']))	
	    $end = $_POST['end'];
	if(isset($_POST['starttime']))	
	    $starttime = $_POST['starttime'];
	if(isset($_POST['endtime']))	
	    $endtime = $_POST['endtime'];
	$status="未发布";
	mysql_select_db($database_connjxkh, $connjxkh);
	$recordcode=rand(100000,1000000);
	if(isset($_POST['khtype']))	
	    $khtype = $_POST['khtype'];
	
	//存入问卷
	$sql="INSERT INTO voterecord(RecordName,RecordCode,starttime,endtime,status,describtion,welcome,end,khtype) VALUES ('$recordname','$recordcode','$starttime','$endtime' ,'$status','$description','$welcome','$end',$khtype)";	
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