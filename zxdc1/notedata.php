<?php require_once('Connections/connjxkh.php'); ?>
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

$page=1;//$_GET['page'];
$limit=20;//$_GET['limit'];
//$sql="SELECT * from UserInfo  ";
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsnote = "SELECT * from noteinfo  order by NoteID Desc limit ".($page-1)*$limit.",".$limit;
//echo $query_rsnote;
$rsnote = mysql_query($query_rsnote, $connjxkh) or die(mysql_error());

$sql2="SELECT * from noteinfo";
$q_sql2=mysql_query($sql2);
$count=mysql_num_rows($q_sql2);
$arr=array();
while($res=mysql_fetch_assoc($rsnote)){
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
mysql_free_result($rsnote);
?>
