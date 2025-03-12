<?php
$title = 'Laboratory 10 PHP';
require("../header.php");
$db_server = connectToDatabase();
?>

<a href="create_table.php">Скрипт створення таблиці fufalko_news</a>

<a href="get_data.php">Занести дані з файлу</a>

<a href="task3.php">Таблиця з fufalko_news</a>

<a href="task4.php">ukr.net</a>

<a href="task5.php">Видалити новину id=3</a>

<a href="task6.php">Добавити новину в таблицю</a>

<?php require("../footer.php"); ?>