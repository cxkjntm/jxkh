<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css">
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>
</head>

<body>
<table class="layui-hide" id="test"  lay-filter="test"></table>
<script>
layui.use(['table', 'layer', 'form'], function(){
   var form = layui.form;
   var table = layui.table;
    var layer = layui.layer;
   var $ = layui.jquery;

  
  //第一个实例
   table.render({
    elem: '#test'
    ,height: 800
	,toolbar:true
    ,url: 'getkhresult1.php' //数据接口
    ,page: false
    ,cols: [[ //表头
       {field: 'DeptID', title: '序号', width:100, sort: true, fixed: 'left'}
      ,{field: 'DeptName', title: '部门名', width:200}      
      ,{field: 'zcbz_result', title: '考核结果', width:200}  
	     
    ]]
  });
});

</script>	
</body>
</html>
