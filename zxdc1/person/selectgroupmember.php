<?php require_once('../Connections/connjxkh.php'); ?>
<?php
mysql_query('SET NAMES UTF8');
if (!isset($_SESSION)) {
  session_start();
}
$colname_rsuser = "-1";
if (isset($_SESSION['Admin_DeptID'])) {
  $colname_rsuser = (get_magic_quotes_gpc()) ? $_SESSION['Admin_DeptID'] : addslashes($_SESSION['Admin_DeptID']);
}
mysql_select_db($database_connjxkh, $connjxkh);
$query_rsuser = sprintf("SELECT UserID, Account, UserName FROM userinfo WHERE DeptID = %s and IsDB=0", $colname_rsuser);
$rsuser = mysql_query($query_rsuser, $connjxkh) or die(mysql_error());
$row_rsuser = mysql_fetch_assoc($rsuser);
$totalRows_rsuser = mysql_num_rows($rsuser);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择9人考核修成员</title>
 <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/prettify.css" />
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../lib/layer/theme/default/layer.css">
</head>

<body>
<div class="row">
	<div class="col-xs-1">
	&nbsp;&nbsp;
	</div>
				<div class="col-xs-3">
					<select name="from" id="undo_redo" class="js-multiselect form-control " size="13" multiple="multiple">
					  <?php
do {  
?>
					  <option value="<?php echo $row_rsuser['UserID']?>"><?php echo $row_rsuser['UserName']?></option>
					  <?php
} while ($row_rsuser = mysql_fetch_assoc($rsuser));
  $rows = mysql_num_rows($rsuser);
  if($rows > 0) {
      mysql_data_seek($rsuser, 0);
	  $row_rsuser = mysql_fetch_assoc($rsuser);
  }
?>
				  </select>
				</div>
				
				<div class="col-xs-2">
					<button type="button" id="undo_redo_undo" class="btn btn-primary btn-block">撤销选择</button>
					<button type="button" id="undo_redo_rightAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-forward"></i></button>
					<button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
					<button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
					<button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-backward"></i></button>
					<button type="button" id="undo_redo_redo" class="btn btn-warning btn-block">恢复选择</button>
					<button type="button" id="confirmdo" onClick="test();"  class="btn btn-success btn-block">确定</button>
				</div>
				
				<div class="col-xs-3">
				  <select name="to" id="undo_redo_to" class="form-control" size="13" multiple="multiple"></select>
				</div>
</div>
</div>

<script type="text/javascript" src="../js/lib/jquery.min.js"></script>
<script type="text/javascript" src="../js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/lib/prettify.min.js"></script>
<script type="text/javascript" src="../js/lib/multiselect.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $('.js-multiselect').multiselect({
        right: '#js_multiselect_to_1',
        rightAll: '#js_right_All_1',
        rightSelected: '#js_right_Selected_1',
        leftSelected: '#js_left_Selected_1',
        leftAll: '#js_left_All_1'
    });
});

function test(){
	 //获取用户名
	 var userids = $("#undo_redo_to").val();
	 var length=$("#undo_redo_to").get(0).options.length;
	 alert("选择人数为"+length);
	 //alert(userids);
	 $.ajax({
	      type:"POST",
	      url:"save_member.php",
	      data:'userids='+userids,
	      dataType:"json",
	      success:function(data){			
	        if(data.code==200){
				alert("保存成功！");
				window.location.href="view_member.php";				
	        }
			else{
				alert("保存失败！");
	        }
	      },
		  error:function(data){
			  alert("更改用户信息失败！");
		   	//window.location.href="view_user.php";
		  },
	    });
}
</script>


</body>
</html>
<?php
mysql_free_result($rsuser);
?>
