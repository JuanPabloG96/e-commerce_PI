<?php
// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: /e-commerce/client/views/usuario.php');
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

// Obtener el ID del usuario
$user_id = $_SESSION['user_id'];

// Obtener los datos enviados por el formulario
$username = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Validación básica
$errors = [];
if (empty($username)) {
    $errors[] = "El nombre es obligatorio.";
}
if (empty($email)) {
    $errors[] = "El correo electrónico es obligatorio.";
}
if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "El formato del correo electrónico es incorrecto.";
}
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    exit;
}

// Manejar la subida de la imagen de perfil (si se ha subido una nueva imagen)
$profile_img_url = null;
if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/client/assets/uploads/';
    $file_name = basename($_FILES['profile-pic']['name']);
    $target_file = $upload_dir . $file_name;
    
    // Validar tipos de archivo permitidos
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = array('jpg', 'jpeg', 'png', 'webp');
    
    if (in_array($file_type, $allowed_types)) {
        if (move_uploaded_file($_FILES['profile-pic']['tmp_name'], $target_file)) {
            // Subida exitosa, obtener la URL relativa
            $profile_img_url = '/e-commerce/client/assets/uploads/' . $file_name;
        } else {
            echo "Error al subir la imagen.";
            exit;
        }
    } else {
        echo "Solo se permiten archivos JPG, JPEG, PNG y WEBP.";
        exit;
    }
}

// Construir la consulta de actualización
$query = "UPDATE users SET username = ?, email = ?";
$params = [$username, $email];
$types = 'ss';  // Tipos de parámetros (s = string)

// Si se ha introducido una nueva contraseña, agregarla a la consulta
if (!empty($password)) {
    $query .= ", password = ?";
    $params[] = $hashed_password;
    $types .= 's';
}

// Si se ha subido una nueva imagen, agregarla a la consulta
if ($profile_img_url !== null) {
    $query .= ", profile_img = ?";
    $params[] = $profile_img_url;
    $types .= 's';
}

$query .= " WHERE id = ?";
$params[] = $user_id;
$types .= 'i';  // i = entero (id del usuario)

// Preparar y ejecutar la consulta
$stmt = $conn->prepare($query);
$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    // Redirigir a la página de perfil con un mensaje de éxito
    header('Location: /e-commerce/client/');
} else {
    echo "Error al actualizar el perfil: " . $conn->error;
}

$stmt->close();
$conn->close();

