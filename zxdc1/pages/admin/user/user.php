<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户信息</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>

</head>

<body>
<div class="my-btn-box">    
    <span class="fr">
        <div class="demoTable">
            <span class="layui-form-label">搜索类型：</span>
            <!--// 搜索ID：-->
         <div class="layui-inline">
         
         <select name="xctype" id="xctype"   lay-verify="required" lay-filter="xctype">
              <option value="0">请选择搜索类型</option>
              <option value="1">工号</option>
              <option value="2">用户名</option>
              <option value="3">部门</option>
              <option value="4">职级</option>              
            </select>
        </div>
        <div class="layui-inline">
         <input class="layui-input" name="id" id="demoReload" autocomplete="off" placeholder="请输入搜索条件">
        </div>
        <button class="layui-btn" data-type="reload">查询</button>
        </div>
    </span>
</div>


<table class="layui-hide" id="test" lay-filter="test"></table>
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
    ,url: 'userdata.php' //数据接口
    ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
      layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
      //,curr: 5 //设定初始在第 5 页
      ,groups: 1 //只显示 1 个连续页码
      ,first: false //不显示首页
      ,last: false //不显示尾页
      
    }
    ,cols: [[ //表头
       {field: 'UserID', title: 'ID', width:100, sort: true, fixed: 'left'}
	   ,{field: 'Account', title: '工号', width:100}
      ,{field: 'UserName', title: '用户名', width:100}
      ,{field: 'Photo', title: '照片', width:200, sort: true}
      ,{field: 'DeptName', title: '部门', width:200}  
	  ,{field: 'LevelName', title: '职务', width:100}    	 
    ]]
  });
  
   form.on('select(xctype)', function (data) {
                //optionStr="";
                var value = data.value;
				alert(value);
				console.log(data.elem); //得到select原始DOM对象
                switch (value){
					
					case 1:{
						$('#demoReload').html("请输入工号");
						break;
					}
					case 2:{
						$('#demoReload').html("请输入用户名");
						break;
					}
					case 3:{
						$('#demoReload').html("请输入部门");
						break;
					}
					case 4:{
						$('#demoReload').html("请输入职级");
						break;
					}
					default:{
						$('#demoReload').html("请输入工号");
						break;
						}				
					
					
					}
				form.render();
            });
  
   //搜索功能的实现
        $('.demoTable .layui-btn').on('click', function () {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });

        var $ = layui.$, active = {
            reload: function () {
                var demoReload = $('#demoReload').val();
				var xctype= $('#xctype').val();
				//alert(xctype);
				//layer.msg(demoReload);

                //执行重载
                table.reload('test',
                          {
							page:
                                  {
                                      curr: 1 //重新从第 1 页开始
                                  }
                        
                        , url: 'getuser.php?xctj='+demoReload+"&xctype="+xctype //后台做模糊搜索接口路径
                        
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
    if(obj.event === 'del'){
      layer.confirm('真的禁用行么', function(index){
        			//obj.del();
        			console.log(obj);
        	 		console.log(data);
        			//layer.close(index);
         			$.ajax({
                		url: "banuser.php",
                		type: "POST",
                		data:{'id':data.UserID},
                		dataType: "json",
               			success: function(data){            
                    		if(data.code==400){
                     			layer.msg("禁用失败", {icon: 5});                        
                    		}else{                      
                       			//删除这一行
                        		obj.del();
                       			//关闭弹框
                        		layer.close(index);
                        		layer.msg("禁用成功", {icon: 6});
                        		  layer.closeAll();
			                    parent.location.reload();
                        		Load(); //删除完需要加载数据
                   			 }
                		},
                		error:function(){
                			alert('error');
                		},
 
            		});
      			});    } else if(obj.event === 'edit'){
		var UserID=data.UserID;
      layer.open({
        type: 2,
        title: false,
        shade: [0.5],
        title: '修改用户',
        shadeClose: true,
        shade: 0.5,
        skin: 'demo-class',
        maxmin: true, //开启最大化最小化按钮
        area: ['760px', '700px'],
        shift: 2,
        content: 'updateuser.php?UserID='+UserID //iframe的url
      });
    }
  });
  
});
</script>
</body>
</html>
