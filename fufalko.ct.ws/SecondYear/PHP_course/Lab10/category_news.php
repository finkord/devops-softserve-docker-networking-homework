<?php
$title = 'Category News';
require("../config.php");

// Підключення до бази даних
$db_server = connectToDatabase();

$get_value = trim(urldecode($_GET['category']));

// Перевірка, чи підключення успішне
if (!$db_server) {
    die("Помилка підключення: " . mysqli_connect_error());
}

// Підготовлений запит
$stmt = mysqli_prepare(
    $db_server,
    "SELECT title, content, news_date FROM fufalko_news WHERE category = ?"
);

mysqli_stmt_bind_param($stmt, "s", $get_value);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .news-title {
            font-weight: bold;
            font-size: 1.2em;
        }

        .news-content {
            font-size: 1em;
            color: #333;
        }

        .news-date {
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>

<body>

    <h1>Новини категорії: <?php echo htmlspecialchars($get_value); ?></h1>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>Заголовок</th>
                <th>Зміст</th>
                <th>Дата публікації</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td class="news-title"><?php echo htmlspecialchars($row['title']); ?></td>
                    <td class="news-content"><?php echo nl2br(htmlspecialchars($row['content'])); ?></td>
                    <td class="news-date"><?php echo htmlspecialchars($row['news_date']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Новин у цій категорії немає.</p>
    <?php endif; ?>

    <p><a href="task4.php">Повернутися</a></p>

</body>

</html>

<?php
// Закриття підключення
mysqli_stmt_close($stmt);
mysqli_close($db_server);
?>