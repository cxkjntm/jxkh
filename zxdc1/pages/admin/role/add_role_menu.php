<?php require('../logincheck.php');?>
<?php require_once('../../../Connections/connjxkh.php'); ?>
<?php
mysql_query('SET NAMES UTF8');
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO Role_Menu (role_id, menu_id) VALUES (%s, %s)",
                       GetSQLValueString($_POST['Role'], "int"),
                       GetSQLValueString($_POST['Menu'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($insertSQL, $connjxkh) or die(mysql_error());
}

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsRole = "SELECT * FROM LevelInfo WHERE IsBanned = False";
$rsRole = mysql_query($query_rsRole, $connjxkh) or die(mysql_error());
$row_rsRole = mysql_fetch_assoc($rsRole);
$totalRows_rsRole = mysql_num_rows($rsRole);

//mysql_select_db($database_connjxkh, $connjxkh);
$query_rsMenu = "SELECT * FROM MenuInfo WHERE Stats = 1";
$rsMenu = mysql_query($query_rsMenu, $connjxkh) or die(mysql_error());
$row_rsMenu = mysql_fetch_assoc($rsMenu);
$totalRows_rsMenu = mysql_num_rows($rsMenu);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css">
<script src="../../../lib/layui230/layui.js" ></script>	
</head>

<body>
<form id="form1" class="layui-form" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  
   
	<div class="layui-form-item">
		<label class="layui-form-label">选择角色：</label>
		<div class="layui-input-inline">
        <select name="Role" id="Role" >
          <?php
			do {  
				?>
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
		<label class="layui-form-label">选择菜单：</label>
		<div class="layui-input-inline">
			<select name="Menu" id="Menu" >
			  <?php do {?>
				<option value="<?php echo $row_rsMenu['MenuID']?>"><?php echo $row_rsMenu['MenuName']?></option>
			  <?php
				} while ($row_rsMenu = mysql_fetch_assoc($rsMenu));
				  $rows = mysql_num_rows($rsMenu);
				  if($rows > 0) {
					  mysql_data_seek($rsMenu, 0);
					  $row_rsMenu = mysql_fetch_assoc($rsMenu);
				  }
				?>
			</select>
		</div>
	</div>
	
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" name="Submit" id="Submit">添加角色菜单</button>
		</div>
	</div>
		<input type="hidden" name="MM_insert" value="form1" />
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
mysql_free_result($rsRole);

mysql_free_result($rsMenu);
?>
