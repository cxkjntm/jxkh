<?php require_once('../Connections/connjxkh.php'); ?>
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
//获取用户账号信息
$Account=$_GET['Account'];
//查询用户信息
$sql01="select UserID,UserName,Passwd,LevelID from userinfo where Account=".$Account;
$result01 = mysql_fetch_assoc(mysql_query($sql01, $connjxkh));
//查找用户所属部门
$sql04="SELECT d.DeptID,d.DeptName FROM deptinfo d,userinfo u 
		WHERE u.DeptID=d.deptID AND u.Account=".$Account;
	$result04 = mysql_fetch_assoc(mysql_query($sql04, $connjxkh));	
//查询所有部门（除了用户自己的部门）
$sql05="SELECT DeptID,DeptName FROM deptinfo WHERE DeptID !=".$result04['DeptID']." ORDER BY DeptID ASC;";
$result05 = mysql_query($sql05, $connjxkh);
//查询用户职级
$sql02="select LevelName from levelinfo where LevelID=".$result01['LevelID'];
$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));

//查询所有职级（除了用户职级和校领导职级）
$sql03="select LevelID, LevelName from levelinfo where LevelID != 1 and LevelID !=".$result01['LevelID'];
$result03 = mysql_query($sql03, $connjxkh);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改用户信息</title>
<link rel="stylesheet" type="text/css" href="../lib/layui245/css/layui.css"/>
<script src="../lib/layui230/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../lib/jquery-3.2.1.js"></script>
</head>

<body class="layui-body layui-bg-gray" align="center">
<form class="layui-form" action="">

  <div class="layui-form-item">
    <label class="layui-form-label">用户名称</label>
	<div class="layui-input-inline">
    <input type="text" id="UserName" required lay-verify="required" value="<?php echo $result01['UserName'];?>" autocomplete="off" class="layui-input">   
	</div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">用户密码</label>
    <div class="layui-input-inline">
      <input type="text" id="Passwd" required lay-verify="required" value="<?php echo $result01['Passwd'];?>" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">职&ensp;&ensp;&ensp;&ensp;级</label>
    <div class="layui-input-inline">
      <select name="city"  id = "LevelID" lay-verify="required">
        <option value="<?php echo $result01['LevelID']?>"><?php echo $result02['LevelName']?></option>
		<?php 
			while($row01=mysql_fetch_row($result03)){
				echo "<option value='".$row01[0]."'>".$row01[1]."</option>";
			}
		?>
      </select>
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">所在部门</label>
    <div class="layui-input-inline">
      <select name="city"  id = "DeptID" lay-verify="required">
        <option value="<?php echo $result04['DeptID']?>"><?php echo $result04['DeptName']?></option>
		<?php 
			while($row02=mysql_fetch_row($result05)){
				echo "<option value='".$row02[0]."'>".$row02[1]."</option>";
			}
		?>
      </select>
    </div>
  </div>
  <div class="layui-form-item" >
    <div class="layui-input-block">
      <input  class="layui-btn" type="button" onclick="test()" value="更新用户"/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    </div>
  </div>
</form>
 <script>
 function test(){
	 //获取修改后的用户名
	 var UserName = document.getElementById('UserName').value;
	 //获取修改后的用户密码
	 var Passwd = document.getElementById('Passwd').value;
	 //获取修改后的用户职级
	 var LevelID = document.getElementById('LevelID').value;
	 //获取修改后的用户职级
	 var DeptID = document.getElementById('DeptID').value;
	 //获取用户ID
	 var UserID=<?php echo $result01['UserID']?>;
	 // alert(UserID);
	 // alert(UserName);
	 // alert(Passwd);
	 // alert(LevelID);
	 $.ajax({
	      type:"POST",
	      url:"update_user_data.php",
	      data:'UserName='+UserName+'&Passwd='+Passwd+'&UserID='+UserID+'&LevelID='+LevelID+'&DeptID='+DeptID,
	      dataType:"json",
	      success:function(data){
	        if(data.code==200){
	          	alert("保存成功！");
				parent.location.href="view_user.php";
	        }else{
				alert("修改失败！");
	        }
	      },
			error:function(data){alert("修改成功！");parent.location.href="view_user.php";},
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