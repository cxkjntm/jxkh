var $form;
var form;
var $;
//var areaData="";
layui.use(['form', 'jquery'], function(){
    $ = layui.jquery;
    var layer = layui.layer;

    form = layui.form;
    $form = $('form');
    getDepts();

    //get Depts
    function getDepts() {
        $.getJSON("getdept.php", function (data) {
           
            var optionStr = "";
            $.each(data, function (infoIndex, info) {                
                optionStr += '<option value="' + info["DeptID"] + '">' + info["DeptName"] + '</option>';
                //alert(optionStr);
            });
            $form.find('select[name=dept]').append(optionStr);
            form.render();   
			form.on('select(dept)', function (data) {
                //optionStr="";
                var value = data.value;
                //alert(value);
            });        
        });
    }
    

    //添加验证规则
    form.verify({
		account: function (value) {
            if (value.length !=8) {
                return '工号由8位数字组成，如30080101';
            }
        },       
        username: function (value) {
            if (value.length < 2) {
                return '用户名称不能少于2个字符';
            }
        }        
    });


   
    
    form.on('submit(demo1)', function (data) {
        layer.alert(JSON.stringify(data.field), {
            title: '用户信息'
        })
        return true;
    });

 form.render();
});/**
 * Created by lenovo on 2018/1/30.
 */
