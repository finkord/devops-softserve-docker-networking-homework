CREATE TABLE IF NOT EXISTS storehouse (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
);

INSERT INTO storehouse (product_name, image, price, quantity) VALUES
('Chocolate cake', 'chocolate_cake.jpg', 350.00, 10),
('Napoleon cake', 'napoleon.jpg', 120.00, 15),
('Eclair with cream', 'eclair.jpg', 60.00, 20),
('Croissant with chocolate', 'croissant.jpg', 50.00, 25)
ON DUPLICATE KEY UPDATE product_name = VALUES(product_name);
