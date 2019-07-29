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
 //获取用户账号
 $Account=$_SESSION['MM_Username'];

//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);

//查询recordcode 查询本次系列问卷的后缀编号
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName1="qz_ldbzkhinfo_".$rs['RecordCode'];
$tableName2="qz_ldcykhinfo_".$rs['RecordCode'];

//查询用户ID 部门ID
$sql2 = "SELECT UserID,DeptID FROM userinfo WHERE Account='".$Account."'";
$res = mysql_fetch_array(mysql_query($sql2,$connjxkh));
$result2=(mysql_query($sql2,$connjxkh));
while($row1 = mysql_fetch_array($result2)){$UserID=$row1['UserID'];$DeptID=$row1['DeptID'];}

$result=0;
//存入调查问卷
	$y=0;//用户被评人数据的循环
	$x=0;//获取选项数据数组的下标
		$result= mysql_query("INSERT INTO ".$tableName1." (UserID,DeptID,DDJS,LDNL,GZSJ,LZJS,XXJY,ZTPJ) 
	  values('".$UserID."','".$DeptID."','".$name[$x]."','".$name[$x+1]."','".$name[$x+2]."','".$name[$x+3]."','".$name[$x+4]."','".$name[$x+5]."');");
	for(;$x<$length-6;$x=$x+7) {
	 $result= mysql_query("INSERT INTO ".$tableName2." (UserID,BPUserID,ZZSX,GZNL,GZZF,YFBS,LXYZ,LJZV,ZTPJ) 
	  values('".$UserID."','".$BPUserID[$y++]."','".$name[$x]."','".$name[$x+1]."','".$name[$x+2]."','".$name[$x+3]."','".$name[$x+4]."','".$name[$x+5]."','".$name[$x+6]."');");
	}
	if ($result2) {
		$json_obj= json_encode(array('code'=>200));
 	 }
	else{
		$json_obj= json_encode(array('code'=>400));
		}	
	echo $json_obj;
	mysql_close($connjxkh);	
		
?>