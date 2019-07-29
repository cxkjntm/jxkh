
<?php require_once('../Connections/connjxkh.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

header("Content-type:text/html;charset=utf-8");
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);

//查询部门名字
$sql01="SELECT DeptID,DeptName from deptinfo where DeptID =".$_SESSION['Admin_DeptID'];
$result01 = mysql_fetch_assoc(mysql_query($sql01, $connjxkh));
//查询职级
$sql02="SELECT LevelID,LevelName FROM levelinfo where LevelID !=1;";
$result02=mysql_query($sql02, $connjxkh)
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户</title>
<link rel="stylesheet" type="text/css" href="../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../lib/layui245/layui.js"></script>
<script type="text/javascript" src="../lib/jquery-3.2.1.js"></script>
</head>
<body>

<div class="layui-main">

  <div class="layui-row layui-col-lg-offset2">
    <div class="layui-col-md2"></div>
    <div class="layui-col-md8 ayui-col-space1">
      <form class="layui-form layui-form-pane"  method="post" action="" >
	  
      <div class="layui-form-item">
          <label class="layui-form-label">用户工号</label>
          <div class="layui-input-inline">
            <input type="text" name="account" id="account" lay-verify="required" onblur="id1()" placeholder="请输入工号，8位数字" autocomplete="off"  class="layui-input">
			</div> 
		       <label id="s" style="color:red;"></label>
        </div>   
       
        <div class="layui-form-item">
          <label class="layui-form-label">用户名称</label>
          <div class="layui-input-inline">
            <input type="text" name="username" id="username" lay-verify="required" onblur="id2()"  placeholder="请输入用户名" autocomplete="off"  class="layui-input">
          </div>
			<label id="n" style="color:red;"></label>
        </div>  
		
        <div class="layui-form-item">
          <label class="layui-form-label">职务</label>
          <div class="layui-input-inline">
            <select name="level" id="level"  onblur="id3()" lay-verify="required">
			
              <option value="0">请选择职务</option>
			  <?php 
				if($result01['DeptID']==53){
					echo "<option value='1'>校级领导</option>"; 
				}
				 while($row=mysql_fetch_row($result02)){ 
				 echo "<option value='".$row[0]."'>".$row[1]."</option>";
				 }
			?>
            </select>
          </div>
        </div>
		
        <div class="layui-form-item">
          <label class="layui-form-label">所在部门</label>
          <div class="layui-input-inline">
            <input type="text" lay-verify="required"  value="<?php echo $result01['DeptName'];?>" readOnly="true" autocomplete="off"  class="layui-input">
          </div>
          
        </div>

		<h4>&ensp;&ensp;&ensp;&ensp;&ensp;注：新用户默认密码为12345678</h4><br>
		<input type="hidden" name="dept" id = "dept" value="<?php echo $_SESSION['Admin_DeptID'];?>">
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
<script type="text/javascript">
    function id1() {
        var account = document.getElementById("account").value;
		//获取用户账号位数
		var l=account.toString().length;
        var str = /^\d+$/.test(account);
        if (account == "") {
            //alert("ID不能为空");
            document.getElementById("s").innerHTML = "账号不能为空";
        }
        else if (!str) {
            //alert("只能输入数字");
            document.getElementById("s").innerHTML = "只能输入数字";
            return false;
        }if(l!=8){
			document.getElementById("s").innerHTML = "工号限制为8位数";
			 return false;
		}else {
            //alert("输入正确");
            document.getElementById("s").innerHTML = "输入正确";
            return true;
        }
    }
	function id2() {
        var username = document.getElementById("username").value;
        if (username == "") {
            //alert("ID不能为空");
            document.getElementById("n").innerHTML = "用户名不能为空";
			 return false;
        }else {
            //alert("输入正确");
            document.getElementById("n").innerHTML = "输入正确";
            return true;
        }
    }
</script>
<script>
function test(){
	 //获取用户名
	 var username = document.getElementById('username').value;
	 
	 //获取用户账号
	 var account = document.getElementById('account').value;
	 
	 //获取用户职级
	 var level = document.getElementById('level').value;
	 //获取用户部门ID
	 var dept = document.getElementById('dept').value;
	if(level==0){
		alert("职级未选择");
	}else{
		$.ajax({
	      type:"POST",
	      url:"save_user.php",
	      data:'username='+username+'&account='+account+'&dept='+dept+'&level='+level,
	      dataType:"json",
	      success:function(data){
			//
	        if(data.code==200){
				alert("保存成功！");
				window.location.href="add_user.php";
	        }else{
				alert("该账号已经存在！");
	        }
	      },
			error:function(data){alert("添加用户成功！");window.location.href="add_user.php";},
	    });
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