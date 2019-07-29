<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>角色信息</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>

</head>

<body>



<table class="layui-hide" id="test" lay-filter="test"></table>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="ban">禁用</a> 
</script>
<script>
layui.use(['table', 'layer', 'form'], function(){
   var form = layui.form
            , table = layui.table
            , layer = layui.layer
            , $ = layui.jquery

  
  //第一个实例
   var tableIns =table.render({
    elem: '#test'
    ,height: 452
    ,url: 'roledata.php' //数据接口
    ,page: false
    ,cols: [[ //表头
       {field: 'LevelID', title: 'ID', width:100, sort: true, fixed: 'left'}
      ,{field: 'LevelName', title: '角色名', width:100}    
      ,{field: 'IsBanned', title: '是否禁用', width:100} 
	  ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}     
    ]]
  });
  
    
  
  //监听行工具事件
  table.on('tool(test)', function(obj){
    var data = obj.data;
    //console.log(obj)
    if(obj.event === 'ban'){
      layer.confirm('真的禁用行么', function(index){
        			//obj.ban();
        			console.log(obj);
        	 		console.log(data);
        			//layer.close(index);
         			$.ajax({
                		url: "banrole.php",
                		type: "POST",
                		data:{'LevelID':data.LevelID},
                		dataType: "json",
               			success: function(data){            
                    		if(data.code==400){
                     			layer.msg("禁用失败", {icon: 5});                        
                    		}else{                      
                       			//删除这一行
                        		//obj.del();
                       			//关闭弹框
                        		layer.close(index);
                        		layer.msg("禁用成功", {icon: 6});
                        		  layer.closeAll();
			                    window.location.reload();
                        		Load(); //删除完需要加载数据
                   			 }
                		},
                		error:function(){
                			alert("error");
                		},
 
            		});
      			});    } 
				
				else if(obj.event === 'edit'){
		var LevelID=data.LevelID;
      layer.open({
        type: 2,
        title: false,
        shade: [0.5],
        title: '修改角色',
        shadeClose: true,
        shade: 0.5,
        skin: 'demo-class',
        maxmin: true, //开启最大化最小化按钮
        area: ['450px', '300px'],
        shift: 2,
        content: 'updaterole.php?LevelID='+LevelID //iframe的url
      });
    }
	
  });
  
});
</script>
</body>
</html>
