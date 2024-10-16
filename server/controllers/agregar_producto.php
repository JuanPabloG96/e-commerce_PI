<?php
session_start();
require '../config/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /path/to/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// Verificar si el producto ya está en el carrito
$sql_check_product = "SELECT quantity FROM cart_items WHERE user_id = ? AND product_id = ?";
$stmt_check_product = $conn->prepare($sql_check_product);
$stmt_check_product->bind_param("ii", $user_id, $product_id);

if ($stmt_check_product->execute()) {
    $result_check = $stmt_check_product->get_result();

    if ($result_check->num_rows > 0) {
        // Producto ya en el carrito, actualiza la cantidad
        $row = $result_check->fetch_assoc();
        $new_quantity = $row['quantity'] + 1;

        // Actualizar cantidad
        $sql_update = "UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("iii", $new_quantity, $user_id, $product_id);
        $stmt_update->execute();
        $stmt_update->close();
    } else {
        // Insertar nuevo producto en el carrito
        $sql_insert = "INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $quantity = 1; // Cantidad inicial
        $stmt_insert->bind_param("iii", $user_id, $product_id, $quantity);
        $stmt_insert->execute();

        // Solo cerrar si se inicializó correctamente
        if (isset($stmt_insert)) {
            $stmt_insert->close();
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error al verificar el producto en el carrito']);
}

// Cerrar declaración de verificación del producto
if (isset($stmt_check_product)) {
    $stmt_check_product->close();
}

$conn->close();
