<?php

$host = 'localhost';
$db   = 'hashers_ecommerce';
$user = 'john';
$pass = 'admin';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Error de conexión (' . $conn->connect_errno . ') '
            . $conn->connect_error);
}
else {
    echo 'Conectado';
}
$conn->set_charset("utf8mb4");