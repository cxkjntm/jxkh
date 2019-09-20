<?php require_once('Connections/connjxkh.php'); ?>
<?php
/**
 * 数据接口 $_POST['answers']  $_SESSION["RecordID"]  $_SESSION["UserID"]
 * 实现功能 将答案存入RecordID_answer 表
 * 点击提交答卷后调用此功能
 * 注意：文本域提交的答案需要传递问题的questionID和parent_qid ！
 * 存在问题  RecordID_answer 表 parent_qid 应该作为外键，但是创建这个外键不成功，需要修改！
 */
if (!isset($_SESSION)) {
    session_start();
}
mysql_query('SET NAMES UTF8');
/**存问题后取出questionID和parent_qid*/

/**接收json数组*/
if(isset($_POST['answers'])){
    $json=json_decode($_POST['answers'],true);
}
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
$_SESSION["RecordID"] = "2";
$_SESSION["UserID"] = "922";
/**取json数据**/
$json = file_get_contents('3.json');
$answers=json_decode($json, true);
print_r($answers);
if(is_array($answers)){
    foreach($answers as $answer){
        $question_ID = $answer["question_ID"];
        $parent_qid = $answer["parent_qid"];
        $answer_description = $answer["answer"];
        $sql = "";
        $sql .= "INSERT INTO ".$_SESSION["RecordID"]."_answer(question_ID,parent_qid,answer,UserID,RecordID) 
        VALUES(".$question_ID.",".$parent_qid.",'".$answer_description."',".$_SESSION["UserID"].",".$_SESSION["RecordID"].");";
        echo $sql."<br>";
        if($answer["question_ID"]==null){
            echo "你还没有登陆，数据传输失败";
        }
        else{

        }
        if (mysql_query($sql, $connjxkh)) {
            echo "\ntrue";
        } else echo "\nfalse";
    }}
mysql_close($connjxkh);
?>

