<?php require_once('../../../Connections/connjxkh.php'); ?>

<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	//echo $_POST['MenuName'];
	if(isset($_POST['MenuName'])){
		$menuname=$_POST['MenuName'];
		//echo $menuname;
	}
	if(isset($_POST['MenuMid']))    
		$menumid=$_POST['MenuMid'];
	if(isset($_POST['Menu_URL']))  	
		$menuurl=$_POST['Menu_URL']; 		
	if(isset($_POST['Pare_Menu_ID']))  	
		$paremenuid=$_POST['Pare_Menu_ID']; 	
	if(isset($_POST['Order']))  	
		$order=$_POST['Order']; 	
	if(isset($_POST['Status']))  	
		$status=$_POST['Status']; 
    
	

	mysql_select_db($database_connjxkh, $connjxkh);
	$sql="INSERT INTO MenuInfo (MenuName, MenuMid, Menu_URL, Pare_Menu_ID, paixu,stats )
	VALUES ('$menuname',$menumid,'$menuurl','$paremenuid',$order,'$status')";

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


