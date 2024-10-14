-- Crear Tabla de Usuarios
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear Tabla de Productos
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear Tabla de Métodos de Pago
CREATE TABLE IF NOT EXISTS payment_methods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    card_number VARCHAR(16) NOT NULL,
    expiration_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Crear Tabla de Direcciones de Envío
CREATE TABLE IF NOT EXISTS shipping_addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    country VARCHAR(50) NOT NULL,
    state VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    address VARCHAR(255) NOT NULL,
    postal_code VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Crear Tabla de Pedidos
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'processing', 'shipped', 'delivered') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Crear Tabla de Detalles de Pedido
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Crear Tabla de Carrito de Compras
CREATE TABLE IF NOT EXISTS cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Inserción de Productos
INSERT INTO products (name, description, price) 
VALUES 
('Auriculares Inalámbricos', 'Auriculares Bluetooth con cancelación de ruido.', 59.99),
('Smartphone 5G', 'Teléfono inteligente con pantalla OLED y conectividad 5G.', 799.99),
('Laptop Ultrabook', 'Portátil ultraligero con procesador de última generación.', 1199.99),
('Smartwatch Deportivo', 'Reloj inteligente con seguimiento de actividad física.', 199.99),
('Monitor 4K', 'Monitor UHD de 27 pulgadas para trabajo y entretenimiento.', 349.99),
('Camiseta Básica', 'Camiseta de algodón 100% con corte clásico.', 19.99),
('Pantalones Jeans', 'Jeans de mezclilla ajustados de alta durabilidad.', 39.99),
('Chaqueta de Cuero', 'Chaqueta de cuero auténtico con diseño moderno.', 129.99),
('Vestido Casual', 'Vestido ligero para uso diario en días cálidos.', 49.99),
('Zapatos Deportivos', 'Zapatillas cómodas y transpirables para correr.', 69.99),
('Sofá Modular', 'Sofá cómodo y modular de tres plazas.', 499.99),
('Lámpara de Mesa', 'Lámpara de mesa con luz regulable y diseño minimalista.', 29.99),
('Cafetera Espresso', 'Cafetera automática para espresso y cappuccino.', 149.99),
('Colchón Ortopédico', 'Colchón de espuma con memoria para un descanso confortable.', 699.99),
('Juego de Sábanas', 'Sábanas suaves de algodón con alta densidad de hilos.', 59.99),
('Ventilador de Pie', 'Ventilador ajustable con tres velocidades.', 79.99),
('Olla a Presión', 'Olla rápida de acero inoxidable con válvula de seguridad.', 89.99),
('Aspiradora Robot', 'Aspiradora robot con navegación inteligente.', 249.99),
('Plancha de Vapor', 'Plancha de vapor con suela anti adherente.', 39.99);

-- Inserción de un Usuario de Prueba
INSERT INTO users (username, email, password) 
VALUES ('testuser', 'testuser@example.com', 'hashed_password'); 

-- Inserción de un Método de Pago de Prueba
INSERT INTO payment_methods (user_id, card_number, expiration_date) 
VALUES (1, '1234567812345678', '2025-12-31'); 

-- Inserción de una Dirección de Envío de Prueba
INSERT INTO shipping_addresses (user_id, country, state, city, address, postal_code) 
VALUES (1, 'Country', 'State', 'City', '123 Main St', '12345'); 

-- Inserción de un Pedido de Prueba
INSERT INTO orders (user_id, total_amount, status) 
VALUES (1, 100.00, 'pending'); 

-- Inserción de un Item en el Carrito de Compras
INSERT INTO cart_items (user_id, product_id, quantity) 
VALUES (1, 1, 2); 
