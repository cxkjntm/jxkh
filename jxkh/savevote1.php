<?php require_once('Connections/connjxkh.php'); ?>
<link rel="stylesheet" type="text/css" href="lib/layer/theme/default/layer.css"/>
<script type="text/javascript" src="lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="lib/layer/layer.js"></script>
<?php

if (!isset($_SESSION)) {
  session_start();
}

	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');	
	if(isset($_POST['zcgbztpj1'])){
		 $zcgbztpj1 = $_POST['zcgbztpj1'];
		}	 
		  
	if(isset($_POST['jcgbztpj2']))	
	    $jcgbztpj2 = $_POST['jcgbztpj2'];
		
	if(isset($_POST['zggbztpj3']))	
	    $zggbztpj3 = $_POST['zggbztpj3'];
		
	if(isset($_POST['zcbzjgpj4']))	
	    $zcbzjgpj4 = $_POST['zcbzjgpj4'];
		
	if(isset($_POST['zcgbzfpj5'])){
		 $zcgbzfpj5 = $_POST['zcgbzfpj5'];
		}	   
		
	if(isset($_POST['zcbzzxpj6']))	
	    $zcbzzxpj6 = $_POST['zcbzzxpj6'];
		
	if(isset($_POST['zcbzjcpj7']))	
	    $zcbzjcpj7 = $_POST['zcbzjcpj7'];
		
	if(isset($_POST['zcbzyx8']))	
	    $zcbzyx8 = $_POST['zcbzyx8'];	
		
	if(isset($_POST['zcgbyspj9'])){
		 $zcgbyspj9 = $_POST['zcgbyspj9'];
		}	 
		  
	if(isset($_POST['zcgbmzys10']))	
	    $zcgbmzys10 = $_POST['zcgbmzys10'];
		
	if(isset($_POST['zcgbddgc11']))	
	    $zcgbddgc11 = $_POST['zcgbddgc11'];
		
	if(isset($_POST['zcgbqzlz12']))	
	    $zcgbqzlz12 = $_POST['zcgbqzlz12'];
		
	if(isset($_POST['zcgbxnlj13'])){
		 $zcgbxnlj13 = $_POST['zcgbxnlj13'];
		}	  
		 
	if(isset($_POST['zcgbllxx14']))	
	    $zcgbllxx14 = $_POST['zcgbllxx14'];
		
	if(isset($_POST['zcgbdjfz15']))	
	    $zcgbdjfz15 = $_POST['zcgbdjfz15'];
		
	if(isset($_POST['zcgbzdj16']))	
	    $zcgbzdj16 = $_POST['zcgbzdj16'];	
		
	if(isset($_POST['zcgbgzzt17'])){
		 $zcgbgzzt17 = $_POST['zcgbgzzt17'];
		}	   
		
	if(isset($_POST['szydyxqk18']))	
	    $szydyxqk18 = $_POST['szydyxqk18'];
		
	if(isset($_POST['zcgbzfjs19']))	
	    $zcgbzfjs19 = $_POST['zcgbzfjs19'];
		
	if(isset($_POST['value20']))	
	    $zcgbsztg20 = $_POST['value20'];
		
	if(isset($_POST['value21'])){
		 $zcgbblzf21 = $_POST['value21'];
		}	 
		  
	if(isset($_POST['zcgbcyzd22']))	
	    $zcgbcyzd22 = $_POST['zcgbcyzd22'];
		
	if(isset($_POST['value23']))	
	    $zcgbzfjq23 = $_POST['value23'];
		
	if(isset($_POST['zcgbzfjy24']))	
	    $zcgbzfjy24 = $_POST['zcgbzfjy24'];	
		
     date_default_timezone_set('PRC'); 
	 $submittime=date("Y-m-d H:i", time());			
	 $userid=$_SESSION['MM_UserID'];
	 $deptid=$_SESSION['MM_DeptID'];
	 $voteissue=$_SESSION['MM_VoteIssue'];
    
	
    
	

	mysql_select_db($database_connjxkh, $connjxkh);
	$sql="INSERT INTO VoteInfo (UserID, DeptID, voteTime, voteIssue, ";
	$sql=$sql."zcgbztpj1, jcgbztpj2, zggbztpj3, zcbzjgpj4, zcgbzfpj5, ";
	$sql=$sql."zcbzzxpj6, zcbzjcpj7, zcbzyx8, zcgbyspj9, zcgbmzys10, ";
	$sql=$sql."zcgbddgc11, zcgbqzlz12, zcgbxnlj13, zcgbllxx14, zcgbdjfz15, ";
	$sql=$sql."zcgbzdj16, zcgbgzzt17, szydyxqk18, zcgbzfjs19, zcgbsztg20, ";
	$sql=$sql."zcgbblzf21, zcgbcyzd22, zcgbzfjq23, zcgbzfjy24 )";
	$sql=$sql." VALUES ( ".$userid." ,".$deptid." ,'".$submittime."', '".$voteissue."',";
	$sql=$sql.$zcgbztpj1.", ".$jcgbztpj2.", ".$zggbztpj3.", ".$zcbzjgpj4.",".$zcgbzfpj5.", ";
	$sql=$sql.$zcbzzxpj6.", ".$zcbzjcpj7.", '".$zcbzyx8."', ".$zcgbyspj9.", ".$zcgbmzys10.", ";
	$sql=$sql.$zcgbddgc11.", ".$zcgbqzlz12.", ".$zcgbxnlj13.", ".$zcgbllxx14.",".$zcgbdjfz15.", ";
	$sql=$sql.$zcgbzdj16.", '".$zcgbgzzt17."',".$szydyxqk18.", '".$zcgbzfjs19."', '".$zcgbsztg20."', '";
	$sql=$sql.$zcgbblzf21."', ".$zcgbcyzd22.", '".$zcgbzfjq23."', '".$zcgbzfjy24."' )";
	
	//echo $sql;
	//mysql_query($sql,$connjxkh);
	//$json_obj= json_encode(array('code'=>200));	
	if (!mysql_query($sql,$connjxkh))
 		 {
		 $json_obj= json_encode(array('code'=>400));			
  
 	 }
	 else{
		 $json_obj= json_encode(array('code'=>200));	
		 echo "<script type='text/javascript'>layer.alert('Data Saved Success ', {icon: 6});</script>";
		 }			
	//echo $json_obj;
	mysql_close($connjxkh);
?>

