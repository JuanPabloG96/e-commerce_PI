<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/e-commerce/client/assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/e-commerce/client/styles/output.css">
  <title>HS - Editar Método de Pago</title>
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

    $query = "SELECT * FROM payment_methods WHERE user_id = $user_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      $payment_method = $result->fetch_assoc();
    }

    $conn->close();
  }
  ?>

  <main class="container mx-auto px-6 py-12 grow max-w-[750px]  ">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Editar Método de Pago</h2>

    <section class="bg-gray-800 rounded-lg shadow-md p-6">
      <form action="/e-commerce/server/controllers/users/actualizar_metodo_pago.php" method="POST">
        <!-- Nombre en la Tarjeta -->
        <div class="mb-4">
          <label for="card-name" class="block text-sm font-medium text-gray-300 mb-2">Nombre en la Tarjeta</label>
          <input type="text" id="card-name" name="card-name" value="<?php if (isset($payment_method['card_name'])) echo $payment_method['card_name']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500" placeholder="John Doe">
        </div>

        <!-- Número de la Tarjeta -->
        <div class="mb-4">
          <label for="card-number" class="block text-sm font-medium text-gray-300 mb-2">Número de la Tarjeta</label>
          <input type="text" id="card-number" name="card-number" value="<?php if (isset($payment_method['card_number'])) echo $payment_method['card_number']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500" placeholder="**** **** **** 3456">
        </div>

        <!-- Fecha de Expiración -->
        <div class="mb-4">
          <label for="expiration-date" class="block text-sm font-medium text-gray-300 mb-2">Fecha de Expiración</label>
          <input type="text" id="expiration-date" name="expiration-date" value="<?php if (isset($payment_method['expiration_date'])) echo $payment_method['expiration_date']; ?>"
            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500" placeholder="MM/YY">
        </div>

        <button type="submit"
          class="w-full bg-violet-600 text-white font-bold py-2 px-4 rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
          Guardar Cambios
        </button>
      </form>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . "/e-commerce/client/templates/footer.php" ?>
  <script type="module" src="/e-commerce/client/js/editar_metodo_pago.js"></script>
</body>

</html>
