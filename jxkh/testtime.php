<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
date_default_timezone_set('PRC'); 	
echo "今天:" . date("Y-m-d H:i", time()) . "<br>"; 
echo "今天:" . date("Y-m-d", strtotime("18 june 2008")) . "<br>"; 
$datetime=new\DateTime;
print_r($datetime->format('Y-m-d H:i:s'));
?>
</body>
</html>