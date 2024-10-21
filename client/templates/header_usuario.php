<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/e-commerce/server/config/db_connection.php';

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
}

$query = "SELECT profile_img FROM users WHERE id = $user_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $profile_img_url = $row['profile_img'];
} else {
  $profile_img_url = null;
} 
?>

<header class="w-full bg-gray-800 px-20">
  <div class="flex justify-between items-center p-4 max-w-[1200px] mx-auto">
    <div class="flex flex-row gap-3 items-center">
      <img src="/e-commerce/client/assets/HSLogo.png" alt="company logo" height="50" width="50" class="company-logo">
      <h1 class="text-3xl font-bold text-violet-300">HS Company</h1>
    </div>
    <nav>
      <ul class="flex items-center gap-4">
        <li><a href="/e-commerce/client/">
            <img src="/e-commerce/client/assets/icons/home.svg" alt="home icon" title="Inicio" width="20" height="20">
          </a></li>
        <li><a href="/e-commerce/client/views/productos.php">
            <img src="/e-commerce/client/assets/icons/store.svg" alt="productos icon" title="productos" width="20"
              height="20">
          </a></li>
        <li>
          <a href="/e-commerce/client/views/carrito.php">
            <img src="/e-commerce/client/assets/icons/cart.svg" alt="carrito icon" title="carrito" width="20"
              height="20">
          </a>
        </li>
        <li>
          <a href="/e-commerce/client/views/pedidos.php">
            <img src="/e-commerce/client/assets/icons/pedidos.svg" alt="pedidos icon" title="pedidos" width="20"
              height="15">
          </a>
        </li>
        <li>
          <div class="relative group">
            <a href="/e-commerce/client/views/perfil_usuario.php">
              <picture>
                <img src="<?php if (isset($profile_img_url)) echo $profile_img_url; else echo '/e-commerce/client/assets/default.webp'; ?>" alt="user icon" class="w-8 h-8 rounded-full object-cover">
              </picture>
            </a>
            <div class="w-48 absolute right-0 hidden bg-gray-800 text-white rounded-lg shadow-lg group-hover:block">
              <ul class="p-2">
                <li class="px-4 py-2 hover:bg-violet-600 cursor-pointer">
                  <a href="/e-commerce/client/views/perfil_usuario.php">Editar perfil</a>
                </li>
                <li class="px-4 py-2 hover:bg-violet-600 cursor-pointer" id="cerrar-sesion">
                  Cerrar sesión
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</header>

<script>
  document.getElementById('cerrar-sesion').addEventListener('click', () => {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/e-commerce/server/controllers/users/cerrar_sesion.php', true);

    // Manejar la respuesta de la solicitud
    xhr.onload = function () {
      if (xhr.status === 200) {
        // Redirigir al usuario a la página de inicio después de cerrar sesión
        window.location.href = '/e-commerce/client/';
      } else {
        // Mostrar un mensaje de error si la solicitud falla
        alert('Hubo un problema al cerrar sesión. Por favor, inténtelo de nuevo.');
      }
    };

    xhr.onerror = function () {
      alert('Error de red. No se pudo cerrar la sesión.');
    };

    xhr.send();
  });
</script>