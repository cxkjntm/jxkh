<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多选题</title>
</head>
 <link rel="stylesheet" href="../../../lib/layui230/css/layui.css"  media="all">
<script src="../../../lib/layui230/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<body>
<table class="layui-table"lay-skin="nob" >   
<colgroup>
    <col width="400">
    <col width="400">
    <col>
  </colgroup>
   <div>
        <button  class="layui-btn"  onclick="addrow();">添加选项</button>
        </div>
        <tr>
        <td>选项编号</td>
        <td>选项内容</td>
        <td>删除</td>
        </tr>
</table>
 <!--<button class="layui-btn" lay-submit="" lay-filter="demo1">保存</button>
      <button class="layui-btn layui-btn-primary" type="reset">重置</button></li>-->
      <a href="" class="layui-btn" onclick="test();">保存</a>
      
<script type="text/javascript">
//获取type
	function GetRequest() {
  var url = location.search; //获取url中"?"符后的字串
   var theRequest = new Object();
   if (url.indexOf("?") != -1) {
      var str = url.substr(1);
      strs = str.split("&");
      for(var i = 0; i < strs.length; i ++) {
         theRequest[strs[i].split("=")[0]]=(strs[i].split("=")[1]);
      }
   }
   return theRequest;
}
var Request = new Object();
Request = GetRequest();
var type=Request['type'];
//alert("question type is  "+type);

//添加输入框
function addrow(){
var tables = $('.layui-table');
var addtr = $("<tr>"+
"<td>"+"<input width='100' type='text' name='test'/></td><td>"+"<input width='100' type='text' name='test' /></td><td><span onclick='deleteTrRow(this);'>&nbsp;删除</span></td>"+"</tr>");
      addtr.appendTo(tables);
}
//控制删除键只能删除两级以内
function deleteTrRow(tr){
    $(tr).parent().parent().remove();
    }
//按钮监听事件
function test(){
	// 获得多个同name 的input输入框的值
	var num = new Array();
		var els =document.getElementsByName("test");
		for (var i = 0, j = els.length; i < j; i++){
			num[i]= els[i].value;
			//alert(els[i].value);
			}
			//num[els.length+1]=type;
	  $.ajax({
      type:"POST",
      url:"question.php",
      data:'name='+JSON.stringify(num)+"&type="+type,
      dataType:"json",
      success:function(data){
        if(data.code==200){
          	//alert("保存成功！");
			window.location.href="welcome.html";
        }else{
			alert("保存失败！");
        }
      },
		error:function(data){alert("error");},
    });
	/*  //以json数组的方式，输出提交的信息
    layer.alert(JSON.stringify(data.field), {
      title: '最终的提交信息'
    })
    return false;
  });*/
 
}	
</script>
</body>
</html>