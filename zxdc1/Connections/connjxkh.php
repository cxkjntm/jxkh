<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connjxkh = "localhost";
$database_connjxkh = "jxkh";
$username_connjxkh = "root";
$password_connjxkh = "123456";
$connjxkh = mysql_pconnect($hostname_connjxkh, $username_connjxkh, $password_connjxkh) or trigger_error(mysql_error(),E_USER_ERROR); 
?>