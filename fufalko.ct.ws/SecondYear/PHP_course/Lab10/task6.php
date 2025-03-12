<?php

$title = 'PHP';
require("../header.php");

$db_server = connectToDatabase();

?>

<h2>Додати новину</h2>

<form action="add_news.php" method="POST">
    <label for="category">Тематика:</label>
    <input type="text" id="category" name="category" required>

    <label for="title">Заголовок:</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Контент:</label>
    <textarea id="content" name="content" rows="4" cols="50" required></textarea>

    <label for="news_date">Дата новин:</label>
    <input type="date" id="news_date" name="news_date" value="<?php echo date('Y-m-d'); ?>" required>

    <input type="submit" value="Додати новину">
</form>

<a href="./index.php">← Назад</a>