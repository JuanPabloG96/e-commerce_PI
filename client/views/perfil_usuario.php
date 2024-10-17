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

  <main class="container mx-auto px-6 py-12 grow">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Editar Perfil</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

      <section class="bg-gray-800 rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold text-violet-300 mb-4">Detalles del Usuario</h3>
        <form action="../controllers/update_profile.php" method="POST" enctype="multipart/form-data">
          <!-- Nombre -->
          <div class="mb-4 flex items-center justify-between">
            <div class="flex-grow">
              <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nombre</label>
              <input type="text" id="name" name="name" value="Juan Pérez" disabled
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
            </div>
            <button type="button" onclick="toggleInput('name')"
              class="ml-4 px-3 py-2 bg-violet-600 text-white rounded hover:bg-violet-700">Editar</button>
          </div>

          <!-- Correo Electrónico -->
          <div class="mb-4 flex items-center justify-between">
            <div class="flex-grow">
              <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Correo Electrónico</label>
              <input type="email" id="email" name="email" value="juanperez@gmail.com" disabled
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
            </div>
            <button type="button" onclick="toggleInput('email')"
              class="ml-4 px-3 py-2 bg-violet-600 text-white rounded hover:bg-violet-700">Editar</button>
          </div>

          <!-- Contraseña -->
          <div class="mb-4 flex items-center justify-between">
            <div class="flex-grow">
              <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Contraseña</label>
              <input type="password" id="password" name="password" placeholder="********" disabled
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
            </div>
            <button type="button" onclick="toggleInput('password')"
              class="ml-4 px-3 py-2 bg-violet-600 text-white rounded hover:bg-violet-700">Editar</button>
          </div>

          <!-- Imagen de Perfil -->
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Imagen de Perfil</label>
            <div class="mb-4 flex justify-between items-center gap-3">
              <img id="profile-image" src="../assets/default.webp" alt="Imagen de perfil" class="rounded-md mb-4" width="90" height="90">
              <input type="file" id="profile-pic" name="profile-pic" disabled class="w-full max-w-[200px] text-sm text-wrap">
              <button type="button" onclick="toggleInput('profile-pic')" class="mt-2 w-auto px-3 py-2 bg-violet-600 text-white rounded hover:bg-violet-700">Cambiar Imagen</button>
            </div>
          </div>

          <button type="submit"
            class="w-full bg-violet-600 text-white font-bold py-2 px-4 rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
            Guardar Cambios
          </button>
        </form>
      </section>

      <!-- Sección de Dirección de Envío -->
      <section class="bg-gray-800 rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold text-violet-300 mb-4">Dirección de Envío</h3>
        <form action="../controllers/update_address.php" method="POST">
          <!-- Dirección -->
          <div class="mb-4 flex items-center justify-between">
            <div class="flex-grow">
              <label for="address" class="block text-sm font-medium text-gray-300 mb-2">Dirección</label>
              <input type="text" id="address" name="address" value="Calle Principal 123" disabled
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
            </div>
            <button type="button" onclick="toggleInput('address')"
              class="ml-4 px-3 py-2 bg-violet-600 text-white rounded hover:bg-violet-700">Editar</button>
          </div>

          <!-- Código Postal -->
          <div class="mb-4 flex items-center justify-between">
            <div class="flex-grow">
              <label for="postal-code" class="block text-sm font-medium text-gray-300 mb-2">Código Postal</label>
              <input type="text" id="postal-code" name="postal-code" value="32000" disabled
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
            </div>
            <button type="button" onclick="toggleInput('postal-code')"
              class="ml-4 px-3 py-2 bg-violet-600 text-white rounded hover:bg-violet-700">Editar</button>
          </div>

          <!-- Ciudad -->
          <div class="mb-4 flex items-center justify-between">
            <div class="flex-grow">
              <label for="city" class="block text-sm font-medium text-gray-300 mb-2">Ciudad</label>
              <input type="text" id="city" name="city" value="Ciudad Juárez" disabled
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
            </div>
            <button type="button" onclick="toggleInput('city')"
              class="ml-4 px-3 py-2 bg-violet-600 text-white rounded hover:bg-violet-700">Editar</button>
          </div>

          <!-- País -->
          <div class="mb-4 flex items-center justify-between">
            <div class="flex-grow">
              <label for="country" class="block text-sm font-medium text-gray-300 mb-2">País</label>
              <input type="text" id="country" name="country" value="México" disabled
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
            </div>
            <button type="button" onclick="toggleInput('country')"
              class="ml-4 px-3 py-2 bg-violet-600 text-white rounded hover:bg-violet-700">Editar</button>
          </div>

          <button type="submit"
            class="w-full bg-violet-600 text-white font-bold py-2 px-4 rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
            Guardar Cambios
          </button>
        </form>
      </section>
    </div>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . "/e-commerce/client/templates/footer.php" ?>
  <script type="module" src="/e-commerce/client/js/perfil_usuario.js"></script>
</body>

</html>

