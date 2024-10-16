<?php
session_start();

include '../config/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Usuario no autenticado']);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $data['product_id']; 

    // Eliminar el producto del carrito
    $sql_delete = "DELETE FROM cart_items WHERE user_id = ? AND product_id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("ii", $user_id, $product_id);

    if ($stmt_delete->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Producto eliminado']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el producto: ' . $stmt_delete->error]);
    }

    // Cerrar la consulta
    $stmt_delete->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Producto no especificado']);
}

$conn->close();
