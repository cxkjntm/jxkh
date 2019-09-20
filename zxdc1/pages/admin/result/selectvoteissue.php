<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择调查期次</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>
</head>
<body>

<div class="layui-main">

  <div class="layui-row layui-col-lg-offset2">
    <div class="layui-col-md2"></div>
    <div class="layui-col-md8 ayui-col-space1">
      <form class="layui-form layui-form-pane"  method="post" action="selectdept1.php">      
        <div class="layui-form-item">
          <label class="layui-form-label">问卷期次</label>
          <div class="layui-input-inline">
            <select name="voteissue" id="voteissue"   lay-verify="required" lay-filter="voteissue">
              <option value="0">请选择期次</option>
            </select>
          </div>
          
        </div>
       
        <div class="layui-form-item">
          <div class="layui-input-inline">            
            <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="demo1" id="demo">提交</button>
          </div>
          
        </div>
      </form>
    </div>
    <div class="layui-col-md2"></div>
  </div>

</div>
<script>

var $form;
var form;
var $;
//var areaData="";
layui.use(['form', 'jquery'], function(){
    $ = layui.jquery;
    var layer = layui.layer;

    form = layui.form;
    $form = $('form');
    getIssue();

    //get Depts
    function getIssue() {
        $.getJSON("getissue.php", function (data) {
           
            var optionStr = "";
            $.each(data, function (infoIndex, info) {                
                optionStr += '<option value="' + info["RecordID"] + '">' + info["RecordName"] + '</option>';
                //alert(optionStr);
            });
            $form.find('select[name=voteissue]').append(optionStr);
            form.render();   
			
        });
    }
    

   


   
    
    form.on('submit(demo1)', function (data) {
        layer.alert(JSON.stringify(data.field), {
            title: '用户信息'
        })
        return true;
    });

 form.render();
});/**
 * Created by lenovo on 2018/1/30.
 */
</script>
</body>
</html>