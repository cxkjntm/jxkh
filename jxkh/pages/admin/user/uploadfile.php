<!DOCTYPE html&gt;
<html>
<head>
<meta charset="utf-8">
	<title>Excel文件上传</title>
    <link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css">
	<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>
</head>
<body>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>Excel文件</legend>
</fieldset>
 
<div class="layui-upload">
  <button type="button" class="layui-btn" id="test2">选择上传文件</button> 
  <div class="layui-inline layui-word-aux">
</div>
  <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
    预览图：
    <div class="layui-upload-list" id="demo2"></div>
 </blockquote>
</div>
<script type="text/javascript">
layui.use('upload', function (){
  var upload = layui.upload,
    $ = layui.jquery;
var uploadInst = upload.render({
  elem : '#test2',
  accept : 'file',//指定允许上传时校验的文件类型，可选值有：images（图片）、file（所有文件）、video（视频）、audio（音频）
  multiple : 'true',
  url : 'fileupload.php',
  before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        if((file.type).indexOf("image") >= 0 ){
$('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img" style="max-width:100%">')
}else{
 $('#demo2').append(file.name)
}
        console.log(file);
        
      });
    },
  done : function(res){
 
     layer.msg(res.msg,{time:'5000',tipsMore: true,zIndex:'2'}); 
    
  },
  allDone: function(obj){ //当文件全部被提交后，才触发
   $('.layui-word-aux').append("执行完毕，文件总数："+obj.total+"成功："+obj.successful+"个，失败："+obj.aborted+"个");
    console.log(obj.total); //得到总文件数
    console.log(obj.successful); //请求成功的文件数
    console.log(obj.aborted); //请求失败的文件数
  },
  error : function(){
    
    //请求异常
  }
 
});
});
</script>
</body>
</html>
