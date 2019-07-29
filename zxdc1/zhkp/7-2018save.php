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
 
 $DeptID=array();
 //获取备注内容
$text=$_POST["text"];
 $text = json_decode($text);
 $DeptID=$_POST['DeptID'];
 $DeptID = json_decode($DeptID);

 $Account=$_SESSION['MM_Username'];
 
//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);

//查询recordcode 查询本次系列问卷的后缀编号
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="zc_ldbzkhinfo_".$rs['RecordCode'];

//查询用户ID
$sql2 = "SELECT UserID FROM userinfo WHERE Account='".$Account."'";
$res = mysql_fetch_array(mysql_query($sql2,$connjxkh));
$result2=(mysql_query($sql2,$connjxkh));
while($row1 = mysql_fetch_array($result2)){$UserID=$row1['UserID'];}

//存入调查问卷
	for($x=0;$x<$length;$x++) {
		 $sql = "INSERT INTO ".$tableName." (UserID,DeptID,ZHKH,bz) values('".$UserID."','".$DeptID[$x]."',".$name[$x].",'".$text[$x]."');";
 $result= mysql_query($sql);
	}
	 if(!$result) {
		 $json_obj= json_encode(array('code'=>400));	
 	 }
	 else{
		 $json_obj= json_encode(array('code'=>200));
		 }	
	echo $json_obj;
	mysql_close($connjxkh);	
		
?>