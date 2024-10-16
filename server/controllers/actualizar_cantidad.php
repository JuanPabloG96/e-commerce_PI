<?php
session_start();

// Conectar a la base de datos
include('../config/db_connection.php');

if (!isset($_SESSION['user_id'])) {
  echo json_encode(['status' => 'error', 'message' => 'Usuario no autenticado']);
  exit();
}

// Obtener y decodificar el cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

// Verificar si se ha enviado un JSON válido
if ($data === null) {
  echo json_encode(['status' => 'error', 'message' => 'Datos inválidos o faltantes en la solicitud']);
  exit();
}

// Verificar si el ID del producto está presente
if (isset($data['id']) && isset($data['quantity'])) {
  $user_id = $_SESSION['user_id'];
  $product_id = $data['id'];
  $quantity = $data['quantity'];

  // Verificar si la cantidad es válida (por ejemplo, un número entero positivo)
  if (!is_numeric($quantity) || $quantity < 1) {
    echo json_encode(['status' => 'error', 'message' => 'Cantidad no válida']);
    exit();
  }

  $sql_update = "UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?";
  $stmt_update = $conn->prepare($sql_update);

  if ($stmt_update === false) {
    echo json_encode(['status' => 'error', 'message' => 'Error en la preparación de la consulta: ' . $conn->error]);
    exit();
  }

  $stmt_update->bind_param("iii", $quantity, $user_id, $product_id);

  if ($stmt_update->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Cantidad actualizada']);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la cantidad: ' . $stmt_update->error]);
  }

  $stmt_update->close();
} else {
  echo json_encode(['status' => 'error', 'message' => 'Producto o cantidad no especificados']);
}

$conn->close();