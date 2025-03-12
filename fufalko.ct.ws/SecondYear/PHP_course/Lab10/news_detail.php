<?php
require("../config.php");
$db_server = connectToDatabase();

if (isset($_GET['id'])) {
    $news_id = $_GET['id'];
    $select_news_query = "SELECT title, content, news_date FROM fufalko_news WHERE id = $news_id";
    $news_result = mysqli_query($db_server, $select_news_query);
    $news = mysqli_fetch_assoc($news_result);
} else {
    echo "Новина не знайдена.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Деталі новини</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2><?php echo $news['title']; ?></h2>
    <p>Дата: <?php echo $news['news_date']; ?></p>
    <div class="news-content">
        <p><?php echo nl2br($news['content']); ?></p>
    </div>

    <p><a href="task4.php">Повернутися</a></p>
</body>

</html>