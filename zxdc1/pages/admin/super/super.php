<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统管理员信息</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>
</head>

<body>
<table class="layui-hide" id="test" lay-filter="test"></table>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
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
    ,height: 312
    ,url: 'superdata.php' //数据接口
    ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
      layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
      //,curr: 5 //设定初始在第 5 页
      ,groups: 1 //只显示 1 个连续页码
      ,first: false //不显示首页
      ,last: false //不显示尾页
      
    }
    ,cols: [[ //表头
      {field: 'SuperID', title: 'ID', width:50, sort: true, fixed: 'left'}
      ,{field: 'SuperName', title: '用户名', width:100}
      ,{field: 'SuperPwd', title: '密码', width:550}
      ,{field: 'SuperMemo', title: '备注', width:200}  
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
                		url: "delsuper.php",
                		type: "POST",
                		data:{'superid':data.SuperID},
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
			                    window.location.reload();
                        		Load(); //删除完需要加载数据
                   			 }
                		},
                		error:function(){
                			alert("error");
                		},
 
            		});
      			});    } else if(obj.event === 'edit'){
		var SuperID=data.SuperID;
      layer.open({
        type: 2,
        title: false,
        shade: [0.5],
        title: '修改管理员',
        shadeClose: true,
        shade: 0.5,
        skin: 'demo-class',
        maxmin: true, //开启最大化最小化按钮
        area: ['500px', '360px'],
        shift: 2,
        content: 'updatesuper.php?SuperID='+SuperID //iframe的url
      });
    }
  });
  
  
});
</script>
</body>
</html>
