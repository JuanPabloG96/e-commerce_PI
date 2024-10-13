<?php
require 'db_connection.php';

try {
    $sql = file_get_contents('create_database.sql');
    if ($mysqli->multi_query($sql)) {
        do {
            if ($result = $mysqli->store_result()) {
                $result->free();
            }
        } while ($mysqli->next_result());
    }
    echo "Base de datos y tablas creadas con éxito.";
} catch (Exception $e) {
    echo "Error al crear la base de datos: " . $e->getMessage();
}