<!DOCTYPE html>
<html lang="es" class="bg-gray-900">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/e-commerce/client/assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/e-commerce/client/styles/output.css">
  <title>HS - Pagos</title>
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
	/* // mostrar errores
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); */

	include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

	if (isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];

			// Consulta para obtener la dirección de envío
			$shipping_query = "SELECT id, country, state, city, address, postal_code FROM shipping_addresses WHERE user_id = ?";
			$stmt = $conn->prepare($shipping_query);
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$shipping_result = $stmt->get_result();
			$shipping_data = $shipping_result->fetch_assoc();

			// Consulta para obtener el método de pago
			$payment_query = "SELECT card_number, expiration_date FROM payment_methods WHERE user_id = ?";
			$stmt = $conn->prepare($payment_query);
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$payment_result = $stmt->get_result();
			$payment_data = $payment_result->fetch_assoc();

      // Consulta para obtener los artículos del carrito
      $cart_query = "SELECT ci.quantity, p.name, p.price 
      FROM cart_items ci 
      JOIN products p ON ci.product_id = p.id 
      WHERE ci.user_id = ?";
      $stmt = $conn->prepare($cart_query);
      $stmt->bind_param("i", $user_id);
      $stmt->execute();
      $cart_result = $stmt->get_result();
	}
	?>

  <main class="container mx-auto px-6 py-12 grow">
    <h2 class="text-3xl font-bold text-violet-300 mb-6">Proceso de Pago</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <section class="bg-gray-800 rounded-lg shadow-md p-6 flex flex-col">
        <h3 class="text-xl font-semibold text-violet-300 mb-4">Resumen del Pedido</h3>
        <ul class="space-y-2 mb-4">
          <?php
          while ($row = $cart_result->fetch_assoc()) {
            $quantity = $row['quantity'];
            $name = $row['name'];
            $price = $row['price'];
            $product_total = $quantity * $price;
            $total += $product_total;
          ?>
            <li class="flex justify-between items-center">
              <span class="text-gray-300"><?php echo $name; ?></span>
              <span class="text-gray-300">$<?php echo $product_total; ?></span>
            </li>
          <?php 
          }
          ?>
          <li class="flex justify-between items-center">
            <span class="text-gray-300">Impuestos (10%)</span>
            <span class="text-gray-300">$<?php $iva = $total * 0.1; echo number_format($iva, 2); ?></span>
          </li>
          <li class="flex justify-between items-center">
            <span class="text-gray-300">Envío</span>
            <span class="text-gray-300">$<?php $shipping_price = 5.00; echo number_format($shipping_price, 2); ?></span>
          </li>
          <li class="flex justify-between items-center border-t border-gray-700 pt-2 mt-2">
            <span class="font-semibold text-violet-300 text-2xl">Total</span>
            <span class="font-semibold text-violet-300 text-xl">$<?php echo $total + $shipping_price; ?></span>
          </li>
        </ul>
        <button 
          class="bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded self-end" 
          onclick='proceedToPayment()'>
          proceder al pago
        </button>
      </section>

      <!-- Datos de envío y método de pago -->
      <section class="bg-gray-800 rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold text-violet-300 mb-4">Datos de envío y método de pago</h3>
        <div class="w-full py-4 flex gap-4">
          <div class="flex flex-col justify-between items-start mb-4">
            <h4 class="text-lg font-semibold text-violet-300 mb-2">Dirección de Envío</h4>
            <a class="text-red-400 underline font-semibold text-xs" href="/e-commerce/client/views/editar_direccion.php">
              Editar dirección
            </a>
          </div>
          <div class="grow">
            <p class="text-gray-400 flex justify-between gap-2"><strong>Dirección: </strong>
              <?php 
              if (!empty($shipping_data['address'])) {
                echo htmlspecialchars($shipping_data['address']);
              } else {
                echo "no disponible";
              } 
              ?>
            </p>
            <p class="text-gray-400 flex justify-between gap-2"><strong>Código Postal: </strong>
            <?php 
              if (!empty($shipping_data['postal_code'])) {
                echo htmlspecialchars($shipping_data['postal_code']);
              } else {
                echo "no disponible";
              } 
              ?>
            </p>
            <p class="text-gray-400 flex justify-between gap-2"><strong>Ciudad: </strong>
              <?php
              if (!empty($shipping_data['city'])) {
                echo htmlspecialchars($shipping_data['city']);
              } else {
                echo "no disponible";
              } 
              ?>
            </p>
            <p class="text-gray-400 flex justify-between gap-2"><strong>País: </strong>
              <?php
              if (!empty($shipping_data['country'])) {
                echo htmlspecialchars($shipping_data['country']);
              } else {
                echo "no disponible";
              } 
              ?>
            </p>
          </div>
        </div>

        <div class="w-full border-t border-gray-700 pt-4 flex gap-4 justify-between">
          <div class="flex flex-col justify-between items-start mb-4">
            <h4 class="text-lg font-semibold text-violet-300 mb-2">Información del método de pago</h4>
            <a class="text-red-400 underline font-semibold text-xs" href="/e-commerce/client/views/editar_pago.php">
              Editar método de pago
            </a>
          </div>
          <div>
            <p class="text-gray-400"><strong>Terminación de la tarjeta: 
              <br>
            </strong>**** **** ****
              <?php
              if (!empty($payment_data['card_number'])) {
                echo htmlspecialchars(substr($payment_data['card_number'], -4));
              } else {
                echo "####";
              }
              ?>
            </p>
            <p class="text-gray-400"><strong>Fecha de expiración: 
              <br>
            </strong>
              <?php
              if (!empty($payment_data['expiration_date'])) {
                echo htmlspecialchars($payment_data['expiration_date']);
              } else {
                echo "no disponible";
              }
              ?>
            </p>
          </div>
        </div>
      </section>
    </div>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/client/templates/footer.php'; ?>
  <script type="module" src="/e-commerce/client/js/pagos.js"></script>
</body>

</html>