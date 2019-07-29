<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>角色菜单信息</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>
</head>

<body>
<table class="layui-hide" id="test" lay-filter="test"></table>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>  
</script>
<script>
layui.use(['table', 'layer', 'form'], function(){
 var form = layui.form
            , table = layui.table
            , layer = layui.layer
            , $ = layui.jquery
  
  //第一个实例
  table.render({
    elem: '#test'
    ,height: 482
    ,url: 'rolemenudata.php' //数据接口
    ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
      layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
      //,curr: 5 //设定初始在第 5 页
      ,groups: 1 //只显示 1 个连续页码
      ,first: false //不显示首页
      ,last: false //不显示尾页
      
    }
    ,cols: [[ //表头
      {field: 'id', title: 'ID', width:50, sort: true, fixed: 'left'}
	  ,{field: 'LevelName', title: '角色名称', width:100}
      ,{field: 'MenuName', title: '菜单名称', width:200}
      ,{field: 'MenuMid', title: '菜单编码', width:100, sort: true}
      ,{field: 'Menu_URL', title: '指向网址', width:200}  
	   ,{field: 'Pare_Menu_ID', title: '上级菜单编码', width:120}  
	   ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}       
    ]]
  });
  
  
  //监听行工具事件
  table.on('tool(test)', function(obj){
    var data = obj.data;
    //console.log(obj)
    if(obj.event === 'del'){
      layer.confirm('真的删除行么', function(index){
        			//obj.del();
        			console.log(obj);
        	 		console.log(data);
        			//layer.close(index);
         			$.ajax({
                		url: "delrolemenu.php",
                		type: "POST",
                		data:{'id':data.id},
                		dataType: "json",
               			success: function(data){            
                    		if(data.code==400){
                     			layer.msg("删除失败", {icon: 5});                        
                    		}else{                      
                       			//删除这一行
                        		obj.del();
                       			//关闭弹框
                        		layer.close(index);
                        		layer.msg("删除成功", {icon: 6});
                        		  layer.closeAll();
			                    parent.location.reload();
                        		Load(); //删除完需要加载数据
                   			 }
                		},
                		error:function(){
                			alert("error");
                		},
 
            		});
      			});    } else if(obj.event === 'edit'){
		var ID=data.id;
      layer.open({
        type: 2,
        title: false,
        shade: [0.5],
        title: '修改角色菜单',
        shadeClose: true,
        shade: 0.5,
        skin: 'demo-class',
        maxmin: true, //开启最大化最小化按钮
        area: ['600px', '360px'],
        shift: 2,
        content: 'updaterolemenu.php?ID='+ID //iframe的url
      });
    }
  });
  
  
});
</script>
</body>
</html>
