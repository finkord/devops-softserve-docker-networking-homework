<?php $title; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'PHP'; ?></title>
    <link rel="icon" type="image/x-icon" href="/Favicon/php_elephant.png" />
    <link rel="stylesheet" href="/SecondYear/PHP_course/basicStyle.css" />

    <style>
        body {
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            padding-bottom: 20px;
        }

        p {
            max-width: 80%;
        }

        section p {
            max-width: 100%;
        }

        section h2 {
            max-width: 100%;
        }

        section form {
            width: auto;
            max-width: 100%;
            background-color: #393646;
        }

        h2 {
            margin-bottom: 20px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            max-width: 80%;
        }
    </style>
</head>

<body>
    <?php
    try {
        require("config.php");
    } catch (\Throwable $e) {
        echo "This was caught: " . $e->getMessage();
    }
    ?>