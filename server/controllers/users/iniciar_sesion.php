<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Importar el archivo de conexión a la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

// Verifica si se recibió la solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Verifica que no estén vacíos
    if (empty($email) || empty($password)) {
        header('Location: /client/src/views/usuario.php');
    }

    // Consulta a la base de datos para verificar el usuario
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica si el usuario existe
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            
            header('Location: /e-commerce/client/'); 
            exit;
        } else {
            $_SESSION['error_message'] = 'Usuario o contraseña incorrectos.';
            header('Location: /e-commerce/client/views/usuario.php');
        }
    } else {
        header('Location: /e-commerce/client/views/usuario.php');
    }

    $stmt->close();
}

$conn->close();
?>
