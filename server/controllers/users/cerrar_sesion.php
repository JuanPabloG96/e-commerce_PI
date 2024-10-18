<?php
// Inicia la sesión
session_start();

// Verifica si hay una sesión activa
if (isset($_SESSION['user_id'])) {
    // Destruye todas las variables de sesión
    session_unset();
    
    // Destruye la sesión
    session_destroy();

    // Respuesta exitosa
    http_response_code(200);
    echo json_encode(['message' => 'Sesión cerrada exitosamente']);
    header('Location: /e-commerce/client/');
} else {
    // Si no hay sesión activa, devolver un error
    http_response_code(400);
    echo json_encode(['message' => 'No hay sesión activa']);
}
?>
