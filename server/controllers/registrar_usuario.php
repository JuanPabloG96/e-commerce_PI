<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); 

include '../config/conexion.php';

// Verificar si los datos fueron enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['register-email']);
    $password = mysqli_real_escape_string($conn, $_POST['register-password']);

    $emailCheckQuery = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($emailCheckQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $_SESSION['error'] = "Este correo electrónico ya está registrado.";
      header("Location: /e-commerce/client/src/views/usuario.php");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertar los datos en la base de datos
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_name'] = $username;

        header("Location: /e-commerce/client/");
        exit;
    } else {
        // Error en el registro
        echo "Error al registrar el usuario. Intenta nuevamente.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>
