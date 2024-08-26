<?php

$servername ="localhost";
$username ="root";
$password ="";
$database ="Ecommerence";

$con = mysqli_connect($servername, $username, $password, $database);

if(!$con){
    die("Sorry connection failed". mysqli_connect_error() );
    
}

?>