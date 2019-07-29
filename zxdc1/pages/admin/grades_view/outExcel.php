<?php
echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8 " />';//设置内容，编码
 header('Content-type:application/vnd.ms-excel');//设置请求头类型
 header('Content-Disposition:filename=wx_Mini_Program.xls');//设置导出格式 可以改 PreSortiong.xls 后缀成相应的格式
 $content = $_POST['excelContent'];//获取表格内容 
 echo '<table cellpadding="1" cellspacing="1" id="" border="1" >';
 echo $content ;
 echo '</table>' 
 ?>
