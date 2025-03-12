<?php
require("../config.php");
$db_server = connectToDatabase();

$main_news_result = mysqli_query(
    $db_server,
    "SELECT id, title, news_date FROM fufalko_news ORDER BY news_date DESC LIMIT 3"
);

$categories_result = mysqli_query(
    $db_server,
    "SELECT DISTINCT category FROM fufalko_news"
);

// Отримуємо загальну кількість новин
$count_query = "SELECT COUNT(*) as total_news FROM fufalko_news";
$count_result = mysqli_query($db_server, $count_query);
$count_row = mysqli_fetch_assoc($count_result);
$total_news = $count_row['total_news'];

// Записуємо загальну кількість новин в файл
$file = fopen('file/out.txt', 'w');
fwrite($file, "Загальна кількість новин: " . $total_news);
fclose($file);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новини</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Головне</h2>
    <div class="main-news">
        <?php
        while ($row = mysqli_fetch_object($main_news_result)) {
            echo "<div class='news-item'>
                    <a href='news_detail.php?id=" . $row->id . "'>
                        <h3>" . $row->title . "</h3>
                        <p>" . $row->news_date . "</p>
                    </a>
                </div>";
        }
        ?>
    </div>

    <h2>Тематики новин</h2>
    <div class="categories">
        <?php
        while ($category = mysqli_fetch_assoc($categories_result)) {
            $category_name = $category['category'];
            echo "<h3><a href='category_news.php?category=" . urlencode($category_name) . "'>" . $category_name . "</a></h3>";

            // Отримуємо три найновіші новини для кожної тематики
            $select_category_news_query = "SELECT id, title, news_date FROM fufalko_news 
                                           WHERE category = '$category_name' 
                                           ORDER BY news_date DESC LIMIT 3";
            $category_news_result = mysqli_query($db_server, $select_category_news_query);

            echo "<ul>";
            while ($news = mysqli_fetch_assoc($category_news_result)) {
                echo "<li>
                        <a href='news_detail.php?id=" . $news['id'] . "'>
                            " . $news['title'] . " - " . $news['news_date'] . "
                        </a>
                      </li>";
            }
            echo "</ul>";
        }
        ?>
    </div>

    <a href="./index.php">← Назад</a>
</body>

</html>