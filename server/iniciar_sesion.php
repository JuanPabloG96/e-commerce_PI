<?php

session_start(); // Inicia la sesión

// Importar el archivo de conexión a la base de datos
require 'db_connection.php';

// Verifica si se recibió la solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el correo y la contraseña del formulario
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Verifica que no estén vacíos
    if (empty($email) || empty($password)) {
        echo json_encode(['error' => 'Por favor, complete todos los campos.']);
        exit;
    }

    // Consulta a la base de datos para verificar el usuario
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $email); // 's' indica que es una cadena
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica si el usuario existe
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifica la contraseña
        if (password_verify($password, $user['password'])) {
            // Inicia sesión y almacena información del usuario
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            
            // Redirecciona al usuario a la página de inicio
            header('Location: /client/src/views/usuario_activo.php'); 
            exit;
        } else {
            echo json_encode(['error' => 'Correo o contraseña incorrectos.']);
        }
    } else {
        echo json_encode(['error' => 'Correo o contraseña incorrectos.']);
    }

    $stmt->close();
}

$conn->close();
?>
