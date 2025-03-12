<?php
$title = 'PHP';
require("../header.php");
$db_server = connectToDatabase();

// mysqli_query($db_server, "CREATE TABLE IF NOT EXISTS storehouse(
// id INT AUTO_INCREMENT PRIMARY KEY,
// product_name VARCHAR(255) NOT NULL,
// image VARCHAR(255) NOT NULL,
// price DECIMAL(10,2) NOT NULL,
// quantity INT NOT NULL
// )");

// mysqli_query($db_server, "INSERT IGNORE INTO storehouse (product_name, image, price, quantity) VALUES
// ('Chocolate cake', 'chocolate_cake.jpg', 350.00, 10),
// ('Napoleon cake', 'napoleon.jpg', 120.00, 15),
// ('Eclair with cream', 'eclair.jpg', 60.00, 20),
// ('Croissant with chocolate', 'croissant.jpg', 50.00, 25);
// ");

$result = mysqli_query($db_server, "SELECT * FROM storehouse");

mysqli_close($db_server);
?>

<div class='image-container'>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div>
            <div>
                <a href="product.php?id=<?= $row['id'] ?>">
                    <img src="files/<?= $row['image'] ?>" alt="<?= $row['product_name'] ?>"> <br>
                </a>
            </div>
            <div align="center">
                <?= $row['product_name'] ?><br>
                Ціна: <?= $row['price'] ?> грн <br>
                В наявності: <?= $row['quantity'] ?> шт.
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php require_once("style.php"); ?>

<?php require("../footer.php"); ?>