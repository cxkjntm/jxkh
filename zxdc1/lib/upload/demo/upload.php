<?php
if (isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
	$upload_file = $_FILES['Filedata'];
	$file_info   = pathinfo($upload_file['name']);
	$file_type   = $file_info['extension'];
	$save        = 'upload/' . md5(uniqid($_FILES["Filedata"]['name'])) . '.' . $file_info['extension'];
	$name        = $_FILES['Filedata']['tmp_name'];
	
	if (!move_uploaded_file($name, $save)) {
		exit;
	}
	
	//�����������������Թ��鿴
	$fileName = 'test.txt';
	$postData = var_export($file_info, true);
	$file     = fopen('' . $fileName, "w");
	fwrite($file,$postData);
	fclose($file);
}