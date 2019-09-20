<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor</title>
        <link rel="stylesheet" type="text/css" href="../../lib/layui245/css/layui.css">
        <!-- Make sure the path to CKEditor is correct. -->
        
		<script src="../../lib/ckeditor/ckeditor.js"></script>	
    </head>
    <body>
        <form class="layui-form" action="savenote.php">
         <div class="layui-form-item">
    		<label class="layui-form-label">标题</label>
    		<div class="layui-input-inline">
      			<input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
    		</div>
  		</div>
  		<div class="layui-form-item">
    		<label class="layui-form-label">发布人</label>
    		<div class="layui-input-inline">
    			 <input type="text" name="username" lay-verify="required" placeholder="请输入发布人" autocomplete="off" class="layui-input">
    		</div>
  		</div>
        <div class="layui-form-item">
         <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>        
        </div>           
        <div class="layui-form-item">
      		 <div class="layui-input-block">
             <input name="submit" type="submit" value="添加通知 "class="layui-btn" ">      			     
    		</div>
  		</div>
        </form>
    </body>

 
</html>
