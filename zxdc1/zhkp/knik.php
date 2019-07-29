<?php 
	mysql_select_db($database_connjxkh, $connjxkh);
	if (!isset($_SESSION)) {
	session_start();
	}
	$query_rsUser = "SELECT * FROM UserInfo WHERE account = ".$_SESSION['MM_Username'];
	$rsUser = mysql_query($query_rsUser, $connjxkh) or die(mysql_error());	
	$row_rsUser= mysql_fetch_assoc($rsUser);
	$count=mysql_num_rows($rsUser);
	$session_id = $row_rsUser['session_id'];
	/*$lasttime = $row_rsUser['time'];
	//date_default_timezone_set(PRC);
	$time = date("Y-m-d G:i:s");
	$minute=floor((strtotime($time)-strtotime($lasttime))%86400/60);
	$minute2=floor((strtotime($_SESSION['time'])-strtotime($lastime))%86400/60)-266;*/
	if($session_id != $_SESSION['session_id']){
		echo $_SESSION['session_id'];
		echo '<br>';
		echo $row_rsUser['session_id'];
		echo "<script language='JavaScript'>;alert('异地登录！请重新登录');
		top.location.href='../index.php';</script>;";
	}
	else{
		/*if($minute>15){
			echo $minute;
			echo '<script language="JavaScript">;alert("登录时间结束！请重新登录'.$minute.'");location.href="../index.php";</script>;';
		}
		else{
			if($minute2>15){
				echo '<script language="JavaScript">;alert("异地时间登录！请重新登录'.$minute2.'");location.href="index.php";</script>;';
			}
		}*/
	}
?>
