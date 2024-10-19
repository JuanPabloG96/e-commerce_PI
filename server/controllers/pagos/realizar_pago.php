<?php
// mostrar posibles errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// verificar si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: /e-commerce/client/views/login.php');
  exit();
}

// conectar con la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

// verificar si los datos de envió y dirección están presentes para el usuario en sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_SESSION['user_id'];
  $payment_method = $_POST['payment_method'];
  $payment_status = $_POST['payment_status'];
  $card_number = $_POST['card_number'];
  $expiration_date = $_POST['expiration_date'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $postal_code = $_POST['postal_code'];

  // insertar los datos en la tabla de pagos
  $insert_query = "INSERT INTO payments (user_id, payment_method, payment_status, card_number, expiration_date, country, state, city, address, postal_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($insert_query);
  $stmt->bind_param("isssssssss", $user_id, $payment_method, $payment_status, $card_number, $expiration_date, $country, $state, $city, $address, $postal_code);
  $stmt->execute();
  $stmt->close();
}

// verificar si hay datos en las tablas shipping_address y payment_method
if (empty($_POST['payment_method']) || empty($_POST['payment_status'])) {
  header('Location: /e-commerce/client/views/pagos.php');
  exit();
}


