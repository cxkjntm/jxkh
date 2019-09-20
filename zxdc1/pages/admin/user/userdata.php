<?php require_once('../../../Connections/connjxkh.php'); ?>
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

$page=$_GET['page'];
$limit=$_GET['limit'];
//$sql="SELECT * from userinfo  ";
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsuser = "SELECT userinfo.Account, userinfo.UserID, userinfo.UserName, userinfo.Photo, deptinfo.DeptName, levelinfo.LevelName FROM deptinfo, levelinfo, userinfo WHERE userinfo.DeptID=deptinfo.DeptID AND levelinfo.LevelID=userinfo.LevelID  limit ".($page-1)*$limit.",".$limit;
//echo $query_rsuser;
$rsuser = mysql_query($query_rsuser, $connjxkh) or die(mysql_error());

$sql2="SELECT * from userinfo";
$q_sql2=mysql_query($sql2);
$count=mysql_num_rows($q_sql2);
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
