<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>问卷题目信息</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>
<?php
if (isset($_GET['RecordID'])) {
  $RecordID = $_GET['RecordID'];
?>
</head>

<body>
<div class="my-btn-box">    
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
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a> 
</script>

<script>
var RecordID=<?php echo $RecordID; ?>
layui.use(['table', 'layer', 'form'], function(){
   var form = layui.form
            , table = layui.table
            , layer = layui.layer
            , $ = layui.jquery

  
  //第一个实例
   var tableIns =table.render({
    elem: '#test'
    ,height: 542
    ,url: 'questiondata.php?RecordID='+RecordID //数据接口
    ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
      layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
      //,curr: 5 //设定初始在第 5 页
      ,groups: 1 //只显示 1 个连续页码
      ,first: false //不显示首页
      ,last: false //不显示尾页
      
    }
    ,cols: [[ //表头
       {field: 'questionID', title: '序号', width:50, sort: true, fixed: 'left'}
      ,{field: 'parent_qid', title: '父ID', width:50}      
      ,{field: 'RecordID', title: '问卷编码', width:50}  
	   ,{field: 'type', title: '类型', width:80} 
	   ,{field: 'title', title: '标记', width:80}   
	  ,{field: 'question', title: '题目内容', width:300}   
	  ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}     
    ]]
  }); 
 
});
</script>
</body>
</html>