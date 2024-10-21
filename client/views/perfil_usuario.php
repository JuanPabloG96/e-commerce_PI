<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/e-commerce/client/assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/e-commerce/client/styles/output.css">
  <title>HS - Editar Perfil</title>
</head>

<body class="min-h-screen bg-gradient-to-b from-gray-900 to-violet-700 text-gray-100 flex flex-col">
  <?php
  session_start();

  if (isset($_SESSION['user_id'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/client/templates/header_usuario.php';
  } else {
    include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/client/templates/header.php';
  }
  ?>

  <?php
  require $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

  if (!isset($_SESSION['user_id'])) {
    header('Location: /e-commerce/client/views/usuario.php');
  }

  $user_id = $_SESSION['user_id'];

  $query = "SELECT * FROM users WHERE id = $user_id";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
  }

  $conn->close();
  ?>

  <main class="container mx-auto px-6 py-12 grow max-w-[750px]">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Editar Perfil</h2>

    <section class="bg-gray-800 rounded-lg shadow-md p-6">
      <h3 class="text-xl font-semibold text-violet-300 mb-4">Detalles del Usuario</h3>
      <form action="/e-commerce/server/controllers/users/editar_perfil.php" method="POST" enctype="multipart/form-data">
        <!-- Nombre -->
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nombre</label>
          <input type="text" id="name" name="name" value="<?php if (isset($user['username'])) echo $user['username']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500" placeholder="Juan Perez">
        </div>
         <!-- Correo Electrónico -->
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Correo Electrónico</label>
          <input type="email" id="email" name="email" value="
            <?php if (isset($user['email'])) echo $user['email']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
        </div>

        <!-- Contraseña -->
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="********"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
        </div>

        <!-- Imagen de Perfil -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-300 mb-2">Imagen de Perfil</label>
          <div class="flex justify-left items-center gap-6">
            <picture class="w-24 h-24 rounded-lg overflow-hidden">
              <img id="profile-image" src="<?php if (isset($user['profile_pic'])) echo $user['profile_pic']; else echo '/e-commerce/client/assets/default.webp'; ?>" alt="Imagen de perfil" class="w-full h-full object-cover">
            </picture>
            <input type="file" id="profile-pic" name="profile-pic" class="text-wrap ">
          </div>
        </div>

        <button type="submit"
          class="w-full bg-violet-600 text-white font-bold py-2 px-4 rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
          Guardar Cambios
        </button>
      </form>
    </section>      
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . "/e-commerce/client/templates/footer.php"; ?>
  <script type="module" src="/e-commerce/client/js/perfil_usuario.js"></script>
</body>

</html>
