<?php require('../logincheck.php');?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>添加新菜单</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="lyc2688">
  <meta name="description" content="lyc2688">
 
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css">

<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../../lib/layui245/lay/modules/layer.js"></script>
<script type="text/javascript">
 $(function(){
   $("#send").click(function(){
	var menuname=$("#MenuName").val();
	var menumid=$("#MenuMid").val();
	var menuurl=$("#Menu_URL").val();
	var paremenuid=$("#Pare_Menu_ID").val();
	var order=$("#Order").val();
	var status=$("#Status").val();
	
	if (menuname.length<4){
		layer.msg("菜单名称不能少于4个字符");
		return false;
		}
		
	if(menumid.length!=4){
		layer.msg("菜单编码应为4个字符");
		return false;
		}
		
	if(menuurl=="" || menuurl==null || typeof menuurl == "undefined" ){
		layer.msg("url不能为空");	
		return false;
		}
			
	if(paremenuid="" || paremenuid==null || typeof paremenuid == "undefined" ){
		layer.msg("上级菜单不能为空");	
		return false;
		}
	if(order="" || order==null || typeof order == "undefined" ){
		layer.msg("排序不能为空");	
		return false;
		}
	if(status="" || status==null || typeof status == "undefined" ){
		layer.msg("状态不能为空");	
		return false;
		}
							
    var cont = $("input").serialize();
	//alert(cont);
    $.ajax({
      url:'savemenu.php',
      type:'post',
      dataType:'json',
      data:cont,
      success:function(data){
		   var str = "ok";
		  if(data.code==200)
		       str = "添加菜单成功。";	
		  else 
			  str = "添加菜单失败。";
       $("#result").val(str);
      
    }
  });
 }); 
 });
</script>
</head>
<body>
<div>
<form class="layui-form" action=""  method="post">
<div class="layui-row">
	<div class="layui-col-md1"> &nbsp;</div>
	
		<div class="layui-form-item" >
        	<div class="layui-inline">
      	    	 <label class="layui-form-label" >返回结果：</label>             
	            <div class="layui-input-inline">    	  
	            	<input type="text" name="result"  id="result" autocomplete="off" placeholder="" class="layui-input" />
      	     	</div>
             </div>
        </div>
	<div class="layui-col-md7">&nbsp;</div>
</div>
   <div class="layui-row layui-col-space1">
      <div class="layui-form-item">
        <label class="layui-form-label">菜单名称：</label>
        <div class="layui-input-inline">
          <input type="text" name="MenuName" id="MenuName"  autocomplete="off" placeholder="请输入菜单名" class="layui-input">
        </div>
      </div>
    
    
  </div>
  <div class="layui-row layui-col-space1">
      <div class="layui-form-item">
        <label class="layui-form-label">菜单编码：</label>
        <div class="layui-input-inline">
          <input type="text" name="MenuMid"  id="MenuMid"  autocomplete="off" placeholder="请输入菜单编码" class="layui-input">

        </div>
      </div>
   
    
  </div>
  <div class="layui-row layui-col-space1">
      <div class="layui-form-item">
        <label class="layui-form-label">指向网址：</label>
        <div class="layui-input-inline">
         <input type="text" name="Menu_URL" id="Menu_URL" autocomplete="off" placeholder="请输入网址" class="layui-input">
        </div>
      </div>  
    
  </div>
 
<div class="layui-row layui-col-space1"> 
      <div class="layui-form-item">
        <label class="layui-form-label">上级菜单：</label>
         <div class="layui-input-inline">
        <input type="text" name="Pare_Menu_ID"  id="Pare_Menu_ID" autocomplete="off" placeholder="请输入上级菜单编码" class="layui-input"> 
         </div>       
      </div> 
</div>
<div class="layui-row layui-col-space1"  > 
      <div class="layui-form-item">
        <label class="layui-form-label">排&emsp;&emsp;序：</label>
         <div class="layui-input-inline">
        <input type="text" name="Order"  id="Order" autocomplete="off" placeholder="请输入序号" class="layui-input">  
         </div>      
      </div>
</div>
<div class="layui-row layui-col-space1"  > 
      <div class="layui-form-item">
        <label class="layui-form-label">状&emsp;&emsp;态：</label>
         <div class="layui-input-inline">
        <input type="text" name="Status" id="Status" autocomplete="off" placeholder="请输入状态" class="layui-input">    
         </div>    
      </div>
</div>
</form>
</div>
<div class="layui-row">
	<div class="layui-col-md1"> &nbsp;</div>
		<div class="layui-form-item">
 			<div class="layui-input-block">
				<button class="layui-btn " id="send">添加新菜单</button>
    		</div>
		</div>
	<div class="layui-col-md7">&nbsp;</div>
</div>



</body>
</html>