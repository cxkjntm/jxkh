
//Login.js脚本文件只限用于Login.html页面

//提示框
function LoginMessage(message, successCallback) {
    if ($("#LoginMessageTipsbox").length <= 0) {
        $('body').append('<div id="LoginMessageTipsbox" class="easyui-dialog" style="text-align:center; padding: 10px;width:400px;height:200px;" data-options="closed:true,modal:true"></div>');
    }
    if ($('#LoginMessageTipsbox').text() == message) {
        return false;
    }
    if (!checkValIsUndefinedOrNull(successCallback) && typeof (successCallback) == 'function') {
        $('#LoginMessageTipsbox').text(message);
        $('#LoginMessageTipsbox').dialog({
            closable: false,
            title: '提示',
            buttons: [{
                text: '确定',
                handler: function () {
                    $("#LoginMessageTipsbox").dialog("close");
                    $("#LoginMessageTipsbox").remove();
                    successCallback();
                }
            }]
        });
    } else {
        $('#LoginMessageTipsbox').text(message);
        $('#LoginMessageTipsbox').dialog({
            closable: false,
            title: '提示',
            buttons: [{
                text: '确定',
                handler: function () {;
                    $("#LoginMessageTipsbox").dialog("close");
                    $("#LoginMessageTipsbox").remove();
                }
            }]
        });
    };
    $("#LoginMessageTipsbox").dialog("open").window('center');
};


//刷新首页
(function () {
    var sso = getUrlParam("sso") || "";
    if (!checkValIsUndefinedOrNull(sso)) {
        sso = "&sso=" + sso;
    }
    var cas = getUrlParam("cas") || "";
    if (!checkValIsUndefinedOrNull(cas)) {
        cas = "&cas=" + cas;
    }
    var rdm = getUrlParam("r");
    if (checkValIsUndefinedOrNull(rdm) || !isNumber(rdm)) {
        window.location.href = "Login.html?r=" + (new Date()).getTime() + sso + cas;
    } else {
        var dateBegin = new Date(Number(rdm));
        var dateNow = new Date();
        var dateDiff = dateNow.getTime() - dateBegin.getTime();//时间差的毫秒数
        var dayDiff = Math.floor(dateDiff / (24 * 3600 * 1000));//计算出相差天数
        if (dayDiff >= 1) {
            window.location.href = "Login.html?r=" + dateNow.getTime() + sso + cas;
        }
    }
})();

// 验证码
function load_checkcode() {
    $("#checkcode_img").attr("src", "Handler/LoginHandler.ashx?action=checkcode&" + Math.random());
}



//登录前使用
function school_Init() {
    localStorage.setItem("CO2017_AutoLogin", "");
    localStorage.setItem("CO2017_RsaPublicKey", "");
    var rs = false;
    $.ajax({
        url: "../Handler/LoginHandler.ashx",
        data: { "action": "imgurl" },
        async: false,
        dataType: "json",
        type: "POST",
        success: function (data) {
            $("#wait_main").hide();
            if (data.isSuccess) {
                load_checkcode();
                //学校名称和学校logo显示与否
                if (data.rows[0]["是否显示学校名称"] == 0 || checkValIsUndefinedOrNull(data.rows[0]["学校名称"])) {
                    $("#school_name").hide();
                } else {
                    $("#school_name").show();
                    $("#school_name").text(data.rows[0]["学校名称"]);
                }
                if (!checkValIsUndefinedOrNull(data.rows[0]["是否显示校徽"]) && data.rows[0]["是否显示校徽"] == 0) {
                    $("#school_logo").hide();
                } else {
                    $("#school_logo").show();
                    if (data.rows[0]["图片路径"]) {
                        $("#school_logo").attr("src", data.rows[0]["图片路径"]);
                    } else {
                        $("#school_logo").attr("src", 'Themes/default/images/loginLogo.png');
                    }
                }
                if (data.rows[0]["系统名称"]) {
                    $("#xtmc").text(data.rows[0]["系统名称"]);
                    document.title = data.rows[0]["系统名称"];
                }
                
                localStorage["CO2017_RsaPublicKey"] = data.rows[0]["RsaPublicKey"]; //存储公钥
                $("#login_main").removeAttr("style");

                var casClientUrl = data.rows[0]["CasClientUrl"];
                var casFlag = getUrlParam("cas");
                var sso = getUrlParam("sso");
                if (!checkValIsUndefinedOrNull(casClientUrl) && casFlag != "1" && checkValIsUndefinedOrNull(sso)) {
                    window.location.href = casClientUrl;
                }
                rs = true;
            } else {
                if (data.total == 0) {
                    $("#no_main").show();
                    $("body").attr("style", "background-color:#daeff4;");
                };
            };
        },
        error: function (err) {
            console.log(err);
        }
    });
    return rs;
};

// 登录
function login_click() {
    var sel = $("#role input[name='usertype']:checked").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var checkcode = $("#checkcode").val();
    if (username == "") {
        LoginMessage("请输入用户名！");
        $("#username").focus();
        return;
    };
    if (password == "") {
        LoginMessage("请输入密码！");
        $("#password").focus();
        return;
    };
    if (checkcode == "") {
        LoginMessage("请输入验证码！");
        $("#checkcode").focus();
        return;
    };
    $.cookie("login_usr_role", sel, { expires: 30 });//记录下用户的角色
    var userInfo = {
        userName: username,
        password: password,
        dateTime: (new Date()).getTime(),
        random: getRandom(5)
    };
    //var userInfoStr = rsaEncrypt(userInfo, localStorage["CO2017_RsaPublicKey"]) || "null";
    //if (userInfoStr.length > 0) {
    //    userInfoStr += "," + userInfoStr.length.toString();
    //}
    var userInfoStr = JSON.stringify(userInfo);
    userInfoStr = encodeURIComponent(userInfoStr);
    $.ajax({
        url: "../Handler/LoginHandler.ashx",
        data: { "action": "login", "userInfo": userInfoStr, "yzm": checkcode, "js": sel },
        dataType: "json",
        type: "POST",
        beforeSend: function () {
            $("#login").val("登录中...");
            $("#login").prop("disabled", "disabled");
        },
        success: function (data) {
            if (data.isSuccess) {
                if (data.errorCode == 980) {
                    window.location = "PhoneBinding.html?r=" + (+new Date());
                } else {
                    switch (sel) {
                        case "1":
                        case "2":
                        case "3":
                            window.location = "Role.html?r=" + (new Date()).getTime();
                            break;
                    };
                }
            } else {
                LoginMessage(data.message, function () {
                    $("#checkcode").val("");
                });
            };
        },
        error: function (err) {
            console.log(err);
        },
        complete: function () {
            $("#login").val("登录");
            $("#login").prop("disabled", false);
            load_checkcode();
        }
    });
}
