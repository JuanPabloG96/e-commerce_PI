<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    
  </main>

  <?php include '../templates/footer.php' ?>

  <script type="module" src="../js/perfil-usuario.js"></script>
</body>
</html>