<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
//echo $_POST['id'];
if(isset($_POST['superid']))
	$SuperID=$_POST['superid'];
//echo $SuperID;
$query_rsSuper=" Delete From SuperInfo  where SuperID=".$SuperID;
//echo $query_rsSuper;
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$result = mysql_query($query_rsSuper, $connjxkh) or die(mysql_error());
if($result)
	echo json_encode(array('code'=>200));
else
	echo json_encode(array('code'=>400));
mysql_close($connjxkh);
?>