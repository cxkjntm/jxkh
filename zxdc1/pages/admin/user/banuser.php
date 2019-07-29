<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
//echo $_POST['id'];
if(isset($_POST['id']))
	$UserID=$_POST['id'];
//echo $UserID;
$query_rsUser=" update UserInfo set IsBanned=false  where UserID=".$UserID;
//echo $query_rsUser;
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$result = mysql_query($query_rsUser, $connjxkh) or die(mysql_error());
if($result)
	echo json_encode(array('code'=>200));
else
	echo json_encode(array('code'=>400));
mysql_close($connjxkh);
?>