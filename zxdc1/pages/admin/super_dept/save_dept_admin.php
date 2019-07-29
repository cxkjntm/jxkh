<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	//获取部门管理员账号
	if(isset($_POST['account'])){
		$account=$_POST['account'];
		//echo $account;
	}
	//获取部门管理员所属部门ID
	if(isset($_POST['DeptID']))    
		$deptid=$_POST['DeptID'];
	
	mysql_select_db($database_connjxkh, $connjxkh);
	
	//查询该账号是否在这个部门中
	$sql02="SELECT COUNT(UserID) as num FROM userinfo WHERE Account=$account AND DeptID=$deptid;";
	$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));
	if($result02['num']>=1){
		
		//查询该账号的密码
		$sql03="select Passwd from userinfo where Account=$account";
		$result03 = mysql_fetch_assoc(mysql_query($sql03, $connjxkh));
		
		//插入部门管理员信息
		$sql="INSERT INTO deptadmin (Account,Passwd,DeptID)
		VALUES ('$account','".$result03['Passwd']."','$deptid')";
		$result=mysql_query($sql,$connjxkh);
		//echo $sql;
		 $json_obj= json_encode(array('code'=>200));
	}else{
		$json_obj= json_encode(array('code'=>400));
	}
	echo $json_obj;
	mysql_close($connjxkh);
	
?>

