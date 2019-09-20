<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
	mysql_query("set names 'utf8'"); //Êý¾Ý¿âÊä³ö±àÂë
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsUser = "SELECT COUNT(UserInfo.deptid) as usernum, DeptInfo.`DeptName` as deptname FROM UserInfo,DeptInfo WHERE UserInfo.`DeptID`=DeptInfo.`DeptID` GROUP BY UserInfo.deptid";
$rsUser = mysql_query($query_rsUser, $connjxkh) or die(mysql_error());
//$row_rsUser = mysql_fetch_assoc($rsUser);
//$result = mysql_query("select * from study");
//$totalRows_rsUser = mysql_num_rows($rsUser);
?>
<?php
	$data="";
	$array= array();
	class User{
    	public $usernum;
	    public $deptname;
	  }
	  
	while($row = mysql_fetch_array($rsUser,MYSQL_ASSOC)){
	    $user=new User();
	    $user->usernum= $row['usernum'];
    	$user->deptname= substr($row['deptname'],0,6);
	    $array[]=$user;
  }
  $data=json_encode($array);
  // echo "{".'"user"'.":".$data."}";
  echo $data;  
?>

<?php
mysql_free_result($rsUser);
?>
