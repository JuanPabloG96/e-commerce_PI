<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <title>HASHERS - Módulo de Productos</title>
</head>

<body>
  <?php include "../templates/header.php"?>

  <main>
    <h2>Catálogo de Productos</h2>

    <div>
      <div>
        <input type="text" placeholder="Buscar productos...">
        <select>
          <option value="">Todas las categorías</option>
          <option value="electronica">Electrónica</option>
          <option value="ropa">Ropa</option>
          <option value="hogar">Hogar</option>
        </select>
        <button>Buscar</button>
      </div>
    </div>

    <div id="products">

    </div>
    <div>  
      <nav aria-label="Pagination">
        <a href="#">
          <span class="sr-only">Anterior</span>
          <img src="../assets/images/anterior.svg" alt="anterior icon" height="10">
        </a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">
          <img src="../assets/images/siguiente.svg" alt="siguiente icon" height="10">
          <span class="sr-only">Siguiente</span>
        </a>
      </nav>
    </div>
  </main>

  <?php include '../templates/footer.php'; ?>

  <script src="../js/productos.js" type="module"></script>
</body>

</html>
