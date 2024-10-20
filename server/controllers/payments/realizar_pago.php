<?php
// Mostrar posibles errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si el usuario ha iniciado sesión
session_start();

// Establecer el tipo de contenido a JSON
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "Usuario no autenticado"]);
    exit();
}

// Conectar con la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $total = $_POST['total'];

    $check_payment_query = "SELECT id FROM payment_methods WHERE user_id = ?";
    $stmt = $conn->prepare($check_payment_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $payment_result = $stmt->get_result();

    $check_shipping_query = "SELECT id FROM shipping_addresses WHERE user_id = ?";
    $stmt = $conn->prepare($check_shipping_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $shipping_result = $stmt->get_result();

    if ($payment_result->num_rows > 0 && $shipping_result->num_rows > 0) {
        $insert_query = "INSERT INTO orders (user_id, total) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("id", $user_id, $total);
        $stmt->execute();
        $stmt->close();

        echo json_encode(["success" => true, "message" => "Pedido creado con éxito"]);
    } else {
        echo json_encode(["success" => false, "message" => "Faltan datos de pago o envío"]);
    }

    $conn->close();
    exit();
} 
