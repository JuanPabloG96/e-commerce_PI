<?php
$host = '192.168.1.100';
$db   = 'hashers_ecommerce';
$user = 'john';
$pass = 'admin';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Error de conexión (' . $conn->connect_errno . ') '
            . $conn->connect_error);
}

$conn->set_charset("utf8mb4");