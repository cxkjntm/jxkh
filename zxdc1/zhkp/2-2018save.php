<?php  require_once('../Connections/connjxkh.php'); ?>
<?php
header("Content-type:text/html;charset=utf-8");
	mysql_query('SET NAMES UTF8');
	
if (!isset($_SESSION)) {
    session_start();
}
//获取选项
$name=$_POST["name"];
 $name = json_decode($name);
 $length=count($name);
 
//获取备注内容
$text=$_POST["text"];
 $text = json_decode($text);
 //print_r($text);
//获取被评部门id
 $DeptID=array();
 
 for($i=1;$i<=46;$i++){
	 $DeptID[$i]=$i;
 }
 $DeptID=$_POST["DeptID"];
 $DeptID = json_decode( $DeptID);
 
 
//获取评价人员ID
//$UserID=$_SESSION['UserID'];
$UserID=$_SESSION['MM_UserID'];

//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);

//查询recordcode 查询本次系列问卷的后缀编号
$sql1="select RecordCode from voterecord where khtype=1";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));
$tableName="zc_ldbzkhinfo_".$rs['RecordCode'];

//存入调查问卷
	for($x=0;$x<$length;$x++) {
		$sql = "INSERT INTO ".$tableName." (UserID,DeptID,ZHKH,bz) values('".$UserID."','".$DeptID[$x]."',".$name[$x].",'".$text[$x]."');";
		echo $sql;
 $result= mysql_query($sql);
	}
 if(!$result) {
		 $json_obj= json_encode(array('code'=>400));	
 	 }
	 else{
		 $json_obj= json_encode(array('code'=>200));
		 }	
	$sqlll= "insert into isvote_".$rs['RecordCode']."(UserID,Voted) values(".$_SESSION["MM_UserID"].",1)";
	$result = mysql_query($sqlll);	 
	echo $json_obj;
	mysql_close($connjxkh);	
		
?>