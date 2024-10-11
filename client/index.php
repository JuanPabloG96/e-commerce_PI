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
    <section id="hero">
      <h2>Proyecto de Comercio Electrónico</h2>
      <p>Una aplicación de e-commerce simple y potente construida con PHP y MySQL</p>
      <a href="#">
        Empezar ahora
        <img src="src/assets/images/arrow-right.svg" alt="arrow right">
      </a>
    </section>

    <section id="about">
      <h3>Acerca del Proyecto</h3>
      <div>
        <p>
          Este proyecto consiste en el desarrollo de una aplicación de comercio electrónico simple utilizando
          PHP como lenguaje de programación y MySQL como sistema de gestión de bases de datos. La arquitectura
          de la aplicación es monolítica, lo que significa que todos los módulos del sistema están integrados
          en una única aplicación. Este enfoque es ideal para proyectos sencillos y es un buen punto de
          partida para aprender sobre el desarrollo de aplicaciones web.
        </p>
      </div>
    </section>

    <section id="modules">
      <h3>Módulos Implementados</h3>
      <div class="modules-cards"><!-- Informacion de los módulos --></div>
    </section>

    <section id="architecture">
      <h3>Arquitectura de la Aplicación</h3>
      <div>
        <div>
          <img src="src/assets/images/monolithic.svg" alt="monolithic">
        </div>
        <p>
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
