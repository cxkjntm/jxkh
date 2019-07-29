<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<link rel="stylesheet" href="../../../lib/layui245/css/layui.css"  media="all">
<script src="../../../lib/layui245/layui.js" charset="utf-8"></script>
<body >
<form class="layui-form" action="5-2018.php?title=title" method="post">
  <div class="layui-form-item">
    <label class="layui-form-label">部门名称</label>
    <div class="layui-input-block">
      <input type="text" name="title" required  lay-verify="required" placeholder="请输入您的部门名称" autocomplete="off" class="layui-input">
    </div>
  </div>
   <div class="layui-form-item" >
          <div class="layui-input-inline">            
            <button class="layui-btn layui-btn-fluid" lay-submit=""  id="demo">提交</button>
          </div>
        </div>
</form>

</body>
</html>