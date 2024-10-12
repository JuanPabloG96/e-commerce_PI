<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <title>HASHERS - Módulo de Pagos</title>
</head>

<body>
  <?php include "../templates/header.php"?>

  <main>
    <h2>Proceso de Pago</h2>

    <div>
      <div>
        <h3>Detalles de Pago</h3>
        <form>
          <div>
            <label for="card-number">Número de Tarjeta</label>
            <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456">
          </div>
          <div>
            <div>
              <label for="expiry-date">Fecha de Expiración</label>
              <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/AA">
            </div>
            <div>
              <label for="cvv">CVV</label>
              <input type="text" id="cvv" name="cvv" placeholder="123">
            </div>
          </div>
          <div>
            <label for="name">Nombre en la Tarjeta</label>
            <input type="text" id="name" name="name" placeholder="Juan Pérez">
          </div>
          <div>
            <label for="payment-method">Método de Pago</label>
            <select id="payment-method" name="payment-method">
              <option value="credit-card">Tarjeta de Crédito</option>
              <option value="debit-card">Tarjeta de Débito</option>
              <option value="paypal">PayPal</option>
            </select>
          </div>
          <button type="submit">Pagar $81.97</button>
        </form>
      </div>

      <div>
        <h3>Resumen del Pedido</h3>
        <ul>
          <li>
            <span>Producto 1 x 1</span>
            <span>$19.99</span>
          </li>
          <li>
            <span>Producto 2 x 2</span>
            <span>$49.98</span>
          </li>
          <li>
            <span>Subtotal</span>
            <span>$69.97</span>
          </li>
          <li>
            <span>Impuestos (10%)</span>
            <span>$7.00</span>
          </li>
          <li>
            <span>Envío</span>
            <span>$5.00</span>
          </li>
          <li>
            <span>Total</span>
            <span>$81.97</span>
          </li>
        </ul>
        <div>
          <label for="coupon">Código de Descuento</label>
          <div>
            <input type="text" id="coupon" name="coupon" placeholder="Ingrese su código">
            <button>Aplicar</button>
          </div>
        </div>
        <div>
          <h4>Dirección de Envío</h4>
          <p>Juan Pérez</p>
          <p>Calle Principal 123</p>
          <p>Ciudad, Estado 12345</p>
          <p>País</p>
        </div>
      </div>
    </div>
  </main>

  <?php include '../templates/footer.php'; ?>
</body>

</html>
