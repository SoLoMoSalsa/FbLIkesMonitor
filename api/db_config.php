<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'fblikesmonitor';
$connect = new mysqli($host, $username, $password, $database) or die("Error " . mysqli_error($connect));
?>