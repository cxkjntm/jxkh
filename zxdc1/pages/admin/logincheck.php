<?php 
if (!isset($_SESSION)) {
  session_start();
}
if(!isset($_SESSION['MM_Supername'])){
header("location:../login.php");
}
?>