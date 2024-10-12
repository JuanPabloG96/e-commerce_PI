<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/styles/main.css">
  <title>HASHERS - Proyecto de Comercio Electrónico</title>
</head>

<body>
  <?php include 'src/templates/header.php'; ?>

  <main>
    <section class="hero" id="hero">
      <h2 class="title hero-title">Proyecto de Comercio Electrónico</h2>
      <p class="subtitle hero-subtitle">Una aplicación de e-commerce simple y potente construida con PHP y MySQL</p>
    </section>

    <section id="about" class="section">
      <h3 class="title">Acerca del Proyecto</h3>
      <div class="container">
        <p class="description">
          Este proyecto consiste en el desarrollo de una aplicación de comercio electrónico simple utilizando
          PHP como lenguaje de programación y MySQL como sistema de gestión de bases de datos. La arquitectura
          de la aplicación es monolítica, lo que significa que todos los módulos del sistema están integrados
          en una única aplicación. Este enfoque es ideal para proyectos sencillos y es un buen punto de
          partida para aprender sobre el desarrollo de aplicaciones web.
        </p>
      </div>
    </section>

    <section id="modules" class="section">
      <h3 class="title">Módulos Implementados</h3>
      <div class="modules-cards"><!-- Información de los módulos --></div>
    </section>

    <section id="architecture" class="section">
      <h3 class="title">Arquitectura de la Aplicación</h3>
      <div class="container">
        <div>
          <img src="src/assets/images/monolithic.svg" alt="monolithic" height="80" width="80">
        </div>
        <p class="description">
          La arquitectura del sistema se basa en el enfoque monolítico, donde todos los módulos como la
          gestión de productos, el carrito de compras, la autenticación de usuarios, el procesamiento de pagos
          y la base de datos están fuertemente acoplados y se ejecutan como una única aplicación. Esto
          proporciona simplicidad en la implementación y gestión del sistema.
        </p>
      </div>
    </section>
  </main>

  <?php include 'src/templates/footer.php' ?>

  <script src="src/js/main.js" type="module"></script>
</body>

</html>
