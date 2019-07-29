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

//$page=1;//$_GET['page'];
//$limit=5;//$_GET['limit'];
if(isset($_GET['xctj']))
	$xctj=$_GET['xctj'];

$page=$_GET['page'];
$limit=$_GET['limit'];		
//echo $xctj;
//echo "<br>";
//echo $xctype;
$sql="SELECT * from voteRecord Where RecordName like '%".$xctj."%' limit ".($page-1)*$limit.",".$limit;

//echo $sql;
mysql_query('SET NAMES UTF8');

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsrecord =$sql;
$rsrecord = mysql_query($query_rsrecord, $connjxkh) or die(mysql_error());

$count=mysql_num_rows($rsrecord);
//echo $count;
$arr=array();
while($res=mysql_fetch_assoc($rsrecord)){	
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
mysql_free_result($rsrecord);
?>
