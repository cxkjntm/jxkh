<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conninfo = "localhost";
$database_conninfo = "information_schema";
$username_conninfo = "root";
$password_conninfo = "123456";
$conninfo = mysql_pconnect($hostname_conninfo, $username_conninfo, $password_conninfo) or trigger_error(mysql_error(),E_USER_ERROR); 
?>