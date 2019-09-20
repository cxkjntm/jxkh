<?php require_once('../../../Connections/connjxkh.php'); ?>
<?PHP require '../../../lib/phpass/PasswordHash.php';?>
<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	if(isset($_POST['account'])){
		$account=$_POST['account'];
		echo $account;
	}
	if(isset($_POST['username'])){
		$username=$_POST['username'];
		echo $username;
	}
	if(isset($_POST['dept']))    
		$deptid=$_POST['dept'];
	if(isset($_POST['level']))  	
		$level=$_POST['level']; 
		
	$pwd='123456';
	$t_hasher = new PasswordHash(8, FALSE);
	$password= $t_hasher->HashPassword($pwd);
	$photo='images/head-student.png';  
   	$ispj=false;
	$isevaluted=false;
	$isbanned=false;
    
	

	mysql_select_db($database_connjxkh, $connjxkh);
	$sql="INSERT INTO userinfo (Account, UserName, Passwd, Photo, DeptID, LevelID )
	VALUES ('$account','$username','$password','$photo','$deptid','$level')";

	echo $sql;
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
<?php  header("location:user.html") ?>

