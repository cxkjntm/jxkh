<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>正职评副职评价意见统计</title> 
<link rel="stylesheet" href="../../../lib/layui245/css/layui.css"  media="all">
<script src="../../../lib/layui245/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>

</head>
<body class="layui-main ">

<form class="layui-form" method="post"  id="excelfromtable">
	<div class="layui-form-item">
    <label class="layui-form-label">单位名称</label>
    <div class="layui-input-block">
      <input type="text" id="title" lay-verify="required" placeholder="请输入单位名称" autocomplete="off" class="layui-input">
    </div>
  </div> 
	<div class="layui-form-item layui-col-xs-offset6">
		<input class="layui-btn" type="button" onclick="test()" id="export" value="提交"/>
	</div>
</div>
  <input name="excelContent" id="excelContent" type="hidden" value="" autocomplete="off"/>
</form>
<script>
function test(){
	var DeptName=document.getElementById('title').value;
	//alert(DeptName);
	window.location.href ="qz_zcldcy.php?DeptName="+DeptName;
}
</script>
</body>
</html>
