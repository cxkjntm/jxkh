<?php 
	/*for($y=0;$y<21;$y++)
	$t[$y]=$y;
	
	for($x=0;$x<21;$x=$x+7){
		echo "q";
		echo $t[$x];
		echo $x+"&nbsp;";
		echo $x+1+"&nbsp;";
		echo $x+2+"&nbsp;";
		echo $x+3+"&nbsp;";
		echo $x+4+"&nbsp;";
		echo $x+5+"&nbsp;";
		echo $x+6+"&nbsp;";
		echo "<br>";
		}*/
	
	
?>
<html>
<body>
<form>
<table border="1">
<tr>
<td><input type="radio" name="i1" value="0">是</td>
<td><input type="radio" name="i1" value="1">否</td>
</tr>
 
<tr>
<td><input type="radio" name="i2" value="0">是</td>
<td><input type="radio" name="i2" value="1">否</td>
</tr>
 
<tr>
<td><input type="radio" name="i3" value="0">是</td>
<td><input type="radio" name="i3" value="1">否</td>
<td><input type="radio" name="i3" value="2">无</td>
</tr>
</table>
</form>
<input type="button" value="click me" id="btn" />
 <script type="text/javascript" src="../../../lib/jquery-3.2.1.js"></script>
<script>
    document.getElementById('btn').onclick = function(){
        var trs = document.getElementsByTagName('tr'),
        len = trs.length,count = 0;
         
        for(var i = 0; i < len; i++){
            var inputs = document.getElementsByName('i'+(i+1)),ilen= inputs.length;
             
            for(var j = 0; j < ilen; j++){
                if(inputs[j].checked){
                    count++;    
                }    
            }    
        }
         
        if(count == len){
            alert('每项都选了');    
        }else{
            alert('您有未选择的项目')    
        }
    };
</script>
</body>
</html>