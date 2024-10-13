<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../styles/output.css">
  <title>HS - Inicio de sesión</title>
</head>

<body class="min-h-screen bg-gradient-to-b from-gray-900 to-violet-700 text-gray-100 flex flex-col">
  <?php include "../templates/header.php"?>

  <main class="container mx-auto px-6 py-12 grow">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Módulo de Usuario</h2>

    <div class="grid md:grid-cols-2 gap-6">
      <div class="bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-violet-300 mb-4">Iniciar Sesión</h3>
        <form>
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Correo
              Electrónico</label>
            <input type="email" id="email" name="email"
              class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500">
          </div>
          <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Contraseña</label>
            <input type="password" id="password" name="password"
              class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500">
          </div>
          <button type="submit" class="w-full bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded">
            Iniciar Sesión
          </button>
        </form>
      </div>

      <div class="bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-violet-300 mb-4">Registrarse</h3>
        <form>
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nombre</label>
            <input type="text" id="name" name="name"
              class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500">
          </div>
          <div class="mb-4">
            <label for="register-email" class="block text-sm font-medium text-gray-300 mb-2">Correo
              Electrónico</label>
            <input type="email" id="register-email" name="register-email"
              class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500">
          </div>
          <div class="mb-4">
            <label for="register-password" class="block text-sm font-medium text-gray-300 mb-2">Contraseña</label>
            <input type="password" id="register-password" name="register-password"
              class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500">
          </div>
          <button type="submit" class="w-full bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded">
            Registrarse
          </button>
        </form>
      </div>
    </div>
  </main>

  <?php include '../templates/footer.php'; ?>
  <script type="module" src="../js/usuario.js"></script>
</body>

</html>