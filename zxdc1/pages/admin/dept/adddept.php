<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加部门</title>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/modules/layer/default/layer.css"/>
<script type="text/javascript" src="../../../lib/layui245/lay/modules/layer.js"></script>
<script type="text/javascript">
 $(function(){
   $("#send").click(function(){
	var deptname=$("#deptname").val();	
	var deptmemo=$("#deptmemo").val();
	
	if (deptname.length<3){
		layer.msg("部门名称不能少于3个字符");
		return false;
		}
		
	if(deptmemo.length<1){
		layer.msg("备注不能为空");
		return false;
		}	
	
					
    var cont = $("input").serialize();
	cont = decodeURIComponent(cont,true); 
	//alert(cont);
    $.ajax({
      url:'savedept.php',
      type:'post',
      dataType:'json',
      data:cont,
      success:function(data){
		  var str = "ok";
		  if(data.code==200)
		       str = "添加部门成功";	
		  else 
			  str = "添加部门出错啦！";
       $("#result").val(str);
    }
  });
 }); 
 });
</script>
</head>

<body>

<form class="layui-form layui-form-pane" id="my" action="" method="post">
<div class="layui-row">
	<div class="layui-col-md1"> &nbsp;</div>
	<div class="layui-col-md4">
		<div class="layui-form-item" >
        	<div class="layui-inline">
      	    	 <label class="layui-form-label" >&nbsp;</label>             
	            <div class="layui-input-inline">    	  
	            	<input type="text" name="result"  id="result" autocomplete="off" placeholder="" class="layui-input" readonly="readonly" />
      	     	</div>
             </div>
        </div>
    </div>
	<div class="layui-col-md7">&nbsp;</div>
</div>
<div class="layui-row">
	<div class="layui-col-md1"> &nbsp;</div>
	<div class="layui-col-md4">
		<div class="layui-form-item"> 
     	 	<div class="layui-inline">
      	    	 <label class="layui-form-label">部门：</label> 
	         	 <div class="layui-input-inline">    	  
	            	<input type="text" name="deptname"  id="deptname" autocomplete="off" placeholder="请输入部门名" class="layui-input" />
      	     	</div>
            </div>
        </div>        
    </div>
	<div class="layui-col-md7">&nbsp;</div>
</div>
<div class="layui-row">
	<div class="layui-col-md1"> &nbsp;</div>
	<div class="layui-col-md4">
		<div class="layui-form-item"> 
     	 	<div class="layui-inline">
      	    	<label class="layui-form-label">备注：</label>
        		<div class="layui-input-inline">   
     				<input type="text" name="deptmemo" id="deptmemo" autocomplete="off" placeholder="请输入备注" class="layui-input" />
     			</div>
            </div>
        </div>        
    </div>
	<div class="layui-col-md7">&nbsp;</div>
</div>  
 
</form>
<div class="layui-row">
	<div class="layui-col-md2"> &nbsp;</div>
	<div class="layui-col-md2">
		<div class="layui-form-item">
 			<div class="layui-input-inline">
				<button class="layui-btn " id="send">添加新部门</button>
    		</div>
		</div>
    </div>
    
	<div class="layui-col-md8">&nbsp;</div>
</div>

  
</body>
</html>
