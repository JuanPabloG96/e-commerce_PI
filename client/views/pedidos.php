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
  session_start();

  if (isset($_SESSION['user_id'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/client/templates/header_usuario.php';
  } else {
    include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/client/templates/header.php';
  }
  ?>

  <main class="container mx-auto px-6 py-12 grow">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Mis Pedidos</h2>

    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
      <table class="w-full">
        <thead>
          <tr class="bg-gray-700">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Número de Pedido
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Fecha</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Total</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Estado</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-700">
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">#1001</td>
            <td class="px-6 py-4 whitespace-nowrap">2023-05-15</td>
            <td class="px-6 py-4 whitespace-nowrap">$69.97</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                Entregado
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <a href="#" class="text-violet-300 hover:text-violet-400">Ver detalles</a>
            </td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">#1002</td>
            <td class="px-6 py-4 whitespace-nowrap">2023-05-20</td>
            <td class="px-6 py-4 whitespace-nowrap">$129.99</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                En proceso
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <a href="#" class="text-violet-300 hover:text-violet-400">Ver detalles</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . "/e-commerce/client/templates/footer.php" ?>
  <script type="module" src="/e-commerce/client/js/pedidos.js"></script>
</body>

</html>