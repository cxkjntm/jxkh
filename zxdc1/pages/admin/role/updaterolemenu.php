<?php require_once('../../../Connections/connjxkh.php'); ?>
<link rel="stylesheet" type="text/css" href="../../../lib/layer/theme/default/layer.css"/>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../../lib/layer/layer.js"></script>
<?php
mysql_query('SET NAMES UTF8');

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE role_menu SET role_id=%s, menu_id=%s, status=%s WHERE id=%s",
                       GetSQLValueString($_POST['role_id'], "int"),
                       GetSQLValueString($_POST['menu_id'], "int"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['id'], "int"));
//echo $updateSQL;
  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());

  // $updateGoTo = "rolemenu.php";
  // if (isset($_SERVER['QUERY_STRING'])) {
    // $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    // $updateGoTo .= $_SERVER['QUERY_STRING'];
  // }
  // header(sprintf("Location: %s", $updateGoTo));
  if($Result1)
	  echo "<script type='text/javascript'>layer.msg('菜单修改成功！');
			function jump(){parent.location.href='rolemenu.php';}
			setTimeout(jump,700);</script>";
}

$colname_rsRoleMenu = "-1";
if (isset($_GET['ID'])) {
  $colname_rsRoleMenu = (get_magic_quotes_gpc()) ? $_GET['ID'] : addslashes($_GET['ID']);
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsRoleMenu = sprintf("SELECT menuinfo.MenuName, menuinfo.Menu_URL, menuinfo.Pare_Menu_ID, menuinfo.MenuMid, levelinfo.LevelName, role_menu.id, role_menu.role_id,role_menu.menu_id,role_menu.status FROM role_menu, menuinfo, levelinfo WHERE role_menu.status = 0 AND levelinfo.LevelID=role_menu.role_id AND menuinfo.MenuID=role_menu.menu_id AND role_menu.`id`= %s", $colname_rsRoleMenu);
$rsRoleMenu = mysql_query($query_rsRoleMenu, $connjxkh) or die(mysql_error());
$row_rsRoleMenu = mysql_fetch_assoc($rsRoleMenu);
$totalRows_rsRoleMenu = mysql_num_rows($rsRoleMenu);

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsRole = "SELECT * FROM levelinfo";
$rsRole = mysql_query($query_rsRole, $connjxkh) or die(mysql_error());
$row_rsRole = mysql_fetch_assoc($rsRole);
$totalRows_rsRole = mysql_num_rows($rsRole);

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsMenu = "SELECT * FROM menuinfo";
$rsMenu = mysql_query($query_rsMenu, $connjxkh) or die(mysql_error());
$row_rsMenu = mysql_fetch_assoc($rsMenu);
$totalRows_rsMenu = mysql_num_rows($rsMenu);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css">
<script src="../../../lib/layui230/layui.js" ></script>	
<title>修改角色菜单</title>
</head>

<body>
<form  method="post" name="form1" class="layui-form" action="<?php echo $editFormAction; ?>">

	<div class="layui-form-item">
		<label class="layui-form-label">角色ID：</label>
		<div class="layui-input-inline">
			<select name="role_id" id="role_id">
             <option value="<?php echo $row_rsRoleMenu['role_id']?>"><?php echo $row_rsRoleMenu['LevelName'];?></option>
             <?php do { ?>
             <option value="<?php echo $row_rsRole['LevelID']?>"><?php echo $row_rsRole['LevelName']?></option>
             <?php
				} while ($row_rsRole = mysql_fetch_assoc($rsRole));
				  $rows = mysql_num_rows($rsRole);
				  if($rows > 0) {
					  mysql_data_seek($rsRole, 0);
					  $row_rsRole = mysql_fetch_assoc($rsRole);
				  }
			?>
			</select>   
		</div>
	</div>
		   
	<div class="layui-form-item">
		<label class="layui-form-label">菜单ID：</label>
		<div class="layui-input-inline">
		<select name="menu_id" id="menu_id" lay-verify="required">
             <option value="<?php echo $row_rsRoleMenu['menu_id']?>"><?php echo $row_rsRoleMenu['MenuName'];?></option>
             <?php do {  ?>
             <option value="<?php echo $row_rsMenu['MenuID']?>"><?php echo $row_rsMenu['MenuName']?></option>
             <?php
				} while ($row_rsMenu = mysql_fetch_assoc($rsMenu));
				  $rows = mysql_num_rows($rsMenu);
				  if($rows > 0) {
					  mysql_data_seek($rsMenu, 0);
					  $row_rsRole = mysql_fetch_assoc($rsMenu);
				  }
			?>
        </select>  	  
		</div>
	</div>
	
    <div class="layui-form-item">
		<label class="layui-form-label">状态：</label>
		<div class="layui-input-inline">
			<input type="text" name="status" class="layui-input" value="<?php echo $row_rsRoleMenu['status']; ?>" size="32"></td>
		</div>
	</div>
	  
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" name="Submit" >更新记录</button>
		</div>
	</div>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id" value="<?php echo $row_rsRoleMenu['id']; ?>">
</form>
</body>
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
<?php
mysql_free_result($rsRoleMenu);

mysql_free_result($rsRole);

mysql_free_result($rsMenu);
?>
