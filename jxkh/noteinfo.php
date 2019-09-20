<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>通知信息--在线问卷调查系统</title>
<link rel="stylesheet" type="text/css" href="css/Login.css"/>
<link rel="stylesheet" type="text/css" href="lib/layui245/css/layui.css"/>
<script type="text/javascript" src="lib/layui245/layui.js"></script>

</head>

<body class="layui-main">
<div id="login_main">
        <div class="loginBox">
            <div class="loginTop">
                <p class="login-college">
                    <img id="school_logo" class="banner-school-img" src="images/hncj.png" alt="">
                    <span id="school_name" style="">企事业</span>
                </p>
                <p class="login-paper" id="xtmc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在线问卷调查系统</p>
            </div>
		</div>
</div>            
            

<table class="layui-hide" id="test" lay-filter="test"></table>
<script type="text/html" id="notetitleTpl">
  <a href="viewnote.php?noteid={{d.NoteID}}" class="layui-table-link" target="_blank">{{ d.NoteTitle }}</a>
</script>
 <div style=" border-top: 1px solid #bac4cd; background-color: #f4f4f4;">
            <div class="footer clearfix">
               
                <div class="logtext-box">
                     <p><span> <h3>© 2019-<span id="nowyear">2019</span> ****有限公司</h3> </span></p>
					<p><br /></p>
					<p>	<br /></p>
					<p><span> <h3>基础技术由河南城建学院提供</h3></span></p>
                    
              </div>
            </div>
        </div>
    </div>
<script>
layui.use(['table', 'layer', 'form'], function(){
   var form = layui.form
            , table = layui.table
            , layer = layui.layer
            , $ = layui.jquery

  
  //第一个实例
   var tableIns =table.render({
    elem: '#test'
	,skin: 'nob'
	,even: true	
    ,height: 452
	,cellMinWidth: 80
    ,url: 'pages/admin/note/notedata.php' //数据接口
    ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
      layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
      //,curr: 5 //设定初始在第 5 页
      ,groups: 1 //只显示 1 个连续页码
      ,first: false //不显示首页
      ,last: false //不显示尾页
      
    }
	
    ,cols: [[ //表头
     
       {field: 'NoteID',  width:50, sort: true, fixed: 'left',hide:true}
      ,{field: 'NoteTitle',  width:600, templet: '#notetitleTpl',align: 'left'}       
	  ,{field: 'ReleasedTime',  width:535,align: 'center'}   	  
	       
    ]],
	done: function (res, curr, count) {
		$('.layui-table .layui-table-cell > span').css({'font-weight': 'bold'});//表头字体样式
		/*$('th').css({'background-color': '#5792c6', 'color': '#fff','font-weight':'bold'}) 表头的样式 */
		$('th').hide();//表头隐藏的样式
		$('.layui-table-page').css('margin-top','40px');//页码部分的高度调整
}

  });
  
  
});
</script>
</body>
</html>
