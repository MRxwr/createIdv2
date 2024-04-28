<?php
$servername = "localhost";
$username = "u671249433_createidv2User";
$password = "u671249433_createidv2Db";
$dbname = "N@b$90949089";
$dbconnect = new MySQLi($servername,$username,$password,$dbname);
if ( $dbconnect->connect_error ){
die("Connection Failed: " .$dbconnect->connect_error );
}
$sql = "SET CHARACTER SET utf8mb4";
$dbconnect->query($sql);
?>
 