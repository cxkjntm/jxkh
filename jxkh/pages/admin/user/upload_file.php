<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传用户文件</title>

</head>
<body>
<?php

header("Content-type:text/html;charset=utf-8");

echo $_FILES["file"]["type"];
echo "<br>";
echo $_FILES["file"]["size"];

  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("../upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " 已存在";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $_FILES["file"]["name"]);
      echo "成功保存于: " . "../upload/" . $_FILES["file"]["name"];
      }
    }
  

?>
</body>
</html>
