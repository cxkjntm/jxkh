<?php require_once('include/config.php'); ?>

<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  echo iconv("GB2312","UTF-8",$zzmc.$xtmc); ?></title>

<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="lib/menu/css/font.css">
<link rel="stylesheet" type="text/css" href="lib/menu/css/weadmin.css">
<link rel="stylesheet" type="text/css" href="lib/layui230/css/layui.css">
<script src="lib/layui230/layui.js" charset="utf-8"></script>
</head>

<body class="layui-bg-gray">    
<div class="layui-carousel layui-bg-gray" style=" left:6%;" id="test10">
  <div carousel-item="">
    <div><img src="images/1.jpg"></div>
	<div><img src="images/2.jpeg"></div>
	<div><img src="images/3.jpeg"></div>
	<div><img src="images/4.jpg"></div>
  </div>
</div>
          
<script src="//res.layui.com/layui/dist/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['carousel', 'form'], function(){
  var carousel = layui.carousel
  ,form = layui.form;
  
  //常规轮播
  carousel.render({
    elem: '#test1'
    ,arrow: 'always'
  });
  
  //改变下时间间隔、动画类型、高度
  carousel.render({
    elem: '#test2'
    ,interval: 1800
    ,anim: 'fade'
    ,height: '120px'
  });
  
  //设定各种参数
  var ins3 = carousel.render({
    elem: '#test3'
  });
  //图片轮播
  carousel.render({
    elem: '#test10'
    ,width: '1000px'
    ,height: '500px'
    ,interval: 5000
  });
  
  //事件
  carousel.on('change(test4)', function(res){
    console.log(res)
  });
  
  var $ = layui.$, active = {
    set: function(othis){
      var THIS = 'layui-bg-normal'
      ,key = othis.data('key')
      ,options = {};
      
      othis.css('background-color', '#5FB878').siblings().removeAttr('style'); 
      options[key] = othis.data('value');
      ins3.reload(options);
    }
  };
  
  //监听开关
  form.on('switch(autoplay)', function(){
    ins3.reload({
      autoplay: this.checked
    });
  });
  
  $('.demoSet').on('keyup', function(){
    var value = this.value
    ,options = {};
    if(!/^\d+$/.test(value)) return;
    
    options[this.name] = value;
    ins3.reload(options);
  });
  
  //其它示例
  $('.demoTest .layui-btn').on('click', function(){
    var othis = $(this), type = othis.data('type');
    active[type] ? active[type].call(this, othis) : '';
  });
});
</script>

</body>
	
</html>