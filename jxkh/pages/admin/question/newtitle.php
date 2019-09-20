<?php require_once('Connections/connjxkh.php'); ?>
<?php
$username = @$_POST['username'];
    $stuno = @$_POST['stuno'];
    $stuname = @$_POST['stuname'];
    $stusex = @$_POST['stusex'];

if (!isset($_SESSION)) {
    session_start();
}
mysql_query('SET NAMES UTF8');
/**存问题后取出questionID和parent_qid*/

/**接收json数组*/
if(isset($_POST['questions'])){
    $questions=json_decode($_POST['questions'],true);
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
/**取RecordID*/
$sql = "SELECT MAX(RecordID) FROM voterecord";
$res = mysql_fetch_array(mysql_query($sql,$connjxkh));
$RecordID = $res["MAX(RecordID)"];
/**取parent_qid*/
$sql = "SELECT MAX(questionID) FROM question where (RecordID =".$RecordID." and type !='T');";
$result = mysql_fetch_array(mysql_query($sql,$connjxkh));
$parent_qid = $result["MAX(questionID)"];
if($parent_qid == null){
    $parent_qid = 0;
}
/**取json数据**/
$json = file_get_contents('1.json');
$questions=json_decode($json, true);
if(is_array($questions)){
foreach($questions as $question){
    $title_array = $question["title"];
    $question_array = $question["question"];
    $type_array = $question["type"];
    if($question["parent_qid"]!=null){
        $parent_qid = "0";
    }
    $sql = "INSERT INTO question(parent_qid, RecordID, type, title, question) VALUES (";
    $sql = $sql . $parent_qid . "," . $RecordID . ",'" . $type_array . "','" . $title_array . "','" . $question_array . "')";
    echo $parent_qid;
    if (mysql_query($sql, $connjxkh)) {
        echo "\ntrue";
    } else echo "\nfalse";
}}
mysql_close($connjxkh);
?>

