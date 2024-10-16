<?php

// mostar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require '../config/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /path/to/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id']; 
$quantity = 1; 

// Verificar si el carrito ya tiene productos del usuario actual
$sql_check_cart = "SELECT * FROM cart_items WHERE user_id = ?";
$stmt_check = $conn->prepare($sql_check_cart);
$stmt_check->bind_param("i", $user_id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    // Verificar si hay un producto existente en el carrito
    $sql_check_product = "SELECT quantity FROM cart_items WHERE user_id = ? AND product_id = ?";
    $stmt_check_product = $conn->prepare($sql_check_product);
    $stmt_check_product->bind_param("ii", $user_id, $product_id);
    $stmt_check_product->execute();
    $result_product = $stmt_check_product->get_result();

    if ($result_product->num_rows > 0) {
        // El producto ya existe, actualizar la cantidad
        $row = $result_product->fetch_assoc();
        $new_quantity = $row['quantity'] + $quantity;

        $sql_update_quantity = "UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt_update = $conn->prepare($sql_update_quantity);
        $stmt_update->bind_param("iii", $new_quantity, $user_id, $product_id);
        $stmt_update->execute();
    } else {
        // El producto no existe, agregarlo al carrito
        $sql_insert = "INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iii", $user_id, $product_id, $quantity);
        $stmt_insert->execute();
    }
} else {
    // El carrito está vacío para este usuario, agregar el producto
    $sql_insert = "INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iii", $user_id, $product_id, $quantity);
    $stmt_insert->execute();
}

// Cerrar conexiones
$stmt_check->close();
$stmt_check_product->close();
$stmt_insert->close();
$conn->close();
?>
