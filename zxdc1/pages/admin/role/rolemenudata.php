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
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsrm = "SELECT menuinfo.MenuName, menuinfo.Menu_URL, menuinfo.Pare_Menu_ID, 
				menuinfo.MenuMid, levelinfo.LevelName, role_menu.id, role_menu.status 
				FROM role_menu, menuinfo, levelinfo 
				WHERE role_menu.status = 0 AND levelinfo.LevelID=role_menu.role_id 
				AND menuinfo.MenuID=role_menu.menu_id";
$query_limit_rsrm = $query_rsrm." order by levelinfo.LevelID, menuinfo.MenuMid limit ".($page-1)*$limit.",".$limit;
$rsrm = mysql_query($query_limit_rsrm, $connjxkh) or die(mysql_error());


$sql2="SELECT menuinfo.MenuName, menuinfo.Menu_URL, menuinfo.Pare_Menu_ID, menuinfo.MenuMid,
		 levelinfo.LevelName, role_menu.id, role_menu.status 
		 FROM role_menu, menuinfo, levelinfo 
		 WHERE role_menu.status = 0 AND levelinfo.LevelID=role_menu.role_id
		 AND menuinfo.MenuID=role_menu.menu_id";
$q_sql2=mysql_query($sql2);
$count=mysql_num_rows($q_sql2);
$arr=array();

while($res=mysql_fetch_assoc($rsrm)){
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
mysql_free_result($rsrm);
?>
