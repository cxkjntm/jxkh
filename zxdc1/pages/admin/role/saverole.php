<?php require_once('../../../Connections/connjxkh.php'); ?>

<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	if(isset($_POST['rolename'])){
		 $rolename = $_POST['rolename'];
		}	   
	
	if(isset($_POST['memo']))	
	    $memo = $_POST['memo'];
    //$json_arr = array("rolename"=>$rolename,"password"=>$password,"memo"=>$memo);	
    //$json_obj = json_encode($json_arr);
	$isbanned=false;
	
    
	

	mysql_select_db($database_connjxkh, $connjxkh);
	$sql="INSERT INTO LevelInfo (LevelName, Memo, IsBanned)
	VALUES ('$rolename','$memo','$isbanned')";

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


