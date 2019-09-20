<?php require_once('../../../Connections/connjxkh.php'); ?>

<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	if(isset($_POST['supername'])){
		 $supername = $_POST['supername'];
		}	   
	if(isset($_POST['password']))	
	    $password = $_POST['password'];
	if(isset($_POST['memo']))	
	    $memo = $_POST['memo'];
    //$json_arr = array("supername"=>$supername,"password"=>$password,"memo"=>$memo);	
    //$json_obj = json_encode($json_arr);
	
    
	

	mysql_select_db($database_connjxkh, $connjxkh);
	$sql="INSERT INTO SuperInfo (SuperName, SuperPwd, SuperMemo)
	VALUES ('$supername','$password','$memo')";

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


