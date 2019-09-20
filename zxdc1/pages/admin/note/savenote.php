<?php require_once('../../../Connections/connjxkh.php'); ?>
<link rel="stylesheet" type="text/css" href="../../../lib/layer/theme/default/layer.css"/>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../../lib/layer/layer.js"></script>
<?php
	header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	if(isset($_POST['title'])){
		 $title = $_POST['title'];
		}	   
	if(isset($_POST['username']))	
	    $username = $_POST['username'];
	if(isset($_POST['contentvalue']))	
	    $content= $_POST['contentvalue'];
	$releasedtime=date("Y-m-d");
    //$json_arr = array("supername"=>$supername,"password"=>$password,"memo"=>$memo);	
    //$json_obj = json_encode($json_arr);
	
    
	
	$flag=0;
	mysql_select_db($database_connjxkh, $connjxkh);
	$sql="INSERT INTO noteinfo (NoteTitle, NoteContent, NotePublisher, ReleasedTime)
	VALUES ('$title','$content','$username','$releasedtime')";

	//echo $sql;
	//mysql_query($sql,$connjxkh);
	//$json_obj= json_encode(array('code'=>200));	
	if (!mysql_query($sql,$connjxkh))
 		 {
		 $flag=400;		
  
 	 }
	 else{
		 $flag=200;
		 }
	if($flag==200)	 			
		echo "<script type='text/javascript'>layer.msg('ok');</script>";
	mysql_close($connjxkh);
?>
<html>
<body>
<script type='text/javascript'>layer.msg('ok');</script>
</body>
</html>


