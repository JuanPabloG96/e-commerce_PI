<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: /e-commerce/client/views/usuario.php');
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_SESSION['user_id'];
  $card_name = $_POST['card-name'];
  $card_number = $_POST['card-number'];
  $expiration_date = $_POST['expiration-date'];

  $check_stmt = $conn->prepare('SELECT id FROM payment_methods WHERE user_id = ?');
  $check_stmt->bind_param('i', $user_id);
  $check_stmt->execute();
  $check_result = $check_stmt->get_result();

  if ($check_result->num_rows > 0) {
    $update_stmt = $conn->prepare('UPDATE payment_methods SET card_name = ?, card_number = ?, expiration_date = ? WHERE user_id = ?');
    $update_stmt->bind_param('sssi', $card_name, $card_number, $expiration_date, $user_id);
    $update_stmt->execute();

    if ($update_stmt->affected_rows > 0) {
      $_SESSION['success'] = 'Metodo de pago se actualizo correctamente';
      json_encode(['success' => true, 'message' => 'Metodo de pago se actualizo correctamente']);
      header('Location: /e-commerce/client/views/pagos.php');
    } else {
      $_SESSION['error'] = 'No se pudo actualizar el metodo de pago';
      json_encode(['success' => false, 'message' => 'No se pudo actualizar el metodo de pago']);
      header('Location: /e-commerce/client/views/editar_pago.php');
    }
  }
  else {
    $insert_stmt = $conn->prepare('INSERT INTO payment_methods (user_id, card_name, card_number, expiration_date) VALUES (?, ?, ?, ?)');
    $insert_stmt->bind_param('isss', $user_id, $card_name, $card_number, $expiration_date);
    $insert_stmt->execute();

    if ($insert_stmt->affected_rows > 0) {
      $_SESSION['success'] = 'Metodo de pago se agrego correctamente';
      json_encode(['success' => true, 'message' => 'Metodo de pago se agrego correctamente']);
      header('Location: /e-commerce/client/views/pagos.php');
    } else {
      $_SESSION['error'] = 'No se pudo agregar el metodo de pago';
      json_encode(['success' => false, 'message' => 'No se pudo agregar el metodo de pago']);
    }
  }

  $conn->close();
}