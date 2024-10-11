<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/output.css">
  <title>HASHERS - Módulo de Pedidos</title>
</head>

<body class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
  <?php include "../templates/header.php"?>

  <main class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Mis Pedidos</h2>

    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden mb-8">
      <table class="w-full">
        <thead>
          <tr class="bg-gray-700">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nº de Pedido</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Fecha</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Total</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Estado</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-700">
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">#1001</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">2023-05-15</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">$81.97</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span
                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                Entregado
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <a href="#" class="text-violet-400 hover:text-violet-300">Ver detalles</a>
            </td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">#1002</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">2023-05-20</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">$129.99</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span
                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                En proceso
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <a href="#" class="text-violet-400 hover:text-violet-300">Ver detalles</a>
            </td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">#1003</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">2023-05-25</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">$59.99</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span
                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                Enviado
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <a href="#" class="text-violet-400 hover:text-violet-300">Ver detalles</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="bg-gray-800 rounded-lg shadow-md p-6">
      <h3 class="text-xl font-semibold text-violet-300 mb-4">Detalles del Pedido #1001</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <h4 class="text-lg font-medium text-gray-300 mb-2">Información del Pedido</h4>
          <p class="text-gray-400">Fecha: 2023-05-15</p>
          <p class="text-gray-400">Estado: Entregado</p>
          <p class="text-gray-400">Total: $81.97</p>
        </div>
        <div>
          <h4 class="text-lg font-medium text-gray-300 mb-2">Dirección de Envío</h4>
          <p class="text-gray-400">Juan Pérez</p>
          <p class="text-gray-400">Calle Principal 123</p>
          <p class="text-gray-400">Ciudad, Estado 12345</p>
          <p class="text-gray-400">País</p>
        </div>
      </div>
      <div class="mt-6">
        <h4 class="text-lg font-medium text-gray-300 mb-2">Productos</h4>
        <ul class="space-y-2">
          <li class="flex justify-between items-center">
            <span class="text-gray-400">Producto 1 x 1</span>
            <span class="text-gray-400">$19.99</span>
          </li>
          <li class="flex justify-between items-center">
            <span class="text-gray-400">Producto 2 x 2</span>
            <span class="text-gray-400">$49.98</span>
          </li>
        </ul>
      </div>
      <div class="mt-6 flex justify-between items-center">
        <button
          class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
          Descargar Factura
        </button>
        <button
          class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Contactar Soporte
        </button>
      </div>
    </div>
  </main>

  <?php include '../templates/footer.php'; ?>
</body>

</html>