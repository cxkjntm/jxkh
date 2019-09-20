<?php require_once('../Connections/connjxkh.php'); ?>
<?php
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

//$page=1;//$_GET['page'];
//$limit=5;//$_GET['limit'];
if (!isset($_SESSION)) {
    session_start();
}
//获取部门管理员ID
$Account = $_SESSION["Admin_Account"];

//获取输入内容
if(isset($_GET['xctj']))
	$xctj=$_GET['xctj'];
//获取选择内容
if(isset($_GET['xctype']))
	$xctype=$_GET['xctype'];	
	
$page=$_GET['page'];
$limit=$_GET['limit'];		

//
mysql_query('SET NAMES UTF8');

//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);

$sql01="select DeptID from userinfo where Account = $Account";
$result01 = mysql_fetch_assoc(mysql_query($sql01, $connjxkh));

//echo $result01['DeptID'];

$sql="SELECT u.Account,u.UserID, u.UserName, u.Photo, 
		 d.DeptName,l.LevelName
		 FROM deptinfo d, levelinfo l, userinfo u
		 WHERE u.DeptID=d.DeptID 
		 AND l.LevelID=u.LevelID
		 AND u.DeptID = ".$result01['DeptID']."";
$sql1=$sql;
switch ($xctype){
	case 1:{
		$sql=$sql." and u.Account=".$xctj." limit ".($page-1)*$limit.",".$limit;
		$sql1=$sql1." and u.Account=".$xctj;
		break;
		}
	case 2:{
		$sql=$sql." and  u.UserName like '%".$xctj."%' limit ".($page-1)*$limit.",".$limit;
		$sql1=$sql1." and  u.UserName like '%".$xctj."%'";
		break;
		}
	case 3:{
		$sql=$sql." and  l.LevelName like '%".$xctj."%' limit ".($page-1)*$limit.",".$limit;
		$sql1=$sql1." and  l.LevelName like '%".$xctj."%'";
		break;
		}
	}

//echo $sql1;

$query_rsuser =$sql;
$query_rsuser1 =$sql1;
$rsuser = mysql_query($query_rsuser, $connjxkh) or die(mysql_error());
$rsuser1 = mysql_query($query_rsuser1, $connjxkh) or die(mysql_error());
// "SELECT * FROM UserInfo";
//$q_sql=mysql_query($sql);
//while($res=mysql_fetch_assoc($q_sql)){
//$sql2="SELECT * from UserInfo  where UserID=".$userid;
//$q_sql2=mysql_query($sql2);
$count=mysql_num_rows($rsuser1);
//echo $count;
$arr=array();
while($res=mysql_fetch_assoc($rsuser)){	
	$arr[]=$res;
}
$data=array(
		'code'=>0,
		'msg'=>'',
		'count'=>$count,
		'data'=>$arr
	);
echo json_encode($data);
?>

<?php
mysql_free_result($rsuser);
?>
