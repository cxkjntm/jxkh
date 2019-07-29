<?php require_once('../../../Connections/connjxkh.php'); ?>

<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
    $deptname = $_POST['deptname'];    
    $deptmemo = $_POST['deptmemo'];
    //$json_arr = array("supername"=>$supername,"password"=>$password,"memo"=>$memo);	
    //$json_obj = json_encode($json_arr);
	
    
	

	mysql_select_db($database_connjxkh, $connjxkh);
	$sql="INSERT INTO DeptInfo (DeptName, DeptMemo,IsBanned)
	VALUES ('$deptname','$deptmemo',0)";

	//echo $sql;
	//mysql_query($sql,$connjxkh);
	//$json_obj= json_encode(array('code'=>200));	
	if (!mysql_query($sql,$connjxkh))
 		 {
		 $json_obj= json_encode(array('code'=>400));			
  
 	 }
	 else{
		 $json_obj= json_encode(array('code'=>200));	
		 }			
	echo $json_obj;
	mysql_close($connjxkh);
?>


