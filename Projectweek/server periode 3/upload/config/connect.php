<?php
$dbuser = 'u200514_project3';
$dbname = 'u200514_project3';
$dbpass = 'gt1uWKGR';
$conn = new mysqli('localhost',$dbuser,$dbpass,$dbname);
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}