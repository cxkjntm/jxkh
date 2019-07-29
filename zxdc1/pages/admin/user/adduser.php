<?php require('../logincheck.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>
</head>
<body>

<div class="layui-main">

  <div class="layui-row layui-col-lg-offset2">
    <div class="layui-col-md2"></div>
    <div class="layui-col-md8 ayui-col-space1">
      <form class="layui-form layui-form-pane"  method="post" action="saveuser.php">
      <div class="layui-form-item">
          <label class="layui-form-label">用户工号</label>
          <div class="layui-input-inline">
            <input type="text" name="account" id="account" lay-verify="required|number"  placeholder="请输入工号，8位数字" autocomplete="off"  class="layui-input">
          </div>         
        </div>   
       
        <div class="layui-form-item">
          <label class="layui-form-label">用户名称</label>
          <div class="layui-input-inline">
            <input type="text" name="username" id="username" lay-verify="required|username"  placeholder="请输入用户名" autocomplete="off"  class="layui-input">
          </div>         
        </div>        
        <div class="layui-form-item">
          <label class="layui-form-label">所在部门</label>
          <div class="layui-input-inline">
            <select name="dept" id="dept"   lay-verify="required" lay-filter="dept">
              <option value="0">请选择部门</option>
            </select>
          </div>
          
        </div>

        <div class="layui-form-item">
          <label class="layui-form-label">职务</label>
          <div class="layui-input-inline">
            <select name="level" id="level"   lay-verify="required" lay-filter="dept">
              <option value="0">请选择职务</option>
              <option value="1">校级领导</option>
              <option value="2">中层正职</option>
              <option value="3">中层副职</option>
              <option value="4">普通教工</option>
              <option value="5">教工代表</option>
              <option value="6">学生代表</option>
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
<script type="text/javascript" src="../../../lib/menu/js/vd.js"></script>
</body>
</html>