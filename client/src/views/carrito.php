<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../styles/output.css">
  <title>HS - Carrito de Compras</title>
</head>

<body class="min-h-screen bg-gradient-to-b from-gray-900 to-violet-700 text-gray-100 flex flex-col">
  <?php
  session_start();

  if (isset($_SESSION['user_id'])) {
      include '../templates/header_usuario.php';
  } else {
      include '../templates/header.php';
  }
  ?>

  <main class="container mx-auto px-6 py-12 grow">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Carrito de Compras</h2>

    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
      <table class="w-full">
        <thead>
          <tr class="bg-gray-700">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
              Producto</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
              Cantidad</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
              Precio</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Total
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
              Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-gray-800  divide-y divide-gray-700">
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">Producto 1</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <input type="number" value="1" min="1"
                class="w-16 px-2 py-1 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500">
            </td>
            <td class="px-6 py-4 whitespace-nowrap">$19.99</td>
            <td class="px-6 py-4 whitespace-nowrap">$19.99</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <button class="text-red-500 hover:text-red-600">Eliminar</button>
            </td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">Producto 2</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <input type="number" value="2" min="1"
                class="w-16 px-2 py-1 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500">
            </td>
            <td class="px-6 py-4 whitespace-nowrap">$24.99</td>
            <td class="px-6 py-4 whitespace-nowrap">$49.98</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <button class="text-red-500 hover:text-red-600">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="mt-8 flex justify-between items-center">
      <div class="text-2xl font-bold text-violet-300">
        Total: $69.97
      </div>
      <button class="bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded">
        Proceder al pago
      </button>
    </div>
  </main>

  <?php include "../templates/footer.php"?>
</body>

</html>