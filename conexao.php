<?php

$name = "movielovers";
$host = "localhost";
$user = "root";
$pass = "";


//habilitando erros
$conn = new PDO("mysql:dbname=" . $name . ";host=" . $host, $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);