<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文本问题</title>
</head>
 <link rel="stylesheet" href="../../../lib/layui230/css/layui.css"  media="all">
<script src="../../../lib/layui230/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<body>
<form class="layui-form" action="" method="">
  <div class="layui-form-item">
    <label class="layui-form-label">问题编号</label>
   
    <div class="layui-input-block">
      <input type="text" id="title"name="title" required  lay-verify="title" autocomplete="off" class="layui-input">
      
    </div>
    <label class="layui-form-label">设置问题</label>
    <div class="layui-input-block">
      <input type="text" id="question" name="question" required  lay-verify="question" autocomplete="off" class="layui-input">
      
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
          <button class="layui-btn" lay-submit="" lay-filter="demo1">保存</button>
      <button class="layui-btn layui-btn-primary" type="reset">重置</button>
    </div>
  </div>
</form>
<script>
//获取type
	function GetRequest() {
  var url = location.search; //获取url中"?"符后的字串
   var theRequest = new Object();
   if (url.indexOf("?") != -1) {
      var str = url.substr(1);
      strs = str.split("&");
      for(var i = 0; i < strs.length; i ++) {
         theRequest[strs[i].split("=")[0]]=(strs[i].split("=")[1]);
      }
   }
   return theRequest;
}
var Request = new Object();
Request = GetRequest();
var type=Request['type'];

//alert(type);

//监听提交
layui.use('form', function(){
  var form = layui.form;
  var layer=layui.layer;
    form.on('submit(demo1)', function(data){
    // layer.msg(JSON.stringify(data.field));//弹出json格式所有表单的值
    var title=data.field.title;
    var question=data.field.question;
	//alert(title);
	//alert(question);
	if(title==""||title==null){
      layer.msg('问题编号不能为空', {icon: 2});
      return false;
    }
    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
    if(question==""||question==null){
      layer.msg('问题不能为空', {icon: 2});
      return false;
    }
    $.ajax({
      type:"POST",
      url:"save_question.php",
      data:"type="+type+"&title="+title+"&question="+question,
      dataType:"json",
      success:function(data){
        if(data.code==200){
			if(type=="T"){
			 layer.msg('保存成功！', {icon: 1});
			window.location.href="welcome.html";
			}else{
			window.location.href="add_answer.php?type="+type;
			}
        }else{
          layer.msg(data.msg, {icon: 2});
        }
      },
    });
	return false;
  });
form.render();
});
</script>
</body>
</html>