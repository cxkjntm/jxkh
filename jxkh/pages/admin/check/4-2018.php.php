<?php  require_once('../../../Connections/connjxkh.php'); ?>
<?php
header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	
if (!isset($_SESSION)) {
    session_start();
}
//获取选项
$name=$_POST['name'];
 $name = json_decode($name);
 $length=count($name);
 //获取userID
 $BPUserID=$_POST['UserID'];
 $BPUserID = json_decode($BPUserID);
 
 $DeptID=$_POST['DeptID'];
 $DeptID = json_decode($DeptID);

$UserID=1;
//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);
//存入调查问卷
	for($x=0;$x<$length;$x=$X+7) {
	  mysql_query("INSERT INTO qz_ldcykhinfo (UserID,BPUserID,DeptID,ZTPJ,ZZSX,GZNL,GZZF,YFBS,LXYZ,LJZV) 
	  values('".$UserID."','".$BPUserID."','".$DeptID[$x]."','".$name[$x]."','".$name[$x+1]."','".$name[$x+2]."','".$name[$x+3]."','".$name[$x+4]."','".$name[$x+5]."','".$name[$x+6]."');");
	}
	$json_obj=200;
	echo $json_obj;
	mysql_close($connjxkh);	
		
?>