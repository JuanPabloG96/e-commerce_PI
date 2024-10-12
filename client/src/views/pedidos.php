<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <title>HASHERS - Módulo de Pedidos</title>
</head>

<body>
  <?php include "../templates/header.php"?>

  <main>
    <h2>Mis Pedidos</h2>

    <div>
      <table>
        <thead>
          <tr>
            <th>Nº de Pedido</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#1001</td>
            <td>2023-05-15</td>
            <td>$81.97</td>
            <td>
              <span>Entregado</span>
            </td>
            <td>
              <a href="#">Ver detalles</a>
            </td>
          </tr>
          <tr>
            <td>#1002</td>
            <td>2023-05-20</td>
            <td>$129.99</td>
            <td>
              <span>En proceso</span>
            </td>
            <td>
              <a href="#">Ver detalles</a>
            </td>
          </tr>
          <tr>
            <td>#1003</td>
            <td>2023-05-25</td>
            <td>$59.99</td>
            <td>
              <span>Enviado</span>
            </td>
            <td>
              <a href="#">Ver detalles</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div>
      <h3>Detalles del Pedido #1001</h3>
      <div>
        <div>
          <h4>Información del Pedido</h4>
          <p>Fecha: 2023-05-15</p>
          <p>Estado: Entregado</p>
          <p>Total: $81.97</p>
        </div>
        <div>
          <h4>Dirección de Envío</h4>
          <p>Juan Pérez</p>
          <p>Calle Principal 123</p>
          <p>Ciudad, Estado 12345</p>
          <p>País</p>
        </div>
      </div>
      <div>
        <h4>Productos</h4>
        <ul>
          <li>
            <span>Producto 1 x 1</span>
            <span>$19.99</span>
          </li>
          <li>
            <span>Producto 2 x 2</span>
            <span>$49.98</span>
          </li>
        </ul>
      </div>
      <div>
        <button>Descargar Factura</button>
        <button>Contactar Soporte</button>
      </div>
    </div>
  </main>

  <?php include '../templates/footer.php'; ?>
</body>

</html>
