<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>河南城建学院中层干部考核系统登录</title>  
 <link rel="stylesheet" type="text/css" href="../../lib/layui245/css/layui.css">
<link rel="stylesheet" type="text/css" href="../../lib/menu/css/weadmin.css">
<link rel="stylesheet" type="text/css" href="../../lib/menu/css/font.css">
</head>
<body class="login-bg">
	<div class="login">
		<div class="message">河南城建学院中层干部考核系统登录</div>
        <div id="darkbannerwrap"></div> 
		<form class="layui-form  " action=""  method="">
   		<div class="layui-row ">
         			 <div >
      			<div class="layui-form-item">   
                     			 <label class="layui-form-label">用户名称&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
        			<div class="layui-input-block" >
          				<input type="text" name="username" id="username" lay-verify="username" autocomplete="off" placeholder="请输入用户名" class="layui-input layui-icon-username">
                        
        			</div>
      			</div>
    		</div>
            </div>
            <div class="layui-row ">             
   		 	<div >
      			<div class="layui-form-item" align="center">
                 <label class="layui-form-label">登录密码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
        			<div class="layui-input-block">
        				 <input type="password" id="password" name="password" lay-verify="password" autocomplete="off" placeholder="请输入密码" class="layui-input layui-icon-password">
                        
        			</div>
      			</div>
    		</div>
            </div>
            <div class="layui-row ">              
    		<div >
      			<div class="layui-form-item">
                 <label class="layui-form-label">----->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
       			 <div class="layui-input-block" >
        			  <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="demo1" >登录系统</button>
                   
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
    var username=data.field.username;
    var password=data.field.password;
	//alert(username);
	
    if(username.length<3||username.length>30){
      layer.msg('用户名称不能少于3个字符或多于20个字符', {icon: 2});
      return false;
    }
    
    if(password.length<6){
      layer.msg('密码长度不能小于6个字符', {icon: 2});
      return false;
    }
    $.ajax({
      type:"POST",
      url:"signin.php",
      data:'SuperName='+username+'&SuperPwd='+password,
      dataType:"json",
      success:function(data){
        if(data.code==200){
          //layer.msg('保存成功！', {icon: 1});
          var url = "index.php"; //成功跳转的url
         setTimeout(window.location.href=url,2000);
        }else{
          layer.msg("登录失败，用户名或密码错误！", {icon: 2});
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
