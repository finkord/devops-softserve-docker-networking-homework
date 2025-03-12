<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP HOME</title>
    <link rel="icon" type="image/x-icon" href="/Favicon/php_elephant.png" />
    <link rel="stylesheet" href="/style.css" />
</head>

<style>
    body {
        font-family: "Dited";
        font-weight: bold;
        background-color: #393646;
        margin: 0;

        /* min-height: auto; */
        justify-content: center;
        align-items: center;

        display: flex;
        flex-direction: column;
        color: #ffffff;
    }

    .parent {
        margin-top: 5px;
        gap: 10px;
    }

    .parent div a {
        margin: 10px 0;
    }

    a {
        margin: 5px;
    }
</style>

<body>
    <?php
    // require("./config.php");
    ?>
    <h1>PHP сторінка</h1>
    <h2>Студент: Володимир Фуфалько, група ІПЗ-24</h2>
    <h2>Варіант: №11</h2>

    <div id="php_slaves" class="parent">
        <div>
            <a href="./Lab9/index.php">Lab9</a>
            <a href="./Lab10/index.php">Lab10</a>
            <a href="./Lab12/index.php">Lab12</a>
        </div>
    </div>

    <a href="/index.html">На головну</a>

</body>

</html>