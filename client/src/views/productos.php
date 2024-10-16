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
  <?php
  session_start();

  if (isset($_SESSION['user_id'])) {
      include '../templates/header_usuario.php';
  } else {
      include '../templates/header.php';
  }
  ?>

  <main class="container mx-auto px-6 py-12 grow">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Catálogo de Productos</h2>

  <?php
  require '../../../server/config/db_connection.php'; // Asegúrate de que la ruta es correcta

  if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
  }

  // Consulta para obtener los productos
  $sql = "SELECT id, name, description, price, imgSrc FROM products";
  $result = $conn->query($sql);

  // Verificar si hay resultados
  if ($result->num_rows > 0) {
      echo '<div id="products" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">';
      
      // Recorrer los resultados
      while ($row = $result->fetch_assoc()) {
          echo '
              <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <img src="' . htmlspecialchars($row['imgSrc']) . '" alt="' . htmlspecialchars($row['name']) . '" class="w-full h-48 object-cover">
                <div class="p-4">
                  <h3 class="text-xl font-semibold text-violet-300 mb-2">' . htmlspecialchars($row['name']) . '</h3>
                  <p class="text-gray-400 mb-4">' . htmlspecialchars($row['description']) . '</p>
                  <div class="flex justify-between items-center">
                      <span class="text-2xl font-bold text-violet-300">$' . htmlspecialchars($row['price']) . '</span>
                      <button class="bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded" data-product-id="' . htmlspecialchars($row['id']) . '">
                          Agregar al carrito
                      </button>
                  </div>
                </div>
              </div>';
      }
      
      echo '</div>';
  } else {
      echo '<p class="text-red-500">No hay productos disponibles.</p>';
  }

  $conn->close();
  ?>
  </main>

  <?php include "../templates/footer.php" ?>
  <script src="../js/productos.js" type="module"></script>
</body>

</html>