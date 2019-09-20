<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择部门</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script src="../../../js/lib/echarts.js"></script>
<script type="text/javascript" src="../../../js/lib/macarons.js"></script>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../../lib/layui245/layui.js"></script>
<?php

if (!isset($_SESSION)) {
  session_start();
}

$voteissue=''; 
if (isset($_POST['voteissue'])) {
  $voteissue = $_POST['voteissue'];
}
$_SESSION["MM_VoteIssue"]=$voteissue ;
//echo $_SESSION["MM_VoteIssue"];
?>
</head>
<body>

<div >

  <div class="layui-row">   
    <div class="layui-col-md8 ">
      <form class="layui-form layui-form-pane"  method="post" action="">      
        <div class="layui-form-item">
          <label class="layui-form-label">部门</label>
          <div class="layui-input-block">
            <select name="dept" id="dept"   lay-verify="required" lay-filter="dept">
              <option value="0">请选择部门</option>
            </select>
          </div>
          
        </div>
		 <div class="layui-form-item">
          <label class="layui-form-label">调查项目</label>
          <div class="layui-input-block">
            <select name="voteitem" id="voteitem"   lay-verify="required" lay-filter="voteissue">
              <option value="0">请选择调查项目</option>
            </select>
          </div>
          
        </div>
       
        <div class="layui-form-item">
          <div class="layui-input-block">            
            <div class="layui-block"> 
        <a href="javascript:void(0);" class="layui-btn" onclick="cx()"><i class="layui-icon"></i>查询</a> 
     </div>

          </div>
          
        </div>
      </form>
    </div>
   
  
  <div class="layui-row ">
		<div class="layui-col-md4">
			<div id="pie1" style="width: 500px;height:400px;"></div>		
		</div>
		
		<div class="layui-col-md4">		
			<div id="pie2" style="width: 500px;height:400px;"></div>
		</div>  
  </div>
</div>



<script>

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
	getQuestion();

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
    
	
	function getQuestion(){
	
		$.getJSON("getquestion.php?RecordID="+<?php echo $_SESSION["MM_VoteIssue"]; ?>, function (data) {
           
            var optionStr = "";
			
            $.each(data, function (infoIndex, info) {                
                optionStr += '<option value="' + info["questionID"] + '">' + info["question"] + '</option>';
				
                //alert(optionStr);
            });
            $form.find('select[name=voteitem]').append(optionStr);
            form.render();   
			form.on('select(voteitem)', function (data) {
                //optionStr="";
                var value = data.value;
                alert(value);
            });        
        });
	
	
	}   

 form.render();
});

</script>

<script>

function cx(){

	var deptid=$("#dept").val();
	//alert(deptid);
	var voteitem=$("#voteitem").val();
	//alert(voteitem);
	
	
	var myChart1 = echarts.init(document.getElementById('pie1'), 'macarons');
	var myChart2 = echarts.init(document.getElementById('pie2'), 'macarons');
	var arr=[], arr1=[], arr2=[];
    function arrTest(){
        $.ajax({
              type:"post",
              async:false,
              url:"getitem.php",
              data:"deptid="+deptid+"&voteitemid="+voteitem,
              dataType:"json",
              success:function(result){
                   if (result) {
                      for (var i = 0; i < result.length; i++) {
                          arr.push(result[i]);
						  arr1.push(result[i].value);
                          arr2.push(result[i].name);
                      }
                    }
                  }
                })
        return arr,arr2;
              }
    arrTest();	
	
   option = {
    title : {
        text: '中层干部任职问卷调查',
        subtext: '测试用例',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient : 'vertical',
        x : 'left',
        data:arr2
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {
                show: true, 
                type: ['pie', 'funnel'],
                option: {
                    funnel: {
                        x: '25%',
                        width: '50%',
                        funnelAlign: 'left',
                        max: 1548
                    }
                }
            },
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    series : [
        {
            name:'访问来源',
            type:'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:arr
        }
    ]
};


    myChart1.setOption(option);
	
	var  option1 = {
			  title : {
        text: '条形图',
        subtext: '展示结果'
    },
                    tooltip: {
                        show: true
                    },
                    legend: {
                       data:arr2
                    },
					toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    grid: {y: 70, y2:30, x2:20},
                    xAxis : [
                        {
                            type : 'category',
                            data : arr2
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
							axisLabel:{formatter:'{value} 人'}
                        }
                    ],
                    series : [
                        {
                            "name":"value",
							name:'投票数量',
                            "type":"bar",
							
                            "data":arr1
                        }
                    ]
                };
                // 为echarts对象加载数据
                myChart2.setOption(option1);
}

</script>

</body>
</html>