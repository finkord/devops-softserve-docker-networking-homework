<?php
$title = 'PHP';
require("../header.php");
$db_server = connectToDatabase();

// mysqli_query($db_server, "drop table user");
// mysqli_query($db_server, "INSERT IGNORE INTO user(age,login,password) VALUES (19,'volodymyr','12345678'),(19,'fushtei','1111'),(19,'hodak','2222')");

mysqli_query($db_server, "CREATE TABLE IF NOT EXISTS user(id INTEGER PRIMARY KEY AUTO_INCREMENT, age INTEGER, login VARCHAR(250) UNIQUE, password VARCHAR(100))");

if (isset($_POST["age"], $_POST["login"], $_POST["password"])) {
    $age = $_POST["age"];
    $login = $_POST["login"];
    $password = $_POST["password"];

    try {
        $result = mysqli_query($db_server, "INSERT IGNORE INTO user(age, login, password) VALUES ('$age', '$login', '$password')");
    } catch (\Throwable $e) {
        echo "This was caught: " . $e->getMessage();
    }
    if ($result) {
        echo "<p>User successfully added!</p>";
    }
}
?>
<style>
    form {
        width: 250px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
    }

    table {
        margin: 1em;
    }
</style>

<form action="" method="POST">
    <input type="number" name="age" placeholder="Your age:" required>
    <input type="text" name="login" placeholder="Your login:" required>
    <input type="password" name="password" placeholder="Your password:" required>
    <input type="submit" value="Sign up!">
</form>

<table border="2">
    <tr>
        <th>ID</th>
        <th>Login</th>
        <th>Age</th>
        <th>Password</th>
    </tr>

    <?php
    //  $query_res1 = mysqli_query($db_server, "delete from user where id='3'");

    $query_res = mysqli_query($db_server, "select * from user order by id");

    if (mysqli_num_rows($query_res) > 0) {
        while ($row = mysqli_fetch_assoc($query_res)) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["login"] . "</td><td>" . $row["age"] . "</td><td>" . $row["password"] . "</td></tr>";
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db_server);
    ?>
</table>

<?php require("../footer.php"); ?>