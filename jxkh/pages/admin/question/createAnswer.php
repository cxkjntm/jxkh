<?php require_once('Connections/connjxkh.php'); ?>
<?php
/**
 * 数据接口 RecordID
 *
 * 实现功能按RecordID创建答案表
 * 点击启动调查按钮调用此功能
 */
if (!isset($_SESSION)) {
    session_start();
}
mysql_select_db($database_connjxkh, $connjxkh);
mysql_query('SET NAMES UTF8');
$_SESSION["RecordID"] = "2";
$sql="";
$sql = "DROP TABLE IF EXISTS " . $_SESSION["RecordID"] . "_answer;";
if(mysql_query($sql, $connjxkh)){
    echo "DROP TABLE SUCCESSFULLY!";
}
else echo "YOU MEET A PROBLEM！";
$sql = "CREATE TABLE " . $_SESSION["RecordID"] . "_answer  (
   question_ID int(11) NOT NULL,
  parent_qid int(11) NOT NULL,
  answer text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  UserID int(11) NOT NULL,
  RecordID int(11) NOT NULL,
  PRIMARY KEY (question_ID, parent_qid, UserID, RecordID) USING BTREE,
  INDEX answer_RecordID_index(RecordID) USING BTREE,
  INDEX answer_UserID_index(UserID) USING BTREE,
  CONSTRAINT ".$_SESSION["RecordID"]."answer_ibfk_1 FOREIGN KEY (RecordID) REFERENCES voterecord (RecordID) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT ".$_SESSION["RecordID"]."answer_question_questionID_fk FOREIGN KEY (question_ID) REFERENCES question (questionID) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;";
echo $sql."<br>";
if(mysql_query($sql, $connjxkh)){
    echo "CREATE TABLE SUCCESSFULLY!";
}
else echo "YOU MEET A PROBLEM！";
mysql_close($connjxkh);
?>


