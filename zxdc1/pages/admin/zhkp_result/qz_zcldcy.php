<?php require_once('../../../Connections/connjxkh.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>群众评本单位中层领导评价意见统计</title> 
<link rel="stylesheet" href="../../../lib/layui245/css/layui.css"  media="all">
<script src="../../../lib/layui245/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>

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
mysql_select_db($database_connjxkh, $connjxkh);
//接收部门名称
  $DeptName = $_GET['DeptName'];
//查询部门ID和部门名称
$sql08="SELECT DeptID,DeptName FROM deptinfo WHERE DeptName LIKE '%".$DeptName."%';";
$result08= mysql_fetch_assoc(mysql_query($sql08, $connjxkh));
$DeptID=$result08['DeptID'];

//查询共有多少位普通职工需要参加考核
$sql01="SELECT COUNT(*) as num FROM userinfo WHERE LevelID=4 and DeptID = $DeptID";
$result01 = mysql_fetch_assoc(mysql_query($sql01, $connjxkh));

//获取表名
$sql02="select RecordCode from voterecord where khtype=1";
$result02 = mysql_fetch_assoc(mysql_query($sql02, $connjxkh));
$tableName01="qz_ldbzkhinfo_".$result02['RecordCode'];
$tableName02="qz_ldcykhinfo_".$result02['RecordCode'];

//查询共有多少位普通职工已经参加考核
$sql03="SELECT COUNT(DISTINCT UserID) AS num FROM $tableName02 WHERE DeptID = $DeptID;";
$result03 = mysql_fetch_assoc(mysql_query($sql03, $connjxkh));


//查询共有多少位中层领导被考核
$sql05="SELECT COUNT(UserID) as num FROM userinfo WHERE (LevelID=2 or LevelID=3) and DeptID = $DeptID";
$result05 = mysql_fetch_assoc(mysql_query($sql05, $connjxkh));
?>
</head>

<body class="layui-main ">
<form class="layui-form" action="outExcel.php" method="post"  id="excelfromtable">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center"><b>群众评本单位中层领导评价意见统计</b></legend>
  <legend align="center"><?php echo $result08['DeptName']?>,
						应有<?php echo $result01['num']?>位普通职工参与评审，
						<?php echo $result05['num']?>位中层领导被评审</legend>
  <legend align="center">当前已有<?php echo $result03['num']?>位普通职工参与评审</legend>
	<h3 align="center">注：分项〔A〕〔B〕〔C〕〔D〕分别评价为好、较好、一般、差的人数；<br>总体评价意见〔A〕〔B〕〔C〕〔D〕分别评价为优秀、称职、基本称职、不称职的人数；</h3>
</fieldset>
	<div class="layui-form">
<table class="layui-table" id="tablelist">
<colgroup>
      <col width="80">
      <?php $i=0;while($i<28){echo "<col width='40'>";$i++;}?>
      <col>
    </colgroup>
	 <thead align="center">
			<td rowspan="3" >姓名</td>
            <td rowspan="2" colspan=4>总体评价</td>
            <td colspan=4>德</td>
            <td colspan=4>能</td>
            <td colspan=4>勤</td>
            <td colspan=4>绩</td>
            <td colspan=4>廉</td>
            <td colspan=4>学</td>
       </tr>
       <tr>
            <td colspan=4>政治态度思想品质</td>
            <td colspan=4>工作思路组织协调业务能力</td>
            <td colspan=4>精神状态努力程度工作作风</td>
            <td colspan=4>履职成效解决复杂问题遵守法律依法办事</td>
            <td colspan=4>廉洁自律履行廉政职责</td>	
            <td colspan=4>参加“两学一做”学习教育</td>
			</tr>
		<tr>
           <?php $i=0;while($i<7){echo "<td>A</td><td>B</td><td>C</td><td>D</td>";$i++;}?>
		</tr>
	</thead>
  <tbody lay-even="" lay-skin="row">
	<?php
mysql_query('SET NAMES UTF8');
$DeptID=25;
//查询该部门被考核的中层领导的姓名
$sql06 = "SELECT DISTINCT q.BPUserID,u.UserName FROM $tableName02 q,userinfo u
WHERE q.BPUserID=u.UserID AND q.DeptID=$DeptID;";
$result06 =mysql_query($sql06, $connjxkh);

 while($row=mysql_fetch_row($result06)){
	$cars=array("ZTPJ","ZZSX","GZNL","GZZF","YFBS","LXYZ","LJZV");	 
	echo "<tr><td>".$row[1]."</td>";
	for($j = 0 ;$j <7 ; $j ++){
		for($i = 0 ;$i <4 ; $i ++){
			//查询各项指标评价的人数
			$sql07="SELECT IFNULL(COUNT(".$cars[0]."),0) AS num FROM qz_ldcykhinfo_472739 
					WHERE ".$cars[0]."='".$i."' AND BPUserID='".$row[0]."' AND DeptID='".$DeptID."';";
			$result07=mysql_fetch_assoc(mysql_query($sql07, $connjxkh));
			echo "<td>".$result07['num']."</td>";
		}
	}echo "</tr>";
}
mysql_close($connjxkh);
?>
  </tbody>
</table>  
	<div class="layui-form-item layui-col-xs-offset6">
		<input class="layui-btn" type="button"  id="export" value="导出表格"/>
	</div>
</div>
  <input name="excelContent" id="excelContent" type="hidden" value="" autocomplete="off"/>
</form>
<script type="text/javascript">    
   $(function(){           
	$('#export').click(function(){    
	var excelContent = $('#tablelist').html(); //获取表格内容        
	$('input[name=excelContent]').val(excelContent);//赋值给表单          
	$('#excelfromtable').submit();//表单提交，提交到php         
		})       
	})    
</script>
<script>
layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});
</script>
</body>
</html>
