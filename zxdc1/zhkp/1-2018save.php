<?php  require_once('../Connections/connjxkh.php'); ?>
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
 //获取部门id
 $DeptID=$_POST['DeptID'];
 $DeptID = json_decode($DeptID);

//获取用户账号
 $Account=$_SESSION['MM_Username'];

//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);

//查询参加本次调查问卷的用户ID
$sql2 = "SELECT UserID FROM userinfo WHERE Account='".$Account."'";
$res = mysql_fetch_array(mysql_query($sql2,$connjxkh));
$result2=(mysql_query($sql2,$connjxkh));
while($row1 = mysql_fetch_array($result2)){$UserID=$row1['UserID'];}

//存入调查问卷
	$y=0;$m=0;
	for($x=0;$x<$length;$x=$x+7) {
	 $result= mysql_query("INSERT INTO qz_ldcykhinfo (UserID,BPUserID,DeptID,ZTPJ,ZZSX,GZNL,GZZF,YFBS,LXYZ,LJZV) 
	  values('".$UserID."','".$BPUserID[$m++]."','".$DeptID[$y++]."','".$name[$x]."','".$name[$x+1]."','".$name[$x+2]."','".$name[$x+3]."','".$name[$x+4]."','".$name[$x+5]."','".$name[$x+6]."');");
	}
	if (!$result) {
		 $json_obj= json_encode(array('code'=>400));	
 	 }
	 else{
		 $json_obj= json_encode(array('code'=>200));
		 }	
	echo $json_obj;
	mysql_close($connjxkh);	
		
?>