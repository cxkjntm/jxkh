<?php require_once('include/config.php'); ?>
<?php //清除浏览器缓存
header("Cache-control:no-cache,no-store,must-revalidate"); 
header("Pragma:no-cache"); 
header("Expires:0"); 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="ie=edge,Chrome=1">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate, no-store">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<title><?php  echo iconv("GB2312","UTF-8",$zzmc.$xtmc); ?></title>
<link rel="stylesheet" type="text/css" href="css/Login.css"/>
<script type="text/javascript" src="lib/common.js"></script>
<script type="text/javascript" src="lib/JSEncrypt.js"></script>
<script type="text/javascript" src="lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="lib/jquery.cookie.js"></script>
<link rel="stylesheet" type="text/css" href="lib/layui245/css/layui.css"/>
<script type="text/javascript" src="lib/layui245/layui.js"></script>
<style>
#code{  
                font-family:Arial;  
                font-style:italic;  
                font-weight:bold;  
                border:0;  
                letter-spacing:2px;  
                color:#0000fff;  
            }
.a {
		background-image:url(images/timg1.png);
		background-size:100% 100%;
		background-repeat:no-repeat;
		} 
</style>
</head>

<body class="layui-main" >
 <div id="ie_versions" style="text-align:center;background-color:orange;display:none;">
        <h3>您的ie浏览器版本过低，请进行升级。</h3>
    </div>
    <div id="login_main">
        <div class="loginBox a">
            <div class="loginTop ">
                <p class="login-college">
                    <img id="school_logo" class="banner-school-img" src="images/hncj.png" alt="">
					<span id="school_name" style=""><?php echo iconv("GB2312","UTF-8",$zzmc);?></span>
                    
                </p>
                <p class="login-paper" id="xtmc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo iconv("GB2312","UTF-8",$xtmc);?></p>
            </div>
            <!--中间部分-->
            <div class="brief clearfix">
                <!--通知-->
                <div id="divNotice" class="bulletin-board clearfix">
                <div id="divnotice38" class="singleton">
                <h2>通知<a href="noteinfo.php" target="_blank">More&gt;&gt;</a></h2>
                <table border="0" class="layui-hide " id="test" lay-filter="test" ></table>


                </div>
                </div>
                <!--登陆窗口-->
                <div class="PasswordBox">
                    <ul class="switcher clearfix">
                        <li class="active">账号密码登录</li>                        
                    </ul>
                    <div class="longinBox">
                    <form>
                        <ul class="write switch" style="display: block;" id="write">
                            <!--<li class="title">账号密码登录</li>-->
                            <div ><label id="formtip" class="alert-info"></label></div>
                            <li><i class="usericon"></i><input id="username" class="user" type="text" autofocus="" placeholder="请输入用户名(工号)"></li>
                            <li><i class="pswdicon"></i><input id="password" class="pswd" type="password" placeholder="输入密码"></li>
                            <li id="role">
                                &nbsp;&nbsp;&nbsp;账号类型：
                                <input type="radio" id="rdoAdmin" name="usertype" value="1">&nbsp;<label for="rdoAdmin">管理员</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="rdoTea" name="usertype" checked="checked" value="2">&nbsp;<label for="rdoTea">职工</label>&nbsp;&nbsp;&nbsp;
                            </li>
                            <li>
                                <i class="verifiericon"></i>
                                <input id="checkcode" class="verifier" type="text" placeholder="请输入验证码">
                                <span class="space">
                                <input type = "button" id="code" onclick="createCode()"/>   </span>
                            </li>
                            <li class="clearfix">
                                <input id="login" class="btn" onclick="login_click();" type="button" value="登录">
                                
                            </li>
                            <li class="bottomTips clearfix" style="margin-top: 0;">
                                <div class="bottomTips_left">
                                          <p class="phone"><i></i>电话邮箱</p>										 
                                </div>
                                <div class="bottomTips_right">
                                    <p class="phone"><i></i>0375-2089030</p>
                                    <p class="email"><i></i>1147843397@qq.com</p>                                    
                                </div>
                            </li>
                        </ul>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--尾部-->
        <div style=" border-top: 1px solid #bac4cd; background-color: #f4f4f4;">
            <div class="footer clearfix">                
                <div class="logtext-box">
                    <p><span> <h3>© 2019 <?php echo iconv("GB2312","UTF-8",$zzmc.$ywbm);?>  技术支持由<?php echo iconv("GB2312","UTF-8",$jszc);?>提供</h3> </span></p>					
                    
              </div>
            </div>
        </div>
    </div>
    <script type="text/html" id="notetitleTpl">
  <a  class="articlelist clearfix" href="viewnote.php?noteid={{d.NoteID}}" title="{{d.NoteContent}}" class="layui-table-link" target="_blank">{{ d.NoteTitle }}</a>
