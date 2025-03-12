<?php

$title = 'PHP';
require("../header.php");

// Підключення до бази даних
$db_server = connectToDatabase();

// Запит для вибірки всіх даних з таблиці last_name_news
$query = "SELECT * FROM fufalko_news";
$result = mysqli_query($db_server, $query);

// Перевірка на помилки
if (!$result) {
    die("Помилка виконання запиту: " . mysqli_error($db_server));
}

echo '<h2>Всі новини</h2>';
echo '<table width="95%" border="1" cellpadding="5" cellspacing="0">';
echo '<tr>
        <th>ID</th>
        <th>Тематика</th>
        <th>Заголовок</th>
        <th>Контент</th>
        <th>Дата новин</th>
      </tr>';

// Перебір і виведення кожного рядка з результатів
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['id']) . '</td>';
    echo '<td>' . htmlspecialchars($row['category']) . '</td>';
    echo '<td>' . htmlspecialchars($row['title']) . '</td>';
    echo '<td>' . htmlspecialchars($row['content']) . '</td>';
    echo '<td>' . htmlspecialchars($row['news_date']) . '</td>';
    echo '</tr>';
}

echo '</table>';

// Закриття з'єднання з базою даних
mysqli_free_result($result);
mysqli_close($db_server);
?>
<a href="./index.php">← Назад</a>