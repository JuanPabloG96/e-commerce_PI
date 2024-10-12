<!DOCTYPE html>
<html lang="es" class="bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HASHERS - Módulo de Pagos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        violet: {
                            300: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-violet-500 rounded-full mr-3"></div>
                <h1 class="text-2xl font-bold text-violet-300">HASHERS</h1>
            </div>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="text-gray-300 hover:text-violet-300">Inicio</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-violet-300">Carrito</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-violet-300">Pedidos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-violet-300 mb-6">Proceso de Pago</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-violet-300 mb-4">Detalles de Pago</h3>
                <form>
                    <div class="mb-4">
                        <label for="card-number" class="block text-sm font-medium text-gray-300 mb-2">Número de Tarjeta</label>
                        <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="expiry-date" class="block text-sm font-medium text-gray-300 mb-2">Fecha de Expiración</label>
                            <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/AA" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
                        </div>
                        <div>
                            <label for="cvv" class="block text-sm font-medium text-gray-300 mb-2">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder="123" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nombre en la Tarjeta</label>
                        <input type="text" id="name" name="name" placeholder="Juan Pérez" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
                    </div>
                    <div class="mb-6">
                        <label for="payment-method" class="block text-sm font-medium text-gray-300 mb-2">Método de Pago</label>
                        <select id="payment-method" name="payment-method" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
                            <option value="credit-card">Tarjeta de Crédito</option>
                            <option value="debit-card">Tarjeta de Débito</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-violet-600 text-white font-bold py-2 px-4 rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
                        Pagar $81.97
                    </button>
                </form>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-violet-300 mb-4">Resumen del Pedido</h3>
                <ul class="space-y-2 mb-4">
                    <li class="flex justify-between items-center">
                        <span class="text-gray-300">Producto 1 x 1</span>
                        <span class="text-gray-300">$19.99</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-gray-300">Producto 2 x 2</span>
                        <span class="text-gray-300">$49.98</span>
                    </li>
                    <li class="flex justify-between items-center border-t border-gray-700 pt-2 mt-2">
                        <span class="text-gray-300">Subtotal</span>
                        <span class="text-gray-300">$69.97</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-gray-300">Impuestos (10%)</span>
                        <span class="text-gray-300">$7.00</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-gray-300">Envío</span>
                        <span class="text-gray-300">$5.00</span>
                    </li>
                    <li class="flex justify-between items-center border-t border-gray-700 pt-2 mt-2">
                        <span class="font-semibold text-violet-300">Total</span>
                        <span class="font-semibold text-violet-300">$81.97</span>
                    </li>
                </ul>
                <div class="mb-4">
                    <label for="coupon" class="block text-sm font-medium text-gray-300 mb-2">Código de Descuento</label>
                    <div class="flex">
                        <input type="text" id="coupon" name="coupon" placeholder="Ingrese su código" class="flex-grow px-3 py-2 bg-gray-700 border border-gray-600 rounded-l-md text-white focus:outline-none focus:ring-2 focus:ring-violet-500">
                        <button class="px-4 py-2 bg-violet-600 text-white rounded-r-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
                            Aplicar
                        </button>
                    </div>
                </div>
                <div class="border-t border-gray-700 pt-4">
                    <h4 class="text-lg font-medium text-gray-300 mb-2">Dirección de Envío</h4>
                    <p class="text-gray-400">Juan Pérez</p>
                    <p class="text-gray-400">Calle Principal 123</p>
                    <p class="text-gray-400">Ciudad, Estado 12345</p>
                    <p class="text-gray-400">País</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-gray-300 py-6 mt-12">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2023 HASHERS. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
