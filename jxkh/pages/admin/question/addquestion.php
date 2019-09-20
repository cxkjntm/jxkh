
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加问题</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="../../../lib/layui230/css/layui.css"  media="all">
<script src="../../../lib/layui230/layui.js" charset="utf-8"></script>
</head>
<body>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">
  <legend>添加问题</legend>
</fieldset>
<div class="layui-col-md2" style="position:absolute; height:500px; overflow:auto">
	<div class="layui-collapse">
 		<div class="layui-colla-item">
   			<h2 class="layui-colla-title">题型选择</h2>
    		<div class="layui-colla-content layui-show">
        		<ul><li>
   			<a href="addquestiontitle.php?type=S" target="iframe"name="S" class="layui-btn layui-btn-radius">单选题</a>
            </li><br><li>
            <a href="addquestiontitle.php?type=D" target="iframe" name="D" class="layui-btn layui-btn-radius">多选题</a>
            </li><br/><li>
            <a href="addquestiontitle.php?type=T" target="iframe" name="T"class="layui-btn layui-btn-radius">文本问题</a>
            	</li></ul>
  			</div>
       	</div>
   	</div>
	
</div>

<div class="page-content layui-col-md-offset2" height="600">
	<div class="layui-tab tab" lay-filter="wenav_tab" id="WeTabTip" lay-allowclose="true">
		<div class="layui-tab-content" height="600">
			<div class="layui-tab-item layui-show">
				<iframe src='welcome.html'  height="600" width="1000" scrolling="no" 							class="weIframe" name="iframe">
                </iframe>
			</div>
		</div>
	</div>
</div>

<script>
layui.use('element', function(){
  var element = layui.element;
});
layui.config({
			  base: '{/}lib/menu/js/'
			  ,version: '101100'
			}).use('admin');
			layui.use(['jquery','admin'], function(){
				var $ = layui.jquery;				
			});
			
</script>
</body>
</html>