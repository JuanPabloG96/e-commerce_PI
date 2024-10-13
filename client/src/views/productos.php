<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../styles/output.css">
  <title>HS - Tienda</title>
</head>

<body class="min-h-screen bg-gradient-to-b from-gray-900 to-violet-700 text-gray-100 flex flex-col">
  <?php include "../templates/header.php" ?>

  <main class="container mx-auto px-6 py-12 grow">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Catálogo de Productos</h2>

    <div id="products" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
  </main>

  <?php include "../templates/footer.php" ?>

  <script src="../js/productos.js" type="module"></script>
</body>

</html>