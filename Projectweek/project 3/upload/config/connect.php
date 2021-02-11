<?php
$dbuser = 'root';
$dbname = 'project 3';
$dbpass = '';
$conn = new mysqli('localhost',$dbuser,$dbpass,$dbname);
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}