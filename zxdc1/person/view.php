<?php require_once('../Connections/connjxkh.php'); //require('../knik.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>职工信息浏览</title> 
<link rel="stylesheet" href="../lib/layui245/css/layui.css"  media="all">
<script src="../lib/layui245/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../lib/jquery-3.2.1.js"></script>

<?php
if (!isset($_SESSION)) {
    session_start();
}

header("Content-type:text/html;charset=utf-8");
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
?>
</head>
<body class="layui-main ">
<form class="layui-form">
<div class="layui-form">
<table class="layui-table" lay-even="" lay-skin="row" id="test" lay-filter="test">
  <colgroup>
    <col width="150">
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>账号</th>
      <th>姓名</th> 
      <th>所属部门</th>
      <th>职级</th>
      <th>修改</th>
      <th>删除</th>
    </tr> 
  </thead>
  <tbody>
    <?php
mysql_query('SET NAMES UTF8');
mysql_select_db($database_connjxkh, $connjxkh);
$sql = "SELECT Account , UserName,DeptName,LevelID UserID from userinformation where DeptID = ".$_SESSION['Admin_DeptID'];
//echo $sql;
$result =mysql_query($sql, $connjxkh);
 while($row=mysql_fetch_row($result)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
  //print_r($row);	
  $ssql = "select LevelName from levelinfo where LevelID = ".$row[3];
	//echo $ssql;
	$result1 =mysql_query($ssql, $connjxkh);
	$rs2=mysql_fetch_array($result1);
  echo "<tr>";
	for ($i = 0;$i<3; $i++ ) {
    echo "<td>".$row[$i]."</td>";
  }
  echo "<td>".$rs2[0]."</td>";
  echo "<td><a class='layui-btn layui-btn-xs' lay-event='edit'>编辑</a></td>";
  echo "<td><a class='layui-btn layui-btn-danger layui-btn-xs' lay-event='del'>删除</a></td>";
}

mysql_close($connjxkh);
?>
  </tbody>
</table>  
<script type="text/javascript">
layui.use(['table', 'layer', 'form'], function(){
 var form = layui.form
            , table = layui.table
            , layer = layui.layer
            , $ = layui.jquery
  //监听行工具事件
  table.on('tool(test)', function(obj){
    var data = obj.data;
    //console.log(obj)
    if(obj.event === 'del'){
      layer.confirm('真的删除行么', function(index){
        			//obj.del();
        			console.log(obj);
        	 		console.log(data);
        			//layer.close(index);
         			$.ajax({
                		url: "delrolemenu.php",
                		type: "POST",
                		data:{'id':data.id},
                		dataType: "json",
               			success: function(data){            
                    		if(data.code==400){
                     			layer.msg("删除失败", {icon: 5});                        
                    		}else{                      
                       			//删除这一行
                        		obj.del();
                       			//关闭弹框
                        		layer.close(index);
                        		layer.msg("删除成功", {icon: 6});
                        		  layer.closeAll();
			                    parent.location.reload();
                        		Load(); //删除完需要加载数据
                   			 }
                		},
                		error:function(){
                			alert("error");
                		},
 
            		});
      			});    } else if(obj.event === 'edit'){
		var ID=data.id;
      layer.open({
        type: 2,
        title: false,
        shade: [0.5],
        title: '修改角色菜单',
        shadeClose: true,
        shade: 0.5,
        skin: 'demo-class',
        maxmin: true, //开启最大化最小化按钮
        area: ['500px', '360px'],
        shift: 2,
        content: 'updaterolemenu.php?ID='+ID //iframe的url
      });
    }
  });
  
  
});

		</script>
</html>
