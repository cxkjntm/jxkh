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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE UserInfo SET UserName=%s, Passwd=%s, Photo=%s, DeptID=%s, Rank=%s, IsEvaluated=%s, IsPj=%s WHERE UserID=%s",
                       GetSQLValueString($_POST['UserName'], "text"),
                       GetSQLValueString($_POST['Passwd'], "text"),
                       GetSQLValueString($_POST['Photo'], "text"),
                       GetSQLValueString($_POST['DeptID'], "int"),                       
                       GetSQLValueString($_POST['UserID'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());
  
  echo "<script type=text/javascript>alert('更新用户信息成功');</script>";
 

  
  
  $updateGoTo = "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
	  echo "<script type=text/javascript>window.close()</script>";
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsUser = "-1";
if (isset($_GET['UserID'])) {
  $colname_rsUser = $_GET['UserID'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsUser = sprintf("SELECT * FROM UserInfo WHERE UserID = %s", GetSQLValueString($colname_rsUser, "int"));
$rsUser = mysql_query($query_rsUser, $connjxkh) or die(mysql_error());
$row_rsUser = mysql_fetch_assoc($rsUser);
$totalRows_rsUser = mysql_num_rows($rsUser);
$DeptID=$row_rsUser['DeptID'];
$LevelID=$row_rsUser['LevelID'];

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsRank = "SELECT * FROM LevelInfo";
$rsRank = mysql_query($query_rsRank, $connjxkh) or die(mysql_error());
$row_rsRank = mysql_fetch_assoc($rsRank);
$totalRows_rsRank = mysql_num_rows($rsRank);

mysql_select_db($database_connjxkh, $connjxkh);
$query_rsDept = "SELECT * FROM DeptInfo";
$rsDept = mysql_query($query_rsDept, $connjxkh) or die(mysql_error());
$row_rsDept = mysql_fetch_assoc($rsDept);
$totalRows_rsDept = mysql_num_rows($rsDept);

$colname_rsUserDept = "-1";
if (isset($DeptID)) {
  $colname_rsUserDept = $DeptID;
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsUserDept = sprintf("SELECT * FROM DeptInfo WHERE DeptID = %s", GetSQLValueString($colname_rsUserDept, "int"));
$rsUserDept = mysql_query($query_rsUserDept, $connjxkh) or die(mysql_error());
$row_rsUserDept = mysql_fetch_assoc($rsUserDept);
$totalRows_rsUserDept = mysql_num_rows($rsUserDept);

$colname_rsUserRank = "-1";
if (isset($LevelID)) {
  $colname_rsUserRank = $LevelID;
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsUserRank = sprintf("SELECT * FROM LevelInfo WHERE LevelID = %s", GetSQLValueString($colname_rsUserRank, "int"));
$rsUserRank = mysql_query($query_rsUserRank, $connjxkh) or die(mysql_error());
$row_rsUserRank = mysql_fetch_assoc($rsUserRank);
$totalRows_rsUserRank = mysql_num_rows($rsUserRank);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改用户信息</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
</head>

<body class="layui-body layui-bg-gray">
<form  action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">用户名称</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="UserName" value="<?php echo htmlentities($row_rsUser['UserName'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>
<div class="layui-row">
<div class="layui-col-md1"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md4"><div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card">登录密码</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="Passwd" value="<?php echo htmlentities($row_rsUser['Passwd'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >        
        </span></div>                  
   </div>
 	
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
  
</div>
<div class="layui-row">
<div class="layui-col-md1"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card">个人照片</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="Photo" value="<?php echo htmlentities($row_rsUser['Photo'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >        
        </span></div>                  
   </div>
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
  
</div>
<div class="layui-row">
<div class="layui-col-md1"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md3">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card">服务部门</label>
       </span>
       <div class="layui-input-block layui-select">
         <span class="layui-bg-gray">
           <select name="DeptID" id="DeptID">
             <option value="<?php echo $row_rsUserDept['DeptID']?>"><?php echo $row_rsUserDept['DeptName']?></option>
             <?php
do {  
?>
             <option value="<?php echo $row_rsDept['DeptID']?>"><?php echo $row_rsDept['DeptName']?></option>
             <?php
} while ($row_rsDept = mysql_fetch_assoc($rsDept));
  $rows = mysql_num_rows($rsDept);
  if($rows > 0) {
      mysql_data_seek($rsDept, 0);
	  $row_rsDept = mysql_fetch_assoc($rsDept);
  }
?>
           </select>        
        </span></div>                  
   </div>
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
  
</div>
<div class="layui-row">
<div class="layui-col-md1"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md3"> 
 <div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card">个人职级</label>
       </span>
       <div class="layui-input-block layui-select">
         <span class="layui-bg-gray">
           <select name="Rank" id="Rank">
             <option value="<?php echo $row_rsUserRank['LevelID']?>"><?php echo $row_rsUserRank['LevelName']?></option>
             <?php
do {  
?>
             <option value="<?php echo $row_rsRank['LevelID']?>"><?php echo $row_rsRank['LevelName']?></option>
             <?php
} while ($row_rsRank = mysql_fetch_assoc($rsRank));
  $rows = mysql_num_rows($rsRank);
  if($rows > 0) {
      mysql_data_seek($rsRank, 0);
	  $row_rsRank = mysql_fetch_assoc($rsRank);
  }
?>
           </select>        
        </span></div>                  
   </div>
 	
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>


<div class="layui-row">
<div class="layui-col-md3"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <div class="layui-input-inline">
            <span class="layui-bg-gray">
            <input type="submit" value="更新记录"  class="layui-btn layui-btn-fluid" />
        </span></div>                 
   </div>
 </div>
 <div class="layui-col-md5"><span class="layui-bg-gray">&nbsp;</span></div>
  
</div> 
<div>
   <span class="layui-bg-gray">
   <input type="hidden" name="MM_update" value="form1" />
   <input type="hidden" name="UserID" value="<?php echo $row_rsUser['UserID']; ?>" />
  </span></div> 
</form>
</body>
</html>
<?php
mysql_free_result($rsUser);

mysql_free_result($rsRank);

mysql_free_result($rsDept);

mysql_free_result($rsUserDept);

mysql_free_result($rsUserRank);
?>
