<?php

require '../config/conexion.php';

$action = $_GET['action'] ?? '';

switch ($action) {
  case 'register':
      include 'controllers/registrar_usuario.php';
      break;
  case 'login':
      include 'controllers/iniciar_sesion.php';
      break;
  case 'edit_profile':
      include 'controllers/editar_usuario.php';
      break;
  default:
      header('Location: /e-commerce/client/');
      break;
}