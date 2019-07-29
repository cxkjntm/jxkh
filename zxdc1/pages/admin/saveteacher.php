<?php require_once('../../Connections/connjxkh.php'); ?>

<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	if(isset($_POST['name'])){
		 $teachername = $_POST['name'];
		}	   
	if(isset($_POST['sex']))	
	    $teachersex = $_POST['sex'];
	if(isset($_POST['age']))	
	    $teacherage = $_POST['age'];
	if(isset($_POST['rank']))	
	    $teacherrank = $_POST['rank'];
    //$json_arr = array("supername"=>$supername,"password"=>$password,"memo"=>$memo);	
    //$json_obj = json_encode($json_arr);
	
    
	

	mysql_select_db($database_connjxkh, $connjxkh);
	$sql="INSERT INTO Teacher (TeacherName, TeacherSex, TeacherAge, TeacherRank)
	VALUES ('$teachername','$teachersex','$teacherage', '$teacherrank')";

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


