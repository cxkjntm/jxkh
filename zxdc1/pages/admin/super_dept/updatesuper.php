<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
mysql_query('SET NAMES UTF8');
if (!isset($_SESSION)) {
    session_start();
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
mysql_select_db($database_connjxkh, $connjxkh);
//获取部门管理员ID
$AdminID=$_GET['AdminID'];

//查询部门管理员信息
$sql01="SELECT AdminID,Account,Passwd,deptinfo.DeptName,deptadmin.DeptID FROM deptadmin ,deptinfo
			WHERE deptadmin.DeptID=deptinfo.DeptID and AdminID=".$AdminID;
$result01 = mysql_fetch_assoc(mysql_query($sql01, $connjxkh));


//查询部门
$sql03="select DeptID, DeptName from deptinfo";
$result03 = mysql_query($sql03, $connjxkh);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改用户信息</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script src="../../../lib/layui230/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
</head>

<form class="layui-form" action="">

  <div class="layui-form-item">
    <label class="layui-form-label">管理员ID</label>
	<div class="layui-input-block">
    <input type="text" id="id" required lay-verify="required" value="<?php echo $result01['AdminID'];?>" readonly="true" autocomplete="off" class="layui-input">   
	</div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">账号</label>
    <div class="layui-input-block">
      <input type="text" id="Account" required lay-verify="required" value="<?php echo $result01['Account'];?>" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">密码</label>
    <div class="layui-input-block">
      <input type="text" id="Passwd" required lay-verify="required" value="<?php echo $result01['Passwd'];?>" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">所属部门</label>
    <div class="layui-input-block">
      <select name="city"  id = "DeptID" lay-verify="required">
        <option value="<?php echo $result01['DeptID']?>"><?php echo $result01['DeptName']?></option>
		<?php 
			while($row01=mysql_fetch_row($result03)){
				echo "<option value='".$row01[0]."'>".$row01[1]."</option>";
			}
		?>
      </select>
    </div>
  </div>
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <input  class="layui-btn" type="button" onclick="test()" value="确认修改"/>
    </div>
  </div>
</form>
 <script>
 function test(){
	 //获取修改后的账号
	 var Account = document.getElementById('Account').value;
	 //获取部门管理员ID
	 var AdminID = document.getElementById('id').value;
	 //获取修改后的密码
	 var Passwd = document.getElementById('Passwd').value;
	 //获取修改后的部门ID
	 var DeptID = document.getElementById('DeptID').value;
	 
	 $.ajax({
	      type:"POST",
	      url:"update_admin_data.php",
	      data:'Account='+Account+'&Passwd='+Passwd+'&AdminID='+AdminID+'&DeptID='+DeptID,
	      dataType:"json",
	      success:function(data){
	        if(data.code==200){
	          	alert("修改成功！");
				parent.location.href="super_dept.php";
	        }else{
				alert("修改失败！");
	        }
	      },
			error:function(data){alert("出错了！");},
	    });
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
</form>
</body>
</html>