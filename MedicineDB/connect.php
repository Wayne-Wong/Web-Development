<?php
$connection = mysql_connect('localhost', 'waynewon_admin', 'mrchinkxD93');
if (!$connection){
    die("Error connecting to database" . mysql_error());
}
$select_db = mysql_select_db('waynewon_medicine');
if (!$select_db){
    die("Error selecting database" . mysql_error());
}
?>