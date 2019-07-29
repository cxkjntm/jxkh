<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>注册</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="雷小天">
  <meta name="description" content="雷小天博客-layui中使用form表单监听异步验证注册">
 <link rel="stylesheet" type="text/css" href="../../lib/layui245/css/layui.css">
</head>
<body>
<div>
<form class="layui-form" action=""  method="">
   <div class="layui-row layui-col-space1">
    <div class="layui-col-md3">
      <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-inline">
          <input type="text" name="name" lay-verify="name" autocomplete="off" placeholder="请输入姓名" class="layui-input">
        </div>
      </div>
    </div>
    <div class="layui-col-md3" >
      <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-inline">
          <input type="text" name="sex" lay-verify="sex" autocomplete="off" placeholder="请输入性别" class="layui-input">

        </div>
      </div>
    </div>
    <div class="layui-col-md2">
      <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-inline">
         <input type="text" name="age" lay-verify="age" autocomplete="off" placeholder="请输入年龄" class="layui-input">
        </div>
      </div>
    </div>
    <div class="layui-col-md2">
      <div class="layui-form-item">
        <label class="layui-form-label">职级</label>
        <div class="layui-input-inline">
         <input type="text" name="rank" lay-verify="rank" autocomplete="off" placeholder="请输入职级" class="layui-input">
        </div>
      </div>
    </div>
    <div class="layui-col-md2" >
      <div class="layui-form-item">
        <div class="layui-input-inline">
          <button class="layui-btn" lay-submit="" lay-filter="demo1">提交</button>
        </div>
      </div>
    </div>
  </div>

</form>



</div>
<script src="../../lib/jquery-3.2.1.js"></script>
<script src="../../lib/layui245/layui.js"></script>

<script>

//监听提交
layui.use('form', function(){
  var form = layui.form;
  var layer=layui.layer;
    form.on('submit(demo1)', function(data){
    // layer.msg(JSON.stringify(data.field));//弹出json格式所有表单的值
    var name=data.field.name;
    var sex=data.field.sex;
	var age=data.field.age;
	var rank=data.field.rank;
    if(name.length<3){
      layer.msg('姓名不能少于3个字符', {icon: 2});
      return false;
    }
    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
    if(age>60 || age<20){
      layer.msg('年龄应在20-60间', {icon: 2});
      return false;
    }
    if(rank.length!=4){
      layer.msg('请输入有效职级', {icon: 2});
      return false;
    }
    $.ajax({
      type:"POST",
       url:"saveteacher.php",
      data:"name="+name+"&age="+age+"&sex="+sex+"&rank="+rank,
      dataType:"json",
      success:function(data){
        if(data.code==200){
          layer.msg('保存成功！', {icon: 1});
         // var url = "{:U('device/getinfo')}"; //成功跳转的url
          //setTimeout(window.location.href=url,2000);
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
