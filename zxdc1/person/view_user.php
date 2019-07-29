<?php require('../Connections/connjxkh.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>职工信息浏览</title>
<link rel="stylesheet" href="../lib/layui245/css/layui.css"  media="all">
<script src="../lib/layui245/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../lib/jquery-3.2.1.js"></script>
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
    ,height: 482
    ,url: 'dept_user_data.php' //数据接口
    ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
      layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
      //,curr: 5 //设定初始在第 5 页
      ,groups: 1 //只显示 1 个连续页码
      ,first: false //不显示首页
      ,last: false //不显示尾页
      
    }
    ,cols: [[ //表头
	  {field: 'Account', title: '账号', width:100,sort: true, fixed: 'left'}
      ,{field: 'UserName', title: '姓名', width:200}
      ,{field: 'DeptName', title: '所属部门', width:300}
      ,{field: 'LevelName', title: '职级', width:200}  
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
        			//console.log(obj);
        	 		//console.log(data);
        			//layer.close(index);
         			$.ajax({
                		url: "del_dept_user.php",
                		type: "POST",
                		data:{'Account':data.Account},
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
                			//删除这一行
                        		obj.del();
                       			//关闭弹框
                        		layer.close(index);
                        		layer.msg("删除成功", {icon: 6});
                        		  //layer.closeAll();
                        		Load(); //删除完需要加载数据
                		},
 
            		});
      			});    } else if(obj.event === 'edit'){
		var Account=data.Account;
      layer.open({
        type: 2,
        title: false,
        shade: [0.5],
        title: '修改信息',
        shadeClose: true,
        shade: 0.5,
        skin: 'demo-class',
        maxmin: true, //开启最大化最小化按钮
        area: ['700px', '400px'],
        shift: 2,
        content: 'update_dept_user.php?Account='+Account //iframe的url
      });
    }
  });
  
  
});
</script>
</body>
</html>
