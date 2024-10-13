<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'gestao_escolar'; 


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>

