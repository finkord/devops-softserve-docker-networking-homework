<?php
require("../db.php");
$db_server = connectToDatabase();

mysqli_query(
    $db_server,
    "DELETE FROM fufalko_news"
);

$file = "file/news.txt";

$fdata_my = fopen($file, "r") or die("Can't open file $file!");

$mas = fread($fdata_my, filesize($file));

$mas = explode("&", $mas);

foreach ($mas as $item) {
    $mas_vidm = explode("~", $item);

    // Перевірка на наявність усіх необхідних частин
    if (count($mas_vidm) == 4) {
        // Підготовка SQL-запиту
        $stmt = mysqli_prepare($db_server, "INSERT INTO fufalko_news (category, title, content, news_date) VALUES (?, ?, ?, ?)");

        // Перевірка на успішне створення запиту
        if ($stmt === false) {
            die("Помилка підготовки запиту: " . mysqli_error($db_server));
        }

        $mas_vidm[0] = trim($mas_vidm[0]);
        $mas_vidm[1] = trim($mas_vidm[1]);
        $mas_vidm[2] = trim($mas_vidm[2]);
        $mas_vidm[3] = trim($mas_vidm[3]);

        // Прив'язка параметрів до запиту
        mysqli_stmt_bind_param($stmt, "ssss", $mas_vidm[0], $mas_vidm[1], $mas_vidm[2], $mas_vidm[3]);

        // Виконання запиту
        if (!mysqli_stmt_execute($stmt)) {
            die("Помилка виконання запиту: " . mysqli_stmt_error($stmt));
        }

        // Закриття запиту
        mysqli_stmt_close($stmt);
    }
}

fclose($fdata_my);

header("Location: index.php");
exit;
