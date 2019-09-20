<?php require('../logincheck.php');?>
<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
header("Content-type:text/html;charset=utf-8");
include "../../../lib/excel/PHPExcel/IOFactory.php";

$inputFileName ="upload/user.xlsx";
//date_default_timezone_set('PRC');
// 读取excel文件
try {
	$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objPHPExcel = $objReader->load($inputFileName);
} 
catch(Exception $e) {
	die("加载文件发生错误：".pathinfo($inputFileName,PATHINFO_BASENAME).": ".$e->getMessage());
}

// 确定要读取的sheet，什么是sheet，看excel的右下角，真的不懂去百度吧
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
//echo $highestRow ;
$sql="";
$sql1="";
$password='123456';
$photo='img/1234.jpg';

$sql = "INSERT INTO userinfo(Account, UserName, Passwd, Photo, DeptID, LevelID) VALUES  ";
// 获取一行的数据
for ($row = 2; $row <= $highestRow; $row++){
	// Read a row of data into an array
	//echo $row;
	//$rowData = $sheet->rangeToArray("A" . $row . ":" . $highestColumn . $row, NULL, TRUE, FALSE);
	$account= $objPHPExcel->getActiveSheet()->getCell("B".$row)->getValue();//获取B列的值
	$username = $objPHPExcel->getActiveSheet()->getCell("C".$row)->getValue();//获取D列的值
	$deptid = $objPHPExcel->getActiveSheet()->getCell("A".$row)->getValue();//获取A列的值
   	$level = $objPHPExcel->getActiveSheet()->getCell("D".$row)->getValue();//获取E列的值
   
   //echo "name=".$name.$sex.$age.$rank;
	//这里得到的rowData都是一行的数据，得到数据后自行处理，我们这里只打出来看看效果
	//var_dump($rowData);
	//echo $rowData;
	//echo "<br>";
	if ($row==$highestRow)
		$sql1=$sql1."('$account','$username','$password','$photo','$deptid','$level')".";";
    else
		$sql1=$sql1."('$account','$username','$password','$photo','$deptid','$level')".",";
	//echo $sql1;	

}
$sql=$sql.$sql1;
echo $sql;
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
if (!mysql_query($sql,$connjxkh))
 		 {
		 $json_obj= json_encode(array('code'=>400));			
  
 	 }
	 else{
		 $json_obj= json_encode(array('code'=>200));	
		 }			
	echo $json_obj;
	mysql_close($connjxkh);
?>
