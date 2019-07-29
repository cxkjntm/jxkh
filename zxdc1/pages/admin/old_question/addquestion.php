<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>添加题目</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="lyc">
  <meta name="description" content="layui中使用form表单监听异步验证注册">
 <link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css">
</head>
<body>
<div>
<form class="layui-form layui-form-pane" action="savequestion.php"  method="post">
    <div class="layui-row"> 
	<div class="layui-col-md2">&nbsp;&nbsp;</div>
	<div class="layui-col-md4"><div class="layui-form-item">
        <label class="layui-form-label">问题标记</label>
        <div class="layui-input-block">
          <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入题目标记" class="layui-input">
        </div>
      </div></div>
      
    </div>
	
	<div class="layui-row"> 
	<div class="layui-col-md2">&nbsp;&nbsp;</div>
	<div class="layui-col-md4"><div class="layui-form-item">
        <label class="layui-form-label">问题</label>
        <div class="layui-input-block">
          <input type="text" name="question" lay-verify="required" autocomplete="off" placeholder="请输入题目" class="layui-input">
        </div>
      </div></div>
      
    </div> 
   <div class="layui-row"> 
     <div class="layui-col-md2">&nbsp;</div>
	<div class="layui-col-md4"><div class="layui-form-item">
        <label class="layui-form-label">问题类型</label>
        <div class="layui-input-inline">
         	  <select name="qtype" id="qtype"   lay-verify="required" lay-filter="qtype">              
              <option value="单选题">单选题</option>
              <option value="多选题">多选题</option>
              <option value="文本题">文本题</option>              
            </select>
        </div>
      </div></div>
      
	  </div>
    
	
  <div class="layui-row">
  <div class="layui-col-md2">&nbsp;&nbsp;</div>
  <div class="layui-col-md4">
   <div class="layui-form-item">
        <div class="layui-input-inline">
          <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="demo1">提交问题</button>
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
  
  
  
  form.verify({
    title: function(value){
      if(value.length < 4 || value.length >10){
        return '问题标记名为4-10个字符';
      }
    }
   
    
  });
  
    form.on('submit(demo1)', function(data){
    
	layer.msg(JSON.stringify(data.field));//弹出json格式所有表单的值
    
	return true;
  });

form.render();
});

</script>

</body>
</html>
