<?php
$connection = mysql_connect('localhost', 'chingkwa_data', 'database123');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('chingkwa_database');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
?>