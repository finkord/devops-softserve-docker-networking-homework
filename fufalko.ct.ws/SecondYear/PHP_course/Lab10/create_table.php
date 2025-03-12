<?php
require("../db.php");
$db_server = connectToDatabase();

mysqli_query($db_server, "DROP TABLE IF EXISTS fufalko_news");

mysqli_query($db_server, "DROP SEQUENCE IF EXISTS fufalko_sequence");

mysqli_query(
    $db_server,
    "CREATE SEQUENCE IF NOT EXISTS fufalko_sequence 
        MINVALUE 1000 
        MAXVALUE 1999 
        START WITH 1000
        INCREMENT BY 1"
);

mysqli_query(
    $db_server,
    "CREATE TABLE IF NOT EXISTS fufalko_news (
    id INT PRIMARY KEY DEFAULT nextval(fufalko_sequence),
    category VARCHAR(100),
    title VARCHAR(255) UNIQUE,
    content TEXT,
    news_date DATE DEFAULT CURRENT_DATE
    );"
);

mysqli_query(
    $db_server,
    "ALTER TABLE fufalko_news CONVERT TO CHARACTER SET utf8"
);

header("Location: index.php");
exit;
