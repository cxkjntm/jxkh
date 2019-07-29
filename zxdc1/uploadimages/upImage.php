<!DOCTYPE html >
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传图片文件</title>
</head>
<style type="text/css">
	.surfaceThree {
    position: relative;
    width: 120px;
    background: #C0C0C0;
    border-radius: 6px;
    text-align: center;
	right: -14%;
   
    font-size: 20px;
    color: #fff;
}
.input {
    position: relative;
    width: 120px;
    background: #C0C0C0;
    border-radius: 6px;
    text-align: center;
	right: -14%;
    font-size: 20px;
	line-height: 30px;
    color: #fff;
}
.surfaceThree input {
    position: absolute;
    top: 10px;
    /* color: #fff; */
    height: 30px;
    /* 重点代码让input隐藏 */
    opacity: 0;
}
</style>
<body>
<form action="uploadimages/upload.php" enctype="multipart/form-data" method="post" name="uploadfile" >
	<div class="surfaceThree">修改头像
		<input id="upfile" type="file" name="upfile"/>
	</div>
	<input  class="input" type="submit" value="更新"/>
</form>

</body>
</html>