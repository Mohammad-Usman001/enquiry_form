<?php
$host ="localhost";
$user ="root";
$password ="";
$db ="enquiry";

$conn= new mysqli($host, $user, $password, $db);

if ($conn->connect_error){
    die("connection failed" .$conn->connect_error);
}else{
    echo " ";
}
?>