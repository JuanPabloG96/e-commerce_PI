<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <title>HASHERS - Módulo de Usuario</title>
</head>

<body>
  <?php include "../templates/header.php"?>

  <main>
    <h2>Módulo de Usuario</h2>

    <div>
      <div>
        <h3>Iniciar Sesión</h3>
        <form>
          <div>
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email">
          </div>
          <div>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password">
          </div>
          <button type="submit">Iniciar Sesión</button>
        </form>
      </div>

      <div>
        <h3>Registrarse</h3>
        <form>
          <div>
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name">
          </div>
          <div>
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email">
          </div>
          <div>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password">
          </div>
          <button type="submit">Registrarse</button>
        </form>
      </div>
    </div>
  </main>

  <?php include "../templates/footer.php"?>
</body>

</html>
