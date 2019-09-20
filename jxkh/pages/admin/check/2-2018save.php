<?php  require_once('../../../Connections/connjxkh.php'); ?>
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
 
//获取被评部门id
 $DeptID=array();
 
 for($i=1;$i<=46;$i++){
	 $DeptID[$i]=$i;
 }
 $DeptID=$_POST["DeptID"];
 $DeptID = json_decode( $DeptID);
 
 
//获取评价人员ID
//$UserID=$_SESSION['UserID'];
$UserID=315;

//连接数据库
mysql_select_db($database_connjxkh, $connjxkh);
//存入调查问卷
	for($x=0;$x<$length;$x++) {
 $result= mysql_query("INSERT INTO zc_ldbzkhinfo (UserID,DeptID,ZHKH) values('".$UserID."','".$DeptID[$x]."','".$name[$x]."');");
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