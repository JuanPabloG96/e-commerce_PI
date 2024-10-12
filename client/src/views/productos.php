<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <title>HASHERS - Módulo de Productos</title>
</head>

<body class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
  <?php include "../templates/header.php"?>

  <main class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Catálogo de Productos</h2>

    <div class="mb-8">
      <div class="flex flex-col md:flex-row gap-4">
        <input type="text" placeholder="Buscar productos..."
          class="flex-grow px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-violet-500">
        <select
          class="px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-violet-500">
          <option value="">Todas las categorías</option>
          <option value="electronica">Electrónica</option>
          <option value="ropa">Ropa</option>
          <option value="hogar">Hogar</option>
        </select>
        <button
          class="px-6 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
          Buscar
        </button>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Producto 1 -->
      <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/300x200" alt="Producto 1" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-semibold text-violet-300 mb-2">Producto 1</h3>
          <p class="text-gray-400 mb-4">Descripción breve del producto 1. Este es un ejemplo de texto para
            mostrar dónde iría la descripción del producto.</p>
          <div class="flex justify-between items-center">
            <span class="text-2xl font-bold text-violet-300">$19.99</span>
            <button
              class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
              Agregar al carrito
            </button>
          </div>
        </div>
      </div>

      <!-- Producto 2 -->
      <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/300x200" alt="Producto 2" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-semibold text-violet-300 mb-2">Producto 2</h3>
          <p class="text-gray-400 mb-4">Descripción breve del producto 2. Este es un ejemplo de texto para
            mostrar dónde iría la descripción del producto.</p>
          <div class="flex justify-between items-center">
            <span class="text-2xl font-bold text-violet-300">$24.99</span>
            <button
              class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
              Agregar al carrito
            </button>
          </div>
        </div>
      </div>

      <!-- Producto 3 -->
      <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/300x200" alt="Producto 3" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-semibold text-violet-300 mb-2">Producto 3</h3>
          <p class="text-gray-400 mb-4">Descripción breve del producto 3. Este es un ejemplo de texto para
            mostrar dónde iría la descripción del producto.</p>
          <div class="flex justify-between items-center">
            <span class="text-2xl font-bold text-violet-300">$29.99</span>
            <button
              class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
              Agregar al carrito
            </button>
          </div>
        </div>
      </div>

      <!-- Producto 4 -->
      <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/300x200" alt="Producto 4" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-semibold text-violet-300 mb-2">Producto 4</h3>
          <p class="text-gray-400 mb-4">Descripción breve del producto 4. Este es un ejemplo de texto para
            mostrar dónde iría la descripción del producto.</p>
          <div class="flex justify-between items-center">
            <span class="text-2xl font-bold text-violet-300">$34.99</span>
            <button
              class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
              Agregar al carrito
            </button>
          </div>
        </div>
      </div>

      <!-- Producto 5 -->
      <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/300x200" alt="Producto 5" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-semibold text-violet-300 mb-2">Producto 5</h3>
          <p class="text-gray-400 mb-4">Descripción breve del producto 5. Este es un ejemplo de texto para
            mostrar dónde iría la descripción del producto.</p>
          <div class="flex justify-between items-center">
            <span class="text-2xl font-bold text-violet-300">$39.99</span>
            <button
              class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
              Agregar al carrito
            </button>
          </div>
        </div>
      </div>

      <!-- Producto 6 -->
      <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/300x200" alt="Producto 6" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-xl font-semibold text-violet-300 mb-2">Producto 6</h3>
          <p class="text-gray-400 mb-4">Descripción breve del producto 6. Este es un ejemplo de texto para
            mostrar dónde iría la descripción del producto.</p>
          <div class="flex justify-between items-center">
            <span class="text-2xl font-bold text-violet-300">$44.99</span>
            <button
              class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
              Agregar al carrito
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-8 flex justify-center">
      <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
        <a href="#"
          class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
          <span class="sr-only">Anterior</span>
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd"
              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
              clip-rule="evenodd" />
          </svg>
        </a>
        <a href="#"
          class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
          1
        </a>
        <a href="#"
          class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-violet-600 text-sm font-medium text-white">
          2
        </a>
        <a href="#"
          class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
          3
        </a>
        <a href="#"
          class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
          <span class="sr-only">Siguiente</span>
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd" />
          </svg>
        </a>
      </nav>
    </div>
  </main>

  <?php include '../templates/footer.php'; ?>
</body>

</html>