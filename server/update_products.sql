-- Agregar la columna imgSrc a la tabla 'products'
ALTER TABLE products ADD COLUMN imgSrc VARCHAR(255);

-- Actualizar la columna imgSrc con los datos proporcionados
UPDATE products
SET imgSrc = CASE 
    WHEN id = 1 THEN '/e-commerce/client/src/assets/productos/auriculares.webp'
    WHEN id = 2 THEN '/e-commerce/client/src/assets/productos/smartphone.webp'
    WHEN id = 3 THEN '/e-commerce/client/src/assets/productos/laptop.webp'
    WHEN id = 4 THEN '/e-commerce/client/src/assets/productos/smartwatch.webp'
    WHEN id = 5 THEN '/e-commerce/client/src/assets/productos/monitor4k.webp'
    WHEN id = 6 THEN '/e-commerce/client/src/assets/productos/camiseta.webp'
    WHEN id = 7 THEN '/e-commerce/client/src/assets/productos/jeans.webp'
    WHEN id = 8 THEN '/e-commerce/client/src/assets/productos/chaqueta.webp'
    WHEN id = 9 THEN '/e-commerce/client/src/assets/productos/vestido.webp'
    WHEN id = 10 THEN '/e-commerce/client/src/assets/productos/tenis.webp'
    WHEN id = 11 THEN '/e-commerce/client/src/assets/productos/sofa.webp'
    WHEN id = 12 THEN '/e-commerce/client/src/assets/productos/lampara.webp'
    WHEN id = 13 THEN '/e-commerce/client/src/assets/productos/cafetera.webp'
    WHEN id = 14 THEN '/e-commerce/client/src/assets/productos/colchon.webp'
    WHEN id = 15 THEN '/e-commerce/client/src/assets/productos/sabanas.webp'
    WHEN id = 16 THEN '/e-commerce/client/src/assets/productos/ventilador.webp'
    WHEN id = 17 THEN '/e-commerce/client/src/assets/productos/olla.webp'
    WHEN id = 18 THEN '/e-commerce/client/src/assets/productos/aspiradora.webp'
    WHEN id = 19 THEN '/e-commerce/client/src/assets/productos/plancha.webp'
END
WHERE id IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19);
