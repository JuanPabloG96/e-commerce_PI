<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/e-commerce/client/assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/e-commerce/client/styles/output.css">
  <title>HS - Carrito de Compras</title>
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

  if (!isset($_SESSION['user_id'])) {
      header('Location: usuario.php');
      exit();
  }

  require $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

  // Obtener el ID del usuario actual
  $user_id = $_SESSION['user_id'];

  // Consulta para obtener los productos en el carrito de este usuario
  $sql = "SELECT ci.product_id, ci.quantity, p.name, p.price 
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.id  -- Verifica que product_id sea correcto
        WHERE ci.user_id = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();

  $total = 0;
  ?>

  <main class="container mx-auto px-6 py-12 grow">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Carrito de Compras</h2>
    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden"><table class="w-full">
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
        <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $cantidad = $row['quantity'];
        $precio = $row['price'];
        $subtotal = $precio * $cantidad;
        $total += $subtotal;
?>
<tr data-product-id="<?php echo $row['product_id']; ?>">  <!-- product_id asignado -->
    <td class="px-6 py-4 whitespace-nowrap"><?php echo $name; ?></td>
    <td class="px-6 py-4 whitespace-nowrap">
        <input 
            type="number" 
            value="<?php echo $cantidad; ?>" 
            min="1" 
            class="w-16 px-2 py-1 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:border-violet-500" 
            onchange="updateQuantity(<?php echo $row['product_id']; ?>, this.value)" >
    </td>
    <td class="px-6 py-4 whitespace-nowrap product-price">$<?php echo number_format($precio, 2); ?></td>
    <td class="px-6 py-4 whitespace-nowrap product-subtotal">$<?php echo number_format($subtotal, 2); ?></td>
    <td class="px-6 py-4 whitespace-nowrap">
        <button 
            class="text-red-500 hover:text-red-600" 
            onclick="deleteProduct(<?php echo $row['product_id']; ?>)">  <!-- Enviar product_id al eliminar -->
            Eliminar
        </button>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='5' class='px-6 py-4 text-center'>El carrito está vacío.</td></tr>";
}
?>

        </tbody>
      </table>
    </div>

    <div class="mt-8 flex justify-between items-center">
      <div class="text-2xl font-bold text-violet-300" id="cart-total">
        Total: $<?php echo number_format($total, 2); ?>
      </div>
      <button class="bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded">
        Proceder al pago
      </button>
    </div>
  </main>

  <?php
  $stmt->close();
  $conn->close();
  ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/e-commerce/client/templates/footer.php" ?>
  <script type="module" src="/e-commerce/client/js/carrito.js"></script>
</body>

</html>
