

<?php 
header("Content-type: text/html; charset=utf-8");
//print_r($_FILES["upfile"]); 
//判断选择的图片是否为空
if($_FILES["upfile"]["size"]==0){echo "没有文件被上传";}
//判断选择的图片的类型
// switch ($_FILES["upfile"]["type"]){ 
  // case 'image/jpg':$okType=true; 
   // break; 
  // case 'image/jpeg':$okType=true; 
   // break; 
  // case 'image/gif':$okType=true; 
   // break; 
  // case 'image/png':$okType=true; 
   // break; 
   // default: echo "请上传jpg,gif,png等格式的图片！";
 // } 
if(is_uploaded_file($_FILES['upfile']['tmp_name'])){ 
 $upfile=$_FILES["upfile"]; 
//获取数组里面的值 
 $name=$upfile["name"];//上传文件的文件名 
 //$name=iconv("gb2312","UTF-8", $name);
 $type=$upfile["type"];//上传文件的类型 
 $size=$upfile["size"];//上传文件的大小 
 $tmp_name=$upfile["tmp_name"];//上传文件的临时存放路径 
//判断是否为图片 
$okType=false;
 switch ($type){ 
  case 'image/jpg':$okType=true; 
   break; 
  case 'image/jpeg':$okType=true; 
   break; 
  case 'image/gif':$okType=true; 
   break; 
  case 'image/png':$okType=true; 
   break; 
 } 
  
 if($okType){ 
  /** 
   * 0:文件上传成功<br/> 
   * 1：超过了文件大小，在php.ini文件中设置<br/> 
   * 2：超过了文件的大小MAX_FILE_SIZE选项指定的值<br/> 
   * 3：文件只有部分被上传<br/> 
   * 4：没有文件被上传<br/> 
   * 5：上传文件大小为0 
   */
  $error=$upfile["error"];//上传后系统返回的值 
  // echo "================<br/>"; 
  // echo "上传文件名称是：".$name."<br/>"; 
  // echo "上传文件类型是：".$type."<br/>"; 
  // echo "上传文件大小是：".$size."<br/>"; 
  // echo "上传后系统返回的值是：".$error."<br/>"; 
  // echo "上传文件的临时存放路径是：".$tmp_name."<br/>"; 
  $path="../upload/".$name;
//把上传的临时文件移动到upload目录下面(upload是在根目录下已经创建好的！！！) 
  move_uploaded_file($tmp_name, iconv("UTF-8","gb2312", $path)); 
  $destination="../upload/".$name; 
  $path="upload/".$name;
  echo "sdfsdf";
  if($error==4){ 
   echo "没有文件被上传"; 
  }elseif ($error==1){ 
   echo "超过了文件大小，在php.ini文件中设置"; 
  }elseif ($error==2){ 
   echo "超过了文件的大小MAX_FILE_SIZE选项指定的值"; 
  }elseif ($error==3){ 
   echo "文件只有部分被上传"; 
  }elseif ($error==0){ 
   echo "文件上传成功啦！"; 
   include 'saveImage.php';
   echo "<br>图片预览:<br>"; 
   echo "<img src=".$destination.">"; 
  }else{ 
   echo "上传文件大小为0"; 
  } 
 }else{ 
  echo "请上传jpg,gif,png等格式的图片！"; 
 } 
} 
?>
