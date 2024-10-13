<?php
// Asigna las variables de entorno a variables PHP
$host = 'localhost';
$db   = 'hashers_ecommerce';
$user = 'john';
$pass = 'admin';

// Conecta a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verifica si hay un error de conexión
if ($conn->connect_error) {
    die('Error de conexión (' . $conn->connect_errno . ') '
            . $conn->connect_error);
}

// Establece el conjunto de caracteres a utf8mb4
$conn->set_charset("utf8mb4");