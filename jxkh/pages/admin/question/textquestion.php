<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文本问题</title>
</head>
 <link rel="stylesheet" href="lib/layui230/css/layui.css"  media="all">
<script src="lib/layui230/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="lib/layui230//jquery-latest.js"></script>
<body>
<form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">问题编号</label>
    <div class="layui-input-block">
      <input type="text" name="title" required  lay-verify="required" autocomplete="off" class="layui-input">
      
    </div>
    <label class="layui-form-label">设置问题</label>
    <div class="layui-input-block">
      <input type="text" name="title" required  lay-verify="required" autocomplete="off" class="layui-input">
      
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <a href="welcome.html" class="layui-btn">保存</a>
      <button class="layui-btn layui-btn-primary" type="reset">重置</button>
    </div>
  </div>
</form>
 
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});
$('#demo1').on('click',function(){
location.href="index.html";
});
</script>
</body>
</html>