<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="student_portal";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$con){

    die("Failed to connect");
}