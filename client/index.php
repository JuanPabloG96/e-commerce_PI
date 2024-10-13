<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="src/assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="src/styles/output.css">
  <title>HS - Proyecto de Comercio Electrónico</title>
</head>

<body class="min-h-screen bg-gradient-to-b from-gray-900 to-violet-700 text-gray-100 flex flex-col">
  <?php include "src/templates/header.php" ?>

  <main class="container mx-auto px-6 py-12 grow">
    <section id="hero" class="text-center mb-16">
      <h2 class="text-4xl font-bold text-violet-300 mb-4">Proyecto de Comercio Electrónico</h2>
      <p class="text-xl text-gray-300 mb-8">Una aplicación de e-commerce simple y potente construida con PHP y MySQL</p>
    </section>

    <section id="about" class="mb-16">
      <h3 class="text-2xl font-bold text-violet-300 mb-4">Acerca del Proyecto</h3>
      <div class="bg-gray-800 p-6 rounded-lg shadow-md">
        <p class="text-gray-300">
          Este proyecto consiste en el desarrollo de una aplicación de comercio electrónico simple utilizando PHP como
          lenguaje de programación y MySQL como sistema de gestión de bases de datos. La arquitectura de la aplicación
          es monolítica, lo que significa que todos los módulos del sistema están integrados en una única aplicación.
          Este enfoque es ideal para proyectos sencillos y es un buen punto de partida para aprender sobre el desarrollo
          de aplicaciones web.
        </p>
      </div>
    </section>

    <section id="modules" class="mb-16">
      <h3 class="text-2xl font-bold text-violet-300 mb-4">Módulos Implementados</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
          <h4 class="text-xl font-semibold text-violet-300 mb-2">Módulo de Usuario</h4>
          <p class="text-gray-300">Gestiona el registro, inicio de sesión y perfil de los usuarios.</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
          <h4 class="text-xl font-semibold text-violet-300 mb-2">Módulo de Productos</h4>
          <p class="text-gray-300">Muestra el catálogo de productos, gestiona categorías y detalles del producto.</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
          <h4 class="text-xl font-semibold text-violet-300 mb-2">Módulo de Carrito de Compras</h4>
          <p class="text-gray-300">Permite a los usuarios agregar o quitar productos del carrito.</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
          <h4 class="text-xl font-semibold text-violet-300 mb-2">Módulo de Pedidos</h4>
          <p class="text-gray-300">Maneja el procesamiento de las órdenes de compra.</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
          <h4 class="text-xl font-semibold text-violet-300 mb-2">Módulo de Pagos</h4>
          <p class="text-gray-300">Integra el sistema de pagos, verificando los detalles y confirmando transacciones.
          </p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
          <h4 class="text-xl font-semibold text-violet-300 mb-2">Módulo de Base de Datos</h4>
          <p class="text-gray-300">Un único servidor de base de datos maneja todas las tablas relacionadas con usuarios,
            productos, pedidos, etc.</p>
        </div>
      </div>
    </section>

    <section id="architecture" class="mb-16">
      <h3 class="text-2xl font-bold text-violet-300 mb-4">Arquitectura de la Aplicación</h3>
      <div class="bg-gray-800 p-6 rounded-lg shadow-md">
        <div class="flex items-center justify-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-violet-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
          </svg>
        </div>
        <p class="text-gray-300 text-center">
          La arquitectura del sistema se basa en el enfoque monolítico, donde todos los módulos como la gestión de
          productos, el carrito de compras, la autenticación de usuarios, el procesamiento de pagos y la base de datos
          están fuertemente acoplados y se ejecutan como una única aplicación. Esto proporciona simplicidad en la
          implementación y gestión del sistema.
        </p>
      </div>
    </section>
  </main>

  <?php include "src/templates/footer.php" ?>
</body>

</html>