</script>
   <script>
    $(function(){
            if(window.location.href.indexOf("/login") > -1) {
                //防止页面后退
                   history.pushState(null, null, document.URL);
                   window.addEventListener('popstate', function () {
                        history.pushState(null, null, document.URL);
                    });
            }
    });
</script>
    <script>
	window.onpageshow = function(event) {
　　if (event.persisted) {
　　　　window.location.reload();
　		}
	};
	  window.onload = function (){
        createCode();
    }
	var code;
    function createCode(){
        //首先默认code为空字符串
        code = '';
        //设置长度，这里看需求，我这里设置了4
        var codeLength = 4;
        var codeV = document.getElementById('code');
        //设置随机字符
        var random = new Array(0,1,2,3,4,5,6,7,8,9);
        //循环codeLength 我设置的4就是循环4次
        for(var i = 0; i < codeLength; i++){
            //设置随机数范围,这设置为0 ~ 10
             var index = Math.floor(Math.random()*10);
             //字符串拼接 将每次随机的字符 进行拼接
             code += random[index]; 
        }
        //将拼接好的字符串赋值给展示的Value
        codeV.value = code;
    }

        $(function () {
            if (IEVersion() == 7 || IEVersion() == 6) {
                LoginMessage('您的ie浏览器版本过低，请升级您的浏览器');
                document.getElementById("ie_versions").style.display = "block";
            };
            if ($.cookie("login_usr_role")) {
                $("input[name='usertype']").eq($.cookie("login_usr_role") - 1).prop("checked", true);
                $("input[name='usertype']").eq($.cookie("login_usr_role") - 1).prop("checked", true);
            };
            document.getElementById("nowyear").innerHTML = new Date().getFullYear();
          

        });

        function login_click(){
			var user = new Object();
			user.loginCode = $.trim($("#username").val());
			user.password = $.trim($("#password").val());
			user.checkcode=$.trim($("#checkcode").val());
			user.usertype=$.trim($("input[name=usertype]:checked").val());
			//alert(user.usertype);
			var srand=$.trim($("#code").val());
			//alert("yanzhengma is : "+srand);

			//前台的非空验证
			if(user.loginCode == "" || user.loginCode == null){
				$("#username").focus;
				$("#formtip").css("color","red");
				$("#formtip").html("对不起，登录账号不能为空。");
			}else if(user.password == "" || user.password == null){
				$("#password").focus;
				$("#formtip").css("color","red");
				$("#formtip").html("对不起，登录密码不能为空。");
			}else if(user.checkcode== "" || user.checkcode== null){
				$("#checkcode").focus;
				$("#formtip").css("color","red");
				$("#formtip").html("对不起，验证码不能为空。");
		}

		else{
				$("#formtip").html("");
				//如果账号和密码都不为空，就进行 ajax 异步提交
				$.ajax({
				type:'POST',  //提交方法是POST
				url:'login.php', //请求的路径
				data:"username="+user.loginCode+"&password="+user.password+"&checkcode="+user.checkcode+"&usertype="+user.usertype+"&srand="+srand, //以JSON字符串形式把 user 传到后台
				dataType:'json', //后台返回的数据类型是html文本
				timeout:1000,  //请求超时时间，毫秒
				store:false, 	//清除浏览器缓存
				error:function(){  //请求失败的回调方法
					$("#formtip").css("color","red");
					$("#formtip").html("登录失败！请重试。");
				},
				success:function(data){   //请求成功的回调方法
					//alert(data.result);
					var result=data.result;
                    var role = data.role;
					if(result == "loginmore"){
						//session非空,注销session 
						$("#formtip").css("color","red");
						$("#formtip").html("重复登陆，正在注销！");
						setTimeout(function(){ window.location.href='logout.php'; }, 1000);
					}
					else if(role == 2 &&result != "" && result == "success"){
						//若登录成功，跳转到"/main.html"
						window.location.href='menutest2.php';
					}else if(role == 1 &&result != "" && result == "success"){
                        window.location.href='AdminMenu.php';
                    }
                    else if(result == "failed"){
						$("#formtip").css("color","red");
						$("#formtip").html("验证码错误！请重试。");
						//$("#username").val('');
						//$("#password").val('');
						$("#checkcode").val('');
					}else if(result == "nologincode"){
						$("#formtip").css("color","red");
						$("#formtip").html("登录账号不存在！请重试。");
					}else if(result == "pwderror"){
						$("#formtip").css("color","red");
						$("#formtip").html("登录密码错误！请重试。");
					}else if("nodata" == result){
						$("#formtip").css("color","red");
						$("#formtip").html("对不起，没有任何数据需要处理！请重试。");
					}
				}
			});
		}
			
			}
     
       
        //判断ie7以下
        function IEVersion() {
            var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
            var isIE = userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1; //判断是否IE<11浏览器
            var isEdge = userAgent.indexOf("Edge") > -1 && !isIE; //判断是否IE的Edge浏览器
            var isIE11 = userAgent.indexOf('Trident') > -1 && userAgent.indexOf("rv:11.0") > -1;
            if (isIE) {
                var reIE = new RegExp("MSIE (\\d+\\.\\d+);");
                reIE.test(userAgent);
                var fIEVersion = parseFloat(RegExp["$1"]);
                if (fIEVersion == 7) {
                    return 7;
                } else if (fIEVersion == 8) {
                    return 8;
                } else if (fIEVersion == 9) {
                    return 9;
                } else if (fIEVersion == 10) {
                    return 10;
                } else {
                    return 6;//IE版本<=7
                };
            } else if (isEdge) {
                return 'edge';//edge
            } else if (isIE11) {
                return 11; //IE11
            } else {
                return -1;//不是ie浏览器
            };
        };

    </script>
    
<script>
layui.use(['table', 'layer', 'form'], function(){
   var form = layui.form
            , table = layui.table
            , layer = layui.layer
            , $ = layui.jquery

  
  //第一个实例
   var tableIns =table.render({
    elem: '#test'
	,skin: 'nob'
	,even: true	
    ,height: 475
	,cellMinWidth: 80
    ,url: 'notedata.php' //数据接口
    ,page: false
	
    ,cols: [[ //表头
     
       {field: 'NoteID',  width:50, sort: true, fixed: 'left',hide:true}
      ,{field: 'NoteTitle',  width:550, templet: '#notetitleTpl',align: 'left'}       
	  ,{field: 'ReleasedTime',  width:180,align: 'center'}   	  
	       
    ]],
	done: function (res, curr, count) {
		$('.layui-table .layui-table-cell > span').css({'font-weight': 'bold'});//表头字体样式
		/*$('th').css({'background-color': '#5792c6', 'color': '#fff','font-weight':'bold'}) 表头的样式 */
		$('th').hide();//表头隐藏的样式
		$('.layui-table-page').css('margin-top','40px');//页码部分的高度调整
}

  });
  
  
});
</script>  
 
</body>
</html>