<?php
// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: /e-commerce/client/views/usuario.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_SESSION['user_id'];
  $address = $_POST['address'];
  $postal_code = $_POST['postal-code'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];

  $check_stmt = $conn->prepare('SELECT id FROM shipping_addresses WHERE user_id = ?');
  $check_stmt->bind_param('i', $user_id);
  $check_stmt->execute();
  $check_result = $check_stmt->get_result();

  if ($check_result->num_rows > 0) {
    $update_stmt = $conn->prepare('UPDATE shipping_addresses SET address = ?, postal_code = ?, city = ?, country = ? WHERE user_id = ?');
    $update_stmt->bind_param('ssssi', $address, $postal_code, $city, $country, $user_id);
    $update_stmt->execute();

    if ($update_stmt->affected_rows > 0) {
      $_SESSION['success'] = 'La dirección se actualizo correctamente';
      echo json_encode(['success' => true, 'message' => 'La dirección se actualizo correctamente']);
      header('Location: /e-commerce/client/views/pagos.php');
    } else {
      $_SESSION['error'] = 'No se pudo actualizar la dirección';
      echo json_encode(['success' => false, 'message' => 'No se pudo actualizar la dirección']);
      header('Location: /e-commerce/client/views/editar_direccion.php');
    }
  } else {
    $insert_stmt = $conn->prepare('INSERT INTO shipping_addresses (user_id, address, postal_code, city, state, country) VALUES (?, ?, ?, ?, ?, ?)');
    $insert_stmt->bind_param('isssss', $user_id, $address, $postal_code, $city, $state, $country);
    $insert_stmt->execute();

    if ($insert_stmt->affected_rows > 0) {
      $_SESSION['success'] = 'La dirección se agrego correctamente';
      echo json_encode(['success' => true, 'message' => 'La dirección se agrego correctamente']);
      header('Location: /e-commerce/client/views/pagos.php');
    } else {
      $_SESSION['error'] = 'No se pudo agregar la dirección';
      echo json_encode(['success' => false, 'message' => 'No se pudo agregar la dirección']);
    }
  }

  $conn->close();
}

