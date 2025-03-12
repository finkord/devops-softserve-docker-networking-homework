<?php
$title = 'Видалити новину';
require("../header.php");

$db_server = connectToDatabase();

// Якщо натиснута кнопка для видалення
if (isset($_POST['delete_news'])) {
    // Запит на видалення новини за порядковим номером (id)
    $deleteQuery = "DELETE FROM fufalko_news WHERE id = 3";

    if (mysqli_query($db_server, $deleteQuery)) {
        echo "<p>Новина з порядковим номером 3 успішно видалена!</p>";
    } else {
        echo "<p>Помилка видалення новини: " . mysqli_error($db_server) . "</p>";
    }
}

// Запит для отримання всіх новин, крім контенту
$query = "SELECT id, category, title, news_date FROM fufalko_news";
$result = mysqli_query($db_server, $query);

?>

<h2>Список новин</h2>

<form method="POST">
    <input type="submit" name="delete_news" value="Видалити новину з порядковим номером 3">
</form>
<br>

<table width="95%" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Тематика</th>
            <th>Заголовок</th>
            <th>Дата новини</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Перевірка, чи є результати в базі даних
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['news_date']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Немає новин для відображення.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Закриття з'єднання з базою даних
mysqli_close($db_server);
?>

<a href="./index.php">← Назад</a>