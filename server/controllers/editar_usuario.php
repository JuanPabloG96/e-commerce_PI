<?php
session_start();

// Incluir la conexión a la base de datos
include '../config/conexion.php';

$user_id = $_SESSION['user_id'];
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;
$avatar = $_FILES['avatar'];

// Verificar si se ha subido una imagen
if (!empty($avatar['name'])) {
    $avatar_path = '/e-commerce/uploads/' . basename($avatar['name']);
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . $avatar_path;

    // Verificar si el archivo es una imagen válida y moverlo al directorio
    if (move_uploaded_file($avatar['tmp_name'], $upload_dir)) {
        // Actualizar la ruta de la imagen en la base de datos
        $sql_avatar = "UPDATE users SET avatar='$avatar_path' WHERE id='$user_id'";
        mysqli_query($conn, $sql_avatar);
        
        // Actualizar la imagen en la sesión
        $_SESSION['avatar'] = $avatar_path;
    } else {
        echo "Error al subir la imagen.";
    }
}

// Actualizar los otros datos del usuario (nombre, email, y contraseña si fue proporcionada)
$sql = "UPDATE users SET nombre='$nombre', email='$email'";
if ($password) {
    $sql .= ", password='$password'";
}
$sql .= " WHERE id='$user_id'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['nombre'] = $nombre;
    $_SESSION['email'] = $email;

    // Redireccionar al perfil del usuario después de guardar los cambios
    header("Location: /e-commerce/client/src/views/perfil_usuario.php?success=1");
} else {
    echo "Error al actualizar la información del usuario.";
}
?>
