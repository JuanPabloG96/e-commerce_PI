<header class="w-full bg-gray-800 px-20">
    <div class="flex justify-between items-center p-4 max-w-[1200px] mx-auto">
      <div class="flex flex-row gap-3 items-center">
        <img src="/e-commerce/client/src/assets/HSLogo.png" alt="company logo" height="50" width="50" class="company-logo">
        <h1 class="text-3xl font-bold text-violet-300">HS Company</h1>
      </div>
      <nav>
        <ul class="flex items-center gap-4">
          <li><a href="/e-commerce/client/">
            <img src="/e-commerce/client/src/assets/icons/home.svg" alt="home icon" title="Inicio" width="20" height="20">
          </a></li>
          <li><a href="/e-commerce/client/src/views/productos.php">
            <img src="/e-commerce/client/src/assets/icons/store.svg" alt="productos icon" title="productos" width="20" height="20" >
          </a></li>
          <li>
            <a href="/e-commerce/client/src/views/carrito.php" >
              <img src="/e-commerce/client/src/assets/icons/cart.svg" alt="carrito icon" title="carrito" width="20" height="20">
            </a>
          </li>
          <li>
          <div class="relative group">
            <a href="/e-commerce/client/src/views/perfil_usuario.php">
              <img src="" alt="avatar usuario" class="avatar h-10 w-10 rounded-full" onerror="this.onerror=null; this.src='/e-commerce/server/uploads/default.webp';">
            </a>
            <div class="w-48 absolute right-0 hidden bg-gray-800 text-white rounded-lg shadow-lg group-hover:block">
              <ul class="p-2">
                <li class="px-4 py-2 hover:bg-violet-600 cursor-pointer">
                  <a href="/e-commerce/client/src/views/perfil_usuario.php">Editar perfil</a>
                </li>
                <li class="px-4 py-2 hover:bg-violet-600 cursor-pointer">
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