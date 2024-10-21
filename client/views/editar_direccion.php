<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/e-commerce/client/assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/e-commerce/client/styles/output.css">
  <title>HS - Editar Dirección</title>
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

  if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM shipping_addresses WHERE user_id = $user_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      $address = $result->fetch_assoc();
    }

    $conn->close();
  }
  ?>

  <main class="container mx-auto px-6 py-12 grow max-w-[750px]">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Editar Dirección</h2>

    <section class="bg-gray-800 rounded-lg shadow-md p-6">
      <form action="/e-commerce/server/controllers/users/actualizar_direccion.php" method="POST">
        <!-- Dirección -->
        <div class="mb-4">
          <label for="address" class="block text-sm font-medium text-gray-300 mb-2">Dirección</label>
          <input type="text" id="address" name="address" 
            value="<?php if (isset($address['address'])) echo $address['address']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500"
            placeholder="Calle Principal 123">
        </div>

        <!-- Código Postal -->
        <div class="mb-4">
          <label for="postal-code" class="block text-sm font-medium text-gray-300 mb-2">Código Postal</label>
          <input type="text" id="postal-code" name="postal-code" 
            value="<?php if (isset($address['postal_code'])) echo $address['postal_code']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500"
            placeholder="12345">
        </div>

        <!-- Ciudad -->
        <div class="mb-4">
          <label for="city" class="block text-sm font-medium text-gray-300 mb-2">Ciudad</label>
          <input type="text" id="city" name="city" value="<?php if (isset($address['city'])) echo $address['city']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500"
            placeholder="CDMX">
        </div>

        <!-- Estado -->
        <div class="mb-4">
          <label for="state" class="block text-sm font-medium text-gray-300 mb-2">Estado</label>
          <input type="text" id="state" name="state" value="<?php if (isset($address['state'])) echo $address['state']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500"
            placeholder="Ciudad de Mexico">
        </div>

        <!-- País -->
        <div class="mb-4">
          <label for="country" class="block text-sm font-medium text-gray-300 mb-2">País</label>
          <input type="text" id="country" name="country" value="<?php if (isset($address['country'])) echo $address['country']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500"
            placeholder="Mexico">
        </div>       

        <button type="submit"
          class="w-full bg-violet-600 text-white font-bold py-2 px-4 rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
          Guardar Cambios
        </button>
      </form>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . "/e-commerce/client/templates/footer.php" ?>
  <script type="module" src="/e-commerce/client/js/editar_direccion.js"></script>
</body>

</html>
