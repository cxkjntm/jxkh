
<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

header("Content-type:text/html;charset=utf-8");
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);

//查询部门名字
$sql01="SELECT DeptID,DeptName from deptinfo";
$result01 =mysql_query($sql01, $connjxkh);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加部门管理员</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
</head>
<body>

<div class="layui-main">

  <div class="layui-row layui-col-lg-offset2">
    <div class="layui-col-md2"></div>
    <div class="layui-col-md8 ayui-col-space1">
      <form class="layui-form layui-form-pane"  method="post" action="" >
      <div class="layui-form-item">
          <label class="layui-form-label">管理员账号</label>
          <div class="layui-input-inline">
            <input type="text" name="account" id="account" lay-verify="required" onblur="id1()" placeholder="请输入工号，8位数字" autocomplete="off"  class="layui-input">
          </div>
			<label id="s" style="color:red;"></label>
        </div>  		
        <div class="layui-form-item">
          <label class="layui-form-label">所在部门</label>
          <div class="layui-input-inline">
            <select name="level" id="DeptID"   lay-verify="required">
              <option value="0">请选择部门</option>
              <?php 
					while($row01=mysql_fetch_row($result01)){
						echo "<option value='".$row01[0]."'>".$row01[1]."</option>";
					}
				?>
            </select>
          </div>
        </div>
		注：部门管理员密码即管理员账号对应的用户密码
		<input type="hidden" name="dept" id = "deptID" value="<?php echo $_SESSION['Admin_DeptID'];?>">
        <div class="layui-form-item">
          <div class="layui-input-inline">            
            <input  class="layui-btn" type="button" onclick="test();" value="立即提交"/>
          </div>
        </div>
		
      </form>
    </div>
    <div class="layui-col-md2"></div>
  </div>

</div>
</body> 
<script>
function test(){
	 //获取部门管理员账号
	 var account = document.getElementById('account').value;
	 //获取部门管理员部门ID
	 var DeptID = document.getElementById('DeptID').value;
	 if(DeptID==0){
		 alert("请选择部门");
	 }else {
		 if(account==""){
		 alert("请输入管理员账号");
	 }else{
		 $.ajax({
	      type:"POST",
	      url:"save_dept_admin.php",
	      data:'account='+account+'&DeptID='+DeptID,
	      dataType:"json",
	      success:function(data){
			//
	        if(data.code==200){
				alert("添加部门管理员成功！");
				window.location.href="add_dept_admin.php";
	        }else{
				alert("添加部门管理员失败,该账号不存在于此部门！");
	        }
	      },
			error:function(data){alert("出错了！");},
	    });
	 }
	 }
 }
</script>
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});
</script>
</html>