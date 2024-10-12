<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <title>HASHERS - Carrito de Compras</title>
</head>

<body>
  <?php include "../templates/header.php"?>

  <main>
    <h2>Carrito de Compras</h2>

    <div>
      <table>
        <thead>
          <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div>
                <div>
                  <img src="https://via.placeholder.com/40" alt="Producto 1">
                </div>
                <div>
                  <div>Producto 1</div>
                </div>
              </div>
            </td>
            <td>
              <input type="number" value="1" min="1">
            </td>
            <td>$19.99</td>
            <td>$19.99</td>
            <td>
              <button>Eliminar</button>
            </td>
          </tr>
          <tr>
            <td>
              <div>
                <div>
                  <img src="https://via.placeholder.com/40" alt="Producto 2">
                </div>
                <div>
                  <div>Producto 2</div>
                </div>
              </div>
            </td>
            <td>
              <input type="number" value="2" min="1">
            </td>
            <td>$24.99</td>
            <td>$49.98</td>
            <td>
              <button>Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div>
      <h3>Resumen del Pedido</h3>
      <div>
        <span>Subtotal</span>
        <span>$69.97</span>
      </div>
      <div>
        <span>Impuestos (10%)</span>
        <span>$7.00</span>
      </div>
      <div>
        <span>Envío</span>
        <span>$5.00</span>
      </div>
      <div>
        <span>Total</span>
        <span>$81.97</span>
      </div>
      <button>Proceder al pago</button>
    </div>

    <div>
      <h3>Código de Descuento</h3>
      <div>
        <input type="text" placeholder="Ingrese su código">
        <button>Aplicar</button>
      </div>
    </div>
  </main>

  <?php include '../templates/footer.php' ?>
</body>

</html>
