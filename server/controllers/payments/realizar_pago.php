<?php
// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
header('Content-Type: application/json');

include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "Usuario no autenticado"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['total_amount'])) {
    $user_id = $_SESSION['user_id'];
    $total = (float)$data['total_amount'];

    // Verificar si hay un método de pago registrado
    $check_payment_query = "SELECT id FROM payment_methods WHERE user_id = ?";
    $stmt = $conn->prepare($check_payment_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $payment_result = $stmt->get_result();

    // Verificar si hay una dirección de envío registrada
    $check_shipping_query = "SELECT id FROM shipping_addresses WHERE user_id = ?";
    $stmt = $conn->prepare($check_shipping_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $shipping_result = $stmt->get_result();

    if ($payment_result->num_rows > 0 && $shipping_result->num_rows > 0) {
        // Insertar el pedido en la tabla orders
        $insert_query = "INSERT INTO orders (user_id, total_amount) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("id", $user_id, $total);
        
        if ($stmt->execute()) {
            // Borrar los artículos del carrito
            $delete_cart_query = "DELETE FROM cart_items WHERE user_id = ?";
            $stmt = $conn->prepare($delete_cart_query);
            $stmt->bind_param("i", $user_id);
            $delete_success = $stmt->execute();

            if ($delete_success) {
                echo json_encode(["success" => true, "message" => "Pedido creado con éxito y carrito vacío"]);
            } else {
                echo json_encode(["success" => true, "message" => "Pedido creado con éxito, pero no se pudo vaciar el carrito"]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Error al crear el pedido"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Faltan datos de pago o envío"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Solicitud inválida"]);
}

$conn->close();
