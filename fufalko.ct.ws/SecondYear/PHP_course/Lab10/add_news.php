<?php

$title = 'PHP';
require("../header.php");

$db_server = connectToDatabase();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Отримання значень з форми
    $category = mysqli_real_escape_string($db_server, trim($_POST['category']));
    $title = mysqli_real_escape_string($db_server, trim($_POST['title']));
    $content = mysqli_real_escape_string($db_server, trim($_POST['content']));
    $news_date = mysqli_real_escape_string($db_server, trim($_POST['news_date']));

    // Запит на додавання новини до таблиці
    $query = "INSERT INTO fufalko_news (category, title, content, news_date) 
              VALUES ('$category', '$title', '$content', '$news_date')";

    // Виконання запиту
    if (mysqli_query($db_server, $query)) {
        echo "<p>Новину успішно додано!</p>";
    } else {
        echo "<p>Помилка додавання новини: " . mysqli_error($db_server) . "</p>";
    }

    echo "<a href='index.php'>Повернутися</a>";

    // Перенаправлення назад на сторінку зі списком новин після успішного додавання
    // header("Location: index.php");
    // exit;
}

mysqli_close($db_server);
