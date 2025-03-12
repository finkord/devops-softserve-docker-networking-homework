<?php
function connectToDatabase()
{
    $db_name    = 'fufalkoDB';
    $db_host    = 'db';
    $db_user    = 'root';
    $db_pass    = 'root';

    $db_server = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$db_server) {
        die("Error: Unable to connect to database. " . mysqli_connect_error());
    }

    // if ($db_server) {
    //     echo "db.php: good connect to db_server = $db_host, $db_user, $db_name <br>";
    // }

    mysqli_set_charset($db_server, "utf8");

    return $db_server;
}
