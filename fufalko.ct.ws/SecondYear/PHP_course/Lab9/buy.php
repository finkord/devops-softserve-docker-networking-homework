<?php
$title = 'PHP';
require("../header.php");
$db_server = connectToDatabase();

$id = intval($_POST['id']);
$buy_quantity = intval($_POST['quantity']);

$result = mysqli_query($db_server, "SELECT quantity FROM storehouse WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['buy'])) {
    if ($row['quantity'] >= $buy_quantity) {
        mysqli_query($db_server, "UPDATE storehouse SET quantity = quantity - $buy_quantity WHERE id = $id");
        echo "Покупка успішна!✅ <a href='task5-6.php'>Повернутися</a>";
    } else {
        echo "Недостатньо товару на складі!❌ <a href='task5-6.php'>Повернутися</a>";
    }
} elseif (isset($_POST['restock'])) {
    mysqli_query($db_server, "UPDATE storehouse SET quantity = quantity + $buy_quantity WHERE id = $id");
    echo "Склад успішно поновлено!✅ <a href='task5-6.php'>Повернутися</a>";
}
