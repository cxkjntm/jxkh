<?php 
if (!isset($_SESSION)) {
  session_start();
}
if(!isset($_SESSION['MM_Username'])){
header("location:../index.php");
}
?>