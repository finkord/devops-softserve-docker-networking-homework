<?php
$title = 'PHP';
require("../header.php");
$db_server = connectToDatabase();

$id = intval($_GET['id']);
$result = mysqli_query($db_server, "SELECT * FROM storehouse WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>

<h2><?php echo $row['product_name']; ?></h2>
<img style="border-radius:10px" src="files/<?php echo $row['image']; ?>" width="350"><br>
Ціна: <?php echo $row['price']; ?> грн<br>
В наявності: <?php echo $row['quantity']; ?> шт.<br><br>

<form action="buy.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="number" name="quantity" value="1" min="1">
    <input type="submit" name="buy" value="Купити">
    <input type="submit" name="restock" value="Поповнити склад">
</form>

<a href="./task5-6.php">← Назад до каталогу</a>
<!-- max="<?php echo $row['quantity']; ?>" -->