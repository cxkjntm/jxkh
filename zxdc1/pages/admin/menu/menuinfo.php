<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>菜单信息</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>

</head>

<body><div class="my-btn-box">
   
    <span class="fr">
        <div class="demoTable">
            <span class="layui-form-label">搜索条件：</span>
            <!--// 搜索ID：-->
        	<div class="layui-inline">
         		<input class="layui-input" name="id" id="demoReload" autocomplete="off" placeholder="请输入搜索条件">
       		 </div>
        	<button class="layui-btn" data-type="reload">查询</button>
        	</div>
        
    </span> 
    
</div>

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
   var tableIns =table.render({
    elem: '#test'
    ,height: 522
	, toolbar: '#toolbarDemo'
    ,url: 'menudata.php' //数据接口
    ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
      layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
      //,curr: 5 //设定初始在第 5 页
      ,groups: 1 //只显示 1 个连续页码
      ,first: false //不显示首页
      ,last: false //不显示尾页
      
    }
    ,cols: [[ //表头
	
       {field: 'MenuID', title: 'ID', width:100, sort: true, fixed: 'left'}
      ,{field: 'MenuName', title: '菜单名', width:200}    
      ,{field: 'MenuMid', title: '菜单码', width:100}  
	  ,{field: 'Menu_URL', title: '路径', width:200} 
	  ,{field: 'Pare_Menu_ID', title: '上级菜单', width:100} 
	  ,{field: 'paixu', title: '排序', width:100} 
	  ,{field: 'stats', title: '状态', width:100} 	  
	  ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}     
    ]]
  });
  
    //搜索功能的实现
        $('.demoTable .layui-btn').on('click', function () {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });

        var $ = layui.$, active = {
            reload: function () {
                var demoReload = $('#demoReload').val();
				//layer.msg(demoReload);

                //执行重载
                table.reload('test',
                          {
							page:
                                  {
                                      curr: 1 //重新从第 1 页开始
                                  }
                        
                        , url: 'getmenu.php?MenuName='+demoReload //后台做模糊搜索接口路径
                        
                          });
            }
        };
        

        // 刷新表格
        $('#btn-refresh').on('click', function () {
            tableIns.reload()
        });

  
  //监听行工具事件
  table.on('tool(test)', function(obj){
    var data = obj.data;
    //console.log(obj)
    if(obj.event === 'ban'){
      layer.msg(" no ban!")
	 } 				
	else if(obj.event === 'edit'){
		var MenuID=data.MenuID;
      layer.open({
        type: 2,
        title: false,
        shade: [0.5],
        title: '修改菜单',
        shadeClose: true,
        shade: 0.5,
        skin: 'demo-class',
        maxmin: true, //开启最大化最小化按钮
        area: ['750px', '600px'],
        shift: 2,
        content: 'updatemenu.php?MenuID='+MenuID //iframe的url
      });
    }
	
  });
  
  //添加采集设备
        $('#btn-add').on('click', function () {
            layer.open({
                type: 2,
                title: '添加新菜单',
                maxmin: true,
                area: ['440px', '460px'],
                shadeClose: false, //点击遮罩不会关闭
                content: 'addMenu.html',//添加设备的from表单是在另一个html中，这是弹出方式的第三种方式
            });
        });

 
});
</script>
</body>
</html>
