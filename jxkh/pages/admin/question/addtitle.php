<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加调查问卷</title>
</head>
        <link rel="stylesheet" type="text/css" href="../../../lib/layui230/css/layui.css">		
		<script src="../../../lib/layui230/layui.js" charset="utf-8"></script>	
<script type="text/javascript" src="../../../lib/common.js"></script>
<script type="text/javascript" src="../../../lib/JSEncrypt.js"></script>

<body>


<form class="layui-form" action=""  method="post"><div><label id="formtip" class="alert-info"></label></div>
  <div class="layui-form-item layui-col-md6">
    <label class="layui-form-label">调查标题：</label>
    <div class="layui-input-block">
      <input type="text" id="RecordName" name="recordname" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
</div>
<div class="layui-col-md6">
<div class="layui-form-item">
    <div class="layui-input-block">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
     <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
  <!-- addquestion.php-->
    </div>
  </div>
  </div>
<hr class="layui-bg-green">
<br/>
 	<div class="layui-col-xs12 layui-col-md6">
  		<div class="layui-form-item layui-form-text">
   			 <label class="layui-form-label">问卷描述：</label>
    		<div class="layui-input-block">
           <textarea class="layui-textarea layui-hide" name="description" lay-verify="content1" id="description"></textarea> 
   			</div>
  		</div>
 	</div>
<div class="layui-col-xs12 layui-col-md6" >
   <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">欢迎信息：</label>
    <div class="layui-input-block">
        <textarea class="layui-textarea layui-hide" name="welcome" lay-verify="content2" id="welcome"></textarea>
    </div>
  </div>
</div>
   	<div class="layui-form-item layui-form-text layui-col-md6">
    <label class="layui-form-label">结束信息：</label>
    	<div class="layui-input-block">
            <textarea class="layui-textarea layui-hide" name="end" lay-verify="content3" id="end"></textarea>
    	</div>
  	</div>
	<div class="layui-inline">
		<label class="layui-form-label">开始时间</label>
  		<div class="layui-input-inline ">
  			<input type="text" class="layui-input" name="starttime" id="starttime">
    	</div>
  	</div><br>
    <div class="layui-inline">
 		<label class="layui-form-label">结束时间</label>
  		<div class="layui-input-inline ">
  			<input type="text" class="layui-input"name="endtime" id="endtime">
    	</div>
	</div>
</form>
<script>
layui.use(['form', 'layedit', 'laydate','jquery'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,$=layui.jquery
  ,laydate = layui.laydate;
 
 //创建时间
				  laydate.render({
					elem: '#starttime' //指定元素
				  });
				  laydate.render({
					elem: '#endtime' //指定元素
				  });
  
  //创建一个编辑器
  var description = layedit.build('description');
  var welcome=layedit.build('welcome');
  var end=layedit.build('end');
 
  //自定义验证规则
  form.verify({
    content1: function(value){
    //提交时同步编辑器文本
      layedit.sync(description);
    } 
  });
   form.verify({
    content2: function(value){
    //提交时同步编辑器文本
      layedit.sync(welcome);
    } 
  });form.verify({
    content3: function(value){
    //提交时同步编辑器文本
      layedit.sync(end);
    } 
  });
  
  //监听提交
  form.on('submit(demo1)', function(data){
	  //通过name属性获取值
	  var recordname=data.field.recordname;
	  var description= data.field.description;
	  var end=data.field.end;
	  var welcome=data.field.welcome;
	  var starttime=data.field.starttime;
	  var endtime=data.field.endtime
	 /* alert(recordname);
	  alert(description);
	  alert(welcome);
	  alert(end);
	  alert(starttime);
	  alert(endtime);*/
	  
	  $.ajax({
      type:"POST",
      url:"save_questionnaire.php",
      data:"recordname="+recordname+"&description="+description+"&welcome="+welcome+"&end="+end+"&starttime="+starttime+"&endtime="+endtime,
      dataType:"json",
      success:function(data){
		alert(data.code);
        if(data.code==200){
			alert(data.code);
          layer.msg('保存成功！', {icon: 1});
			window.location.href="addquestion.php";
        }else{
          layer.msg(data.msg, {icon: 2});
        }
      },
    });
	/*  //以json数组的方式，输出提交的信息
    layer.alert(JSON.stringify(data.field), {
      title: '最终的提交信息'
    })
    return false;*/
  });
 
});
				 
				
</script>
</body>
</html>