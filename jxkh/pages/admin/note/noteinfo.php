<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>通知信息</title>
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
   var tableIns =table.render({
    elem: '#test'
    ,height: 452
    ,url: 'notedata.php' //数据接口
    ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
      layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
      //,curr: 5 //设定初始在第 5 页
      ,groups: 1 //只显示 1 个连续页码
      ,first: false //不显示首页
      ,last: false //不显示尾页
      
    }
    ,cols: [[ //表头
     
       {field: 'NoteID', title: 'ID', width:50, sort: true, fixed: 'left'}
      ,{field: 'NoteTitle', title: '标题', width:200}
      ,{field: 'NoteContent', title: '内容', width:300}
      ,{field: 'NotePublisher', title: '发布人', width:80}  
	  ,{field: 'ReleasedTime', title: '发布时间', width:120}   
	  
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
                		url: "delnote.php",
                		type: "POST",
                		data:{'NoteID':data.NoteID},
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
                			alert("删除成功！");
                		},
 
            		});
      			});    } else if(obj.event === 'edit'){
		var NoteID=data.NoteID;
      layer.open({
        type: 2,
        title: false,
        shade: [0.5],
        title: '修改通知',
        shadeClose: true,
        shade: 0.5,
        skin: 'demo-class',
        maxmin: true, //开启最大化最小化按钮
        area: ['900px', '860px'],
        shift: 2,
        content: 'updatenote.php?NoteID='+NoteID //iframe的url
      });
    }
  });
  
});
</script>
</body>
</html>
