<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/e-commerce/client/assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/e-commerce/client/styles/output.css">
    <title>HS - Pedidos</title>
  </head>

  <body class="min-h-screen bg-gradient-to-b from-gray-900 to-violet-700 text-gray-100 flex flex-col">
    <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      session_start();

      if (isset($_SESSION['user_id'])) {
        include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/client/templates/header_usuario.php';
      } else {
        include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/client/templates/header.php';
      }
    ?>

    <?php
      require $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

      if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
      }

      $query = "SELECT * FROM orders WHERE user_id = $user_id";
      $result = $conn->query($query);
    ?>

    <main class="container mx-auto px-6 py-12 grow">
      <h2 class="text-3xl font-bold text-violet-300 mb-6">Mis Pedidos</h2>

      <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
          <?php if ($result->num_rows > 0) { ?>
            <table class="w-full">
            <thead>
              <tr class="bg-gray-700">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Número de Pedido</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Fecha</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Total</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Estado</th>
              </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700">
              <?php while ($orders = $result->fetch_assoc()) { ?>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    #<?php 
                      $formatted_total = $orders['id'];
                      $formatted_total = str_pad($formatted_total, 11, '0', STR_PAD_LEFT);
                      echo $formatted_total;
                    ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <?php echo $orders['created_at']; ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">$<?php echo number_format($orders['total_amount'], 2); ?></td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                      <?php
                        $statusClasses = [
                          'pending' => 'bg-yellow-100 text-yellow-800',
                          'processing' => 'bg-blue-100 text-blue-800',
                          'shipped' => 'bg-green-100 text-green-800',
                          'delivered' => 'bg-purple-100 text-purple-800'
                        ];

                        echo $statusClasses[$orders['status']];
                      ?>">
                      <?php echo $orders['status']; ?>
                    </span>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php } else { ?>
            <p class="text-gray-300 p-6">No tienes pedidos aún.</p>
          <?php } ?>
      </div>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/e-commerce/client/templates/footer.php" ?>
  </body>

</html>

