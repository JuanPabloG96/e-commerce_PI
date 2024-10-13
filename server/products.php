<?php
require 'db_connection.php';

// Función para obtener todos los productos
function getAllProducts() {
    global $conn;
    $result = $conn->query('SELECT * FROM products');
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Función para obtener un producto por ID
function getProductById($id) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Función para añadir un nuevo producto
function addProduct($name, $description, $price, $stock, $category) {
    global $conn;
    $stmt = $conn->prepare('INSERT INTO products (name, description, price, stock, category) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('ssdis', $name, $description, $price, $stock, $category);
    return $stmt->execute();
}

// Función para actualizar un producto
function updateProduct($id, $name, $description, $price, $stock, $category) {
    global $conn;
    $stmt = $conn->prepare('UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category = ? WHERE id = ?');
    $stmt->bind_param('ssdisi', $name, $description, $price, $stock, $category, $id);
    return $stmt->execute();
}

// Función para eliminar un producto
function deleteProduct($id) {
    global $conn;
    $stmt = $conn->prepare('DELETE FROM products WHERE id = ?');
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}