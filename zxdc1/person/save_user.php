<?php require_once('../Connections/connjxkh.php'); ?>
<?PHP require '../lib/phpass/PasswordHash.php';?>
<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	if(isset($_POST['account'])){
		$account=$_POST['account'];
		//echo $account;
	}
	if(isset($_POST['username'])){
		$username=$_POST['username'];
		//echo $username;
	}
	if(isset($_POST['dept']))    
		$deptid=$_POST['dept'];
	if(isset($_POST['level']))  	
		$level=$_POST['level']; 
		
	$pwd='12345678';
	$t_hasher = new PasswordHash(8, FALSE);
	$password= $t_hasher->HashPassword($pwd);
	$photo='images/head-student.png';  
   	$ispj=false;
	$isevaluted=false;
	$isbanned=false;
    mysql_select_db($database_connjxkh, $connjxkh);
	//查询是否账号已经存在
	$sql02="SELECT COUNT(Account) AS num FROM userinfo WHERE Account=".$account;
	$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));
	if($result02['num']>=1){
		 $json_obj= json_encode(array('code'=>400));
	}else{
		
		//插入数据
		$sql="INSERT INTO UserInfo (Account, UserName, Passwd, Photo, DeptID, LevelID)
		VALUES ('$account','$username','$password','$photo','$deptid','$level')";
		//echo $sql; 
		mysql_query($sql,$connjxkh);
		$json_obj= json_encode(array('code'=>200));
	}
	echo $json_obj;
	mysql_close($connjxkh);
	
?>

