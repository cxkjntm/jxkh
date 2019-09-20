<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>添加题目子项</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="lyc">
  <meta name="description" content="layui中使用form表单监听异步验证注册">
 <link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css">
</head>
<body>
<div>
<form class="layui-form layui-form-pane" action="saveitem.php"  method="post">
    <div class="layui-row"> 
	<div class="layui-col-md2">&nbsp;&nbsp;</div>
	<div class="layui-col-md4"><div class="layui-form-item">
        <label class="layui-form-label">问题标记</label>
        <div class="layui-input-block">
            <select name="title" id="title"   lay-verify="required" lay-filter="">              
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
			  <option value="D">D</option>
              <option value="E">E</option>
              <option value="F">F</option>
			  <option value="G">G</option>
              <option value="H">H</option>
              <option value="T">T</option>			                    
            </select>
        </div>
      </div>
      
    </div>
	
	<div class="layui-row"> 
	<div class="layui-col-md2">&nbsp;&nbsp;</div>
	<div class="layui-col-md4"><div class="layui-form-item">
        <label class="layui-form-label">内容</label>
        <div class="layui-input-block">
          <input type="text" name="question" lay-verify="required" autocomplete="off" placeholder="请输入内容" class="layui-input">
        </div>
      </div></div>
      
    </div>  
    
	
  <div class="layui-row">
  <div class="layui-col-md2">&nbsp;&nbsp;</div>
  <div class="layui-col-md4">
   <div class="layui-form-item">
        <div class="layui-input-inline">
          <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="demo1">提交子项</button>
        </div>
      </div>
  
  
  </div>
     
    
 </div>   

</form>



</div>
<script src="../../../lib/jquery-3.2.1.js"></script>
<script src="../../../lib/layui245/layui.js"></script>

<script>

//监听提交
layui.use(['form', 'laydate'], function(){
  var form = layui.form;
  var laydate = layui.laydate;
  var layer=layui.layer;
  var $=layui.jquery;
  
  
  
  
    form.on('submit(demo1)', function(data){
    
	layer.msg(JSON.stringify(data.field));//弹出json格式所有表单的值
    
	return true;
  });

form.render();
});

</script>

</body>
</html>
