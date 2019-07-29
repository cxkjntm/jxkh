<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加管理员</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/modules/layer/default/layer.css"/>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../../lib/layui245/lay/modules/layer.js"></script>
<script type="text/javascript">
 $(function(){
   $("#send").click(function(){
	var supername=$("#supername").val();
	var password=$("#password").val();
	var memo=$("#memo").val();
	
	if (supername.length<4){
		layer.msg("用户名不能少于4个字符");
		return false;
		}
		
	if(password.length<6){
		layer.msg("密码不能少于6个字符");
		return false;
		}
		
	if(memo.length<6){
		layer.msg("备注不能少于6个字符");	
		return false;
		}
					
    var cont = $("input").serialize();
	//alert(cont);
    $.ajax({
      url:'savesuper.php',
      type:'post',
      dataType:'json',
      data:cont,
      success:function(data){
		  var str = "ok";
		  if(data.code==200)
		       str = "添加管理员成功。";	
		  else 
			  str = "添加管理员错误。";
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
	            	<input type="text" name="result"  id="result" autocomplete="off" placeholder="" class="layui-input" />
      	     	</div>
             </div>
        </div>
    </div>
	<div class="layui-col-md7">&nbsp;</div>
</div>
<div class="layui-row">
	<div class="layui-col-md1"> &nbsp;</div>
	<div class="layui-col-md4">
		<div class="layui-form-item" >
        	<div class="layui-inline">
      	    	 <label class="layui-form-label">用户名</label> 
	         	<div class="layui-input-inline">    	  
	           	 	<input type="text" name="supername"  id="supername" autocomplete="off" placeholder="请输入用户名" class="layui-input" />
      	     	</div>
             </div>
        </div>
    </div>
	<div class="layui-col-md7">&nbsp;</div>
</div>
<div class="layui-row">
	<div class="layui-col-md1"> &nbsp;</div>
	<div class="layui-col-md4">
		<div class="layui-form-item" >
        	<div class="layui-inline">
      	    	<label class="layui-form-label"> 密码：</label>
        		<div class="layui-input-inline">   
     				<input type="password" name="password" id="password" autocomplete="off" placeholder="请输入密码" class="layui-input" />
     			</div>
             </div>
        </div>
    </div>
	<div class="layui-col-md7">&nbsp;</div>
</div>
<div class="layui-row">
	<div class="layui-col-md1"> &nbsp;</div>
	<div class="layui-col-md4">
		<div class="layui-form-item" >
        	<div class="layui-inline">
      	    	<label class="layui-form-label">备注：</label>
        		<div class="layui-input-inline">   
     				<input type="text" name="memo"  id="memo" autocomplete="off" placeholder="请输入备注" class="layui-input" />
     			</div>
             </div>
        </div>
    </div>
	<div class="layui-col-md7">&nbsp;</div>
</div>     
   
</form>
<div class="layui-row">
	<div class="layui-col-md1"> &nbsp;</div>
	<div class="layui-col-md2">
		<div class="layui-form-item">
 			<div class="layui-input-block">
				<button class="layui-btn " id="send">提交</button>
    		</div>
		</div>
    </div>
    
	<div class="layui-col-md7">&nbsp;</div>
</div>
</body>
</html>
