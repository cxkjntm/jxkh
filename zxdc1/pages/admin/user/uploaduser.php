<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传用户文件</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
</head>

<body class="layui-main layui-bg-gray" >
<div  class="layui-row">从Excel文件批量导入用户信息</div>
<div  class="layui-row">_______________________________</div>
<div class="layui-row ">
<form class="layui-form-pane" action="upload_file.php" method="post" enctype="multipart/form-data">
<div class="layui-form-item">	
	<label class="layui-form-label" for="file">选择文件</label>	

	
	<input type="file" name="file" id="file"  /> 

</div>
<div class="layui-form-item">	
    <input type="submit" name="submit" value="上传文件"  class="layui-btn"/>
</div>



</form>
</div>
</body>
</html>
