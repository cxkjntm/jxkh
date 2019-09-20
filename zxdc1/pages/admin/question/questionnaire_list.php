<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>考核设置列表</title>
 <link rel="stylesheet" href="../../../lib/layui230/css/layui.css"  media="all">
<script src="../../../lib/layui230/layui.js" charset="utf-8"></script>
</head>
<body>
<table class="layui-hide" id="test" lay-filter="test">
</table>
<script type="text/html" id="barDemo">
<a class="layui-btn layui-btn-xs" lay-event="edit">设置修改</a>  
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="start">启动考核</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="stop">停止考核</a>
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
    ,height: 502
    ,url: 'get_qlist.php' //数据接口
    ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
      layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
      //,curr: 5 //设定初始在第 5 页
      ,groups: 1 //只显示 1 个连续页码
      ,first: false //不显示首页
      ,last: false //不显示尾页
      
    }
    ,cols: [[ //表头
	{field: 'RecordID', title: 'ID', width:50, sort: true, fixed: 'left'}
       ,{field: 'RecordCode', title: '考核编号', width:100, sort: true, fixed: 'left'}
	   ,{field: 'RecordName', title: '考核主题', width:255}
      ,{field: 'starttime', title: '开始时间', width:150,sort:true}
      ,{field: 'endtime', title: '截止时间', width:150, sort: true}
      ,{field: 'status', title: '状态', width:100}
	  ,{field: 'khtype', title: '类型', width:100}        
	  ,{field: '',title:'操作', toolbar: '#barDemo',width:400}
    ]]
  });
    //监听行工具事件
  table.on('tool(test)', function(obj){
    var data = obj.data;
    //console.log(obj)
     if(obj.event === 'edit'){
					var RecordID=data.RecordID;
					//alert(RecordID);
					/*var RecordID=2;*/
      				layer.open({
        			type: 2,
        			title: false,
        			shade: [0.5],
        			title: '修改考核设置',
        			shadeClose: true,
        			shade: 0.5,
					skin: 'demo-class',
       				maxmin: true, //开启最大化最小化按钮
        			area: ['600px', '590px'],
        			shift: 2,
        			content: 'updatequestionnaire.php?RecordID='+RecordID //iframe的url
     			 });
    		 }
			 else if(obj.event === 'stop'){
   
      	layer.confirm('真的停止吗', function(index){
        			//obj.del();
        			console.log(obj);
        	 		console.log(data);
        			//layer.close(index);
         			$.ajax({
                		url: "stopvote.php",
                		type: "POST",
                		data:{'recordcode':data.RecordCode},
                		dataType: "json",
               			success: function(data){            
                    		if(data.code==400){
                     			layer.msg("停止失败", {icon: 5});                        
                    		}else{                      
                       			//删除这一行
                        		obj.del();
                       			//关闭弹框
                        		layer.close(index);
                        		layer.msg("停止成功", {icon: 6});
                        		  layer.closeAll();
			                    parent.location.reload();
                        		Load(); //删除完需要加载数据
                   			 }
                		},
                		error:function(){
                			alert('error');
                		},
 
            		});
      			});   
    } 
	else if(obj.event === 'start'){
   
      		layer.confirm('启动考核吗', function(index){
        			//obj.del();
        			console.log(obj);
        	 		console.log(data);
        			//layer.close(index);
         			$.ajax({
                		url: "startvote1.php",
                		type: "POST",
                		data:{'recordcode':data.RecordCode,'RecordID':data.RecordID},
                		dataType: "json",
               			success: function(data){            
                    		if(data.code==400){
                     			layer.msg("启动失败", {icon: 5});                        
                    		}else{                      
                       			//删除这一行
                        		obj.del();
                       			//关闭弹框
                        		layer.close(index);
                        		layer.msg("启动成功", {icon: 6});
                        		  layer.closeAll();
			                    parent.location.reload();
                        		Load(); //删除完需要加载数据
                   			 }
                		},
                		error:function(){
                			alert('error');
                		},
 
            		});
      			});   
    		} 
	
  });
  });
</script>
</body>
</html>