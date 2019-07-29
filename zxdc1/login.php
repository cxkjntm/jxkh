<?php require_once('Connections/connjxkh.php'); ?>
<?php
require 'lib/phpass/PasswordHash.php';

if (!isset($_SESSION)) {
  session_start();
}
//获取当前session_id
$_SESSION['session_id'] = session_id();
//date_default_timezone_set(PRC);
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$loginUsername="-1";
if (isset($_POST['username'])) {
  $colname_rsUser1 = $_POST['username'];  
  $loginUsername=$colname_rsUser1;
    
}
//echo $colname_rsUser1;


if (isset($_POST['password'])) {
  $colname_rsUser2 = $_POST['password'];
}
//echo $colname_rsUser2;
if (isset($_POST['checkcode'])) {
  $checkcode = $_POST['checkcode'];    
}
//echo $checkcode ;

if (isset($_POST['srand'])) {
  $srand = $_POST['srand'];    
}
//echo $srand ;
$role = $_POST['usertype'];
if($srand==$checkcode){
	mysql_select_db($database_connjxkh, $connjxkh);
	//职工登录
	if($role == 2){
		$query_rsUser = sprintf("SELECT * FROM UserInfo WHERE Account = %s ", GetSQLValueString($colname_rsUser1, "text"));

	}
	//部门管理员登录
	if($role == 1){
		$query_rsUser = sprintf("SELECT * FROM deptadmin WHERE Account = %s ", GetSQLValueString($colname_rsUser1, "text"));
	}

	$rsUser = mysql_query($query_rsUser, $connjxkh) or die(mysql_error());	
	$row_rsUser= mysql_fetch_assoc($rsUser);
	$count=mysql_num_rows($rsUser);


	//如果能够查到一个账号，执行登录判断
	if($count>0){	

		$dbpassword=$row_rsUser["Passwd"];
		$t_hasher = new PasswordHash(8, FALSE);
		$hash = $t_hasher->HashPassword($colname_rsUser2);
		//echo $hash;
		$check = $t_hasher->CheckPassword($colname_rsUser2, $dbpassword);
		//echo $check;
		if ($check){
			 $loginStrGroup = "";
			 if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
		    //declare two session variables and assign them

			 if($role == 2){
			    $_SESSION['MM_Username'] = $loginUsername;
				$_SESSION['MM_UserID'] = $row_rsUser["UserID"];
				$_SESSION['MM_RoleID'] = $row_rsUser["LevelID"];
				$_SESSION['MM_DeptID'] = $row_rsUser["DeptID"];
				$times = $row_rsUser["logtimes"]+1;
				if($_SESSION['session_id'] != $row_rsUser['session_id'] || $row_rsUser['session_id']==null){
					$sid = "update userinfo set session_id = '".$_SESSION['session_id']."',logtimes ="
					.$times." where account ='".$_SESSION['MM_Username']."'";
					if(mysql_query($sid,$connjxkh)){
						//print_r($sid);
						
					}
					else{
						print_r($sid);
					}
				}
			}
			 if ($role == 1){
			 	$_SESSION['Admin_Account'] = $loginUsername;
			 	$_SESSION['Admin_DeptID'] = $row_rsUser["DeptID"];
			 }
				
	 		$json_obj= json_encode(array('role'=>$role,'result'=>'success'));  
			echo $json_obj;   
			mysql_free_result($rsUser);
			mysql_close($connjxkh);
		}
		
		else{
			$json_obj= json_encode(array('result'=>'pwderror'));	
			echo $json_obj;   
			mysql_free_result($rsUser);	
		mysql_close($connjxkh);			
			}
   		
		}
	else{
		echo  $json_obj= json_encode(array('result'=>'nologincode'));
		exit();
		
		}	
	}
else{
	echo  $json_obj= json_encode(array('result'=>'failed'));
	exit();
	
	
	}	
?>
