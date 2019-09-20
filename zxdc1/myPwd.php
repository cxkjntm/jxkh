<?php require_once('Connections/connjxkh.php'); ?>
<?php

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
	$colname_rsUser1 = 'admin888';
	if(isset($_SESSION['MM_Username']))
	  $colname_rsUser1=$_SESSION['MM_Username'];
	mysql_query('SET NAMES UTF8');  
	mysql_select_db($database_connjxkh, $connjxkh);
	$query_rsUser = sprintf("SELECT userinfo.Account, userinfo.UserID, userinfo.UserName, userinfo.Photo, deptinfo.DeptName, levelinfo.LevelName FROM deptinfo, levelinfo, userinfo WHERE userinfo.DeptID=deptinfo.DeptID AND levelinfo.LevelID=userinfo.LevelID and  Account = %s ", GetSQLValueString($colname_rsUser1, "text"));
	$rsUser = mysql_query($query_rsUser, $connjxkh) or die(mysql_error());	
	$row_rsUser= mysql_fetch_assoc($rsUser);
?>

<!DOCTYPE html>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<meta http-equiv="Expires" content="0">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<title>河南城建学院干部考核系统--个人信息</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ry-framwork.css" rel="stylesheet">
<link href="css/ry-center.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/personal-base.css">
<link rel="stylesheet" type="text/css" href="css/modify-pwd.css">
<script src="lib/jquery-3.2.1.js"></script>
<!--[if lt IE 9]>
  <script src="/js/lib/html5shiv.min.js"></script>
  <script src="/js/lib/respond.min.js"></script>
<![endif]-->
</head>
<body>
 
    <div id="body" >
		<div class="container content row-offcanvas row-offcanvas-right">
			<div class="col-sm-2 " style="height:100%;margin-left: -15px;background-color: #f5f5f5;">
	
		
	
	</div>
			<div class="col-sm-10 " style="margin-left: 15px;">
				
				

	<div id="myInfo" class="row row-offcanvas-left mt20">
		<div>
			<h3>修改密码   </h3>  
		</div>	
        
		<form  class="form-horizontal ry-form" action="" method="post">
		<div class="row modify_context">
				<div class="form-group">
					<div class="col-sm-3">旧密码：<input id="username" name="username" type="hidden" value="<?php echo $row_rsUser["Account"]?>"></div>
					<div class="col-sm-4"><input  onBlur="inviteCdBlur();"type="password" value="" class="form-control" name="inviteCd" id="inviteCd" placeholder="请输入原密码" ></div>
					<div class="col-sm-4">
						<span id="inviteCdmsg" class="msg-box" for="inviteCd"></span>
					</div>
				</div>
		
				<div class="form-group">
					<div class="col-sm-3">新密码：</div>
					<div class="col-sm-4"><input onBlur="userPasswordBlur();" type="password" value="" class="form-control" name="userPassword"  id="userPassword" placeholder="请输入新密码" ></div>
					<div class="col-sm-4">
						<!-- <span class="input_hit hit_show msg-box" for="userPassword">建议您使用数字、字母、符号的组合，最少6位</span> -->
						<!-- <span class="msg-box" for="userPassword">为确保密码不会被轻易破解，建议您使用数字、字母、符号的组合密码</span> -->
						<span id="userPasswordmsg" class="msg-box" for="userPassword">建议您使用数字、字母、符号的组合，最少6位</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">确认密码：</div>
					<div class="col-sm-4"><input onBlur="userRPasswordBlur();" type="password" value="" class="form-control" name="userRPassword"  id="userRPassword" placeholder="请再次输入新密码" ></div>
					<div class="col-sm-4">
						<span id="userRPasswordmsg" class="msg-box" for="userRPassword"></span>
					</div>
				</div>
		</div>
		<div class="row modify_context">
			<div class="col-xs-3" style="text-align: right;"></div>
			<div class="col-xs-8"><input name="save" type="button" onClick="saveNewPwd();" value="保存新密码"></div>
		</div>
	</form>
	

			</div>
	    </div>
	</div>
	

<script>
	var current=0;
	function inviteCdBlur(){
	
	 	var password=$("#inviteCd").val();
		var username=$("#username").val();
		 if(password.length==0){
			 $("#inviteCdmsg").html("初始密码不能为空");
			 $("#inviteCdmsg").attr("style","color:red;");			 
			 }
		 else{
			 
			 $.ajax({
      			url:'checkpwd.php',
      			type:'post',
     			dataType:'json',
      			data:"username="+username+"&password="+password,
      			success:function(data){
		  		var str = "ok";
		  		if(data.code==200){
					str = "初始密码输入正确";	
					$("#inviteCdmsg").html(str);
	        	 	$("#inviteCdmsg").attr("style","color:green;");	
					current=1;
					}
		       		
		  		else {
					str = "初始密码输入错误！";
					$("#inviteCdmsg").html(str);
	        	 	$("#inviteCdmsg").attr("style","color:red;");
					current=0;
					
				}
			  		
       			
    }
  });
			 
			 }	 
	 	
	}
	
	function userPasswordBlur(){
	
	 	var userpassword=$("#userPassword").val();
		 if(userpassword.length==0){
			 $("#userPasswordmsg").html("新密码不能为空");
	 		$("#userPasswordmsg").attr("style","color:red;");
			 }
		 else{
		 	$("#userPasswordmsg").html("");
		 }
	 	
	}
	
	function userRPasswordBlur(){
	
	 	var userrpassword=$("#userRPassword").val();
		var userpassword=$("#userPassword").val();
		 if(userrpassword.length==0){
			 $("#userRPasswordmsg").html("确认密码不能为空");
			$("#userRPasswordmsg").attr("style","color:red;");
			 }
			 
		  else{
			  if(userpassword!=userrpassword){
				   $("#userRPasswordmsg").html("确认密码与新密码不匹配");
		  		$("#userRPasswordmsg").attr("style","color:red;");
				  
				  }
		}	  	
		
	}
	//测试
	function saveNewPwd(){
	var password=$("#inviteCd").val();
	//alert('旧密码：'+password);
	var userPassword=$("#userPassword").val();
	//alert('新密码：'+userPassword);
	var userRPassword=$("#userRPassword").val();
	//alert('新密码2：'+userRPassword);
	var username=$("#username").val();
	//alert(username);
	
	if(userPassword==userRPassword&&current==1){
		$.ajax({
      			url:'savenewpwd.php',
      			type:'post',
     			dataType:'json',
      			data:"username="+username+"&password="+userPassword,
      			success:function(data){
		  			var str = "ok";
		  			if(data.code==200)
		       			//从最外层页面跳转（跳出iframe）
						top.location.href='logout.php';
		  			else 
			  			str = "密码保存失败！";
       				$("#inviteCdmsg").html(str);
	        	 	$("#inviteCdmsg").attr("style","color:red;");	
			    }
  		});
	}
	}
	
	//save new password
	
	function savenewpwd(){
		var username=$("#username").val();
		//alert(username);
		var userpassword=$("#userPassword").val();
		//alert(userpassword);
		$.ajax({
      			url:'savenewpwd.php',
      			type:'post',
     			dataType:'json',
      			data:"username="+username+"&password="+userpassword,
      			success:function(data){
		  			var str = "ok";
		  			if(data.code==200)
		       			str = "密码保存成功";	
		  			else 
			  			str = "密码保存失败！";
       				$("#inviteCdmsg").html(str);
	        	 	$("#inviteCdmsg").attr("style","color:red;");	
			    }
  		});
		
	}
	
	
	
</script>
</body>
</html>