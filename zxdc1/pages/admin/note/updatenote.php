<?php require_once('../../../Connections/connjxkh.php'); ?>
<link rel="stylesheet" type="text/css" href="../../../lib/layer/theme/default/layer.css"/>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../../lib/layer/layer.js"></script>
<?php
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
  $updateSQL = sprintf("UPDATE NoteInfo SET NoteTitle=%s, NoteContent=%s, NotePublisher=%s, ReleasedTime=%s WHERE NoteID=%s",
                       GetSQLValueString($_POST['NoteTitle'], "text"),
                       GetSQLValueString($_POST['NoteContent'], "text"),
                       GetSQLValueString($_POST['NotePublisher'], "text"),
                       GetSQLValueString($_POST['ReleasedTime'], "text"),
                       GetSQLValueString($_POST['NoteID'], "int"));

  mysql_select_db($database_connjxkh, $connjxkh);
  $Result1 = mysql_query($updateSQL, $connjxkh) or die(mysql_error());
    if($Result1)
	  echo "<script type='text/javascript'>layer.msg('修改成功！');
			function jump(){parent.location.href='noteinfo.php';}
			setTimeout(jump,700);
			</script>";
}

$colname_rsNote = "1";
if (isset($_GET['NoteID'])) {
  $colname_rsNote = $_GET['NoteID'];
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsNote = sprintf("SELECT * FROM NoteInfo WHERE NoteID = %s", GetSQLValueString($colname_rsNote, "int"));
$rsNote = mysql_query($query_rsNote, $connjxkh) or die(mysql_error());
$row_rsNote = mysql_fetch_assoc($rsNote);
$totalRows_rsNote = mysql_num_rows($rsNote);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script type="text/javascript" src="../../../lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">标题</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="NoteTitle" value="<?php echo htmlentities($row_rsNote['NoteTitle'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>
<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">内容</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
          <textarea name="NoteContent" id="NoteContent"  rows="10" cols="80">
                <?php echo htmlentities($row_rsNote['NoteContent'], ENT_COMPAT, 'utf-8'); ?>
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'NoteContent' );
				
            </script>            		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>
<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">发布人</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
         <input type="text" name="NotePublisher" value="<?php echo htmlentities($row_rsNote['NotePublisher'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>
<div class="layui-row "> 
 <div class="layui-col-md4">
 	<div class="layui-form-item">
       <span class="layui-bg-gray">
       <label class="layui-form-label layui-card ">用户名称</label>
       </span>
       <div class="layui-input-block">
         <span class="layui-bg-gray">
           <input type="text" name="ReleasedTime" value="<?php echo htmlentities($row_rsNote['ReleasedTime'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="layui-input" >         		       
         </span></div>                  
  	</div> 
 </div>
 <div class="layui-col-md6"><span class="layui-bg-gray">&nbsp;</span></div>
 
</div>
<div class="layui-row">
<div class="layui-col-md3"><span class="layui-bg-gray">&nbsp;</span></div>
 <div class="layui-col-md3">
 	<div class="layui-form-item">
       <div class="layui-input-block">
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
  <input type="hidden" name="NoteID" value="<?php echo $row_rsNote['NoteID']; ?>" />
  </span></div> 
</form>

</body>
</html>
<?php
mysql_free_result($rsNote);
?>
