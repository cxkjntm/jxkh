<?php require_once('Connections/connjxkh.php'); ?>
<link rel="stylesheet" type="text/css" href="lib/layer/theme/default/layer.css"/>
<script type="text/javascript" src="lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="lib/layer/layer.js"></script>
<?php

if (!isset($_SESSION)) {
  session_start();
  }	
	mysql_query('SET NAMES UTF8');	
	if(isset($_POST['Q1'])){
		 $Q1 = $_POST['Q1'];
		}	 		  
	if(isset($_POST['Q2']))	
	    $Q2 = $_POST['Q2'];
	
	if(isset($_POST['Q5']))	
	    $Q5 = $_POST['Q5'];
	
	
//echo $Q1;
//echo $Q2;
//echo $Q5;

$postStr = file_get_contents("php://input");
echo $postStr;
$val=explode('&',$postStr);
$size=count($val);
$i=0;
$array = array();
$title=array();
$title1=array();
$item = array();
echo "<br>";
for($i;$i<$size;$i++){
	
	//echo $val[$i]."<br>";
	$valitem=explode('=',$val[$i]);
	$sizeitem=count($valitem);
	echo "<br>";
	$j=0;
	for($j;$j<$sizeitem;$j++){
		//echo $valitem[$j]."<br>";
		if  ($j==0){
			$item['title']=$valitem[$j];
			$title[]=$valitem[$j];			
		}
			
		else
			$item['val']=$valitem[$j];
	}
	$array[]=$item; 
	//print_r($array);
	
}

$title1=array_unique($title);
print_r($title1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>保存数据</title></head>

<body>
</body>
</html>

