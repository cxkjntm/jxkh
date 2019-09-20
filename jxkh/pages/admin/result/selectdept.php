<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择部门</title>
<link rel="stylesheet" type="text/css" href="../../../lib/layui245/css/layui.css"/>
<script src="../../../js/lib/echarts.js"></script>
<script src="../../../js/lib/macarons.js"></script>
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

<div class="layui-main">

  <div class="layui-row layui-col-lg-offset2">
    <div class="layui-col-md2"></div>
    <div class="layui-col-md8 ayui-col-space1">
      <form class="layui-form layui-form-pane"  method="post" action="viewresult.php">      
        <div class="layui-form-item">
          <label class="layui-form-label">部门</label>
          <div class="layui-input-inline">
            <select name="dept" id="dept"   lay-verify="required" lay-filter="dept">
              <option value="0">请选择部门</option>
            </select>
          </div>
          
        </div>
		 <div class="layui-form-item">
          <label class="layui-form-label">调查项目</label>
          <div class="layui-input-inline">
            <select name="voteitem" id="voteitem"   lay-verify="required" lay-filter="voteissue">
              <option value="0">请选择调查项目</option>
            </select>
          </div>
          
        </div>
       
        <div class="layui-form-item">
          <div class="layui-input-inline">            
            <div class="layui-inline"> 
        <a href="javascript:void(0);" class="layui-btn" onclick="cx()"><i class="layui-icon"></i>查询</a>
 
     </div>

          </div>
          
        </div>
      </form>
    </div>
    <div class="layui-col-md2"></div>
  </div>

</div>

<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:400px"></div>

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


<script type="text/javascript">
function cx(){

	var deptid=$("#dept").val();
	//alert(deptid);
	var voteitem=$("#voteitem").val();
	//alert(voteitem);
              var  myChart = echarts.init(document.getElementById('main'), 'macarons');
              var arr1=[],arr2=[];
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
                          arr1.push(result[i].number);
                          arr2.push(result[i].voteitem);
                      }
                    }
                  }
                })
                return arr1,arr2;
              }
              arrTest();
              var  option = {
			  title : {
        text: '条形图',
        subtext: '展示结果'
    },
                    tooltip: {
                        show: true
                    },
                    legend: {
                       data:['voteitem']
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
                            "voteitem":"number",
							name:'投票数量',
                            "type":"bar",
							
                            "data":arr1
                        }
                    ]
                };
                // 为echarts对象加载数据
                myChart.setOption(option);
            // }
			}
    </script>	

</body>
</html>