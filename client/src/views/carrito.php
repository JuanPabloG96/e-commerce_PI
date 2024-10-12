<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <title>HASHERS - Carrito de Compras</title>
</head>

<body class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
  <?php include "../templates/header.php"?>

  <main class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Carrito de Compras</h2>

    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden mb-8">
      <table class="w-full">
        <thead>
          <tr class="bg-gray-700">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Producto</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Cantidad</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Precio</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Total</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-700">
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                  <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="Producto 1">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-200">Producto 1</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <input type="number" value="1" min="1"
                class="w-16 px-2 py-1 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500">
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">$19.99</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">$19.99</td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <button class="text-red-500 hover:text-red-600">Eliminar</button>
            </td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                  <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="Producto 2">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-200">Producto 2</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <input type="number" value="2" min="1"
                class="w-16 px-2 py-1 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500">
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">$24.99</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">$49.98</td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <button class="text-red-500 hover:text-red-600">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="bg-gray-800 rounded-lg shadow-md p-6">
      <h3 class="text-xl font-semibold text-violet-300 mb-4">Resumen del Pedido</h3>
      <div class="flex justify-between mb-2">
        <span class="text-gray-300">Subtotal</span>
        <span class="text-gray-300">$69.97</span>
      </div>
      <div class="flex justify-between mb-2">
        <span class="text-gray-300">Impuestos (10%)</span>
        <span class="text-gray-300">$7.00</span>
      </div>
      <div class="flex justify-between mb-4">
        <span class="text-gray-300">Envío</span>
        <span class="text-gray-300">$5.00</span>
      </div>
      <div class="flex justify-between border-t border-gray-700 pt-4">
        <span class="text-lg font-semibold text-violet-300">Total</span>
        <span class="text-lg font-semibold text-violet-300">$81.97</span>
      </div>
      <button
        class="w-full mt-6 px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
        Proceder al pago
      </button>
    </div>

    <div class="mt-8">
      <h3 class="text-xl font-semibold text-violet-300 mb-4">Código de Descuento</h3>
      <div class="flex">
        <input type="text" placeholder="Ingrese su código"
          class="flex-grow px-4 py-2 bg-gray-700 text-white rounded-l-md focus:outline-none focus:ring-2 focus:ring-violet-500">
        <button
          class="px-4 py-2 bg-violet-600 text-white rounded-r-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
          Aplicar
        </button>
      </div>
    </div>
  </main>

  <?php include '../templates/footer.php' ?>
</body>

</html>