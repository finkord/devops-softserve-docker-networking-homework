<?php
$title = 'PHP';
require("../header.php");
$db_server = connectToDatabase();

// mysqli_query($db_server, "drop table dusc");
mysqli_query($db_server, "CREATE TABLE IF NOT EXISTS dusc(id integer PRIMARY KEY AUTO_INCREMENT, name_d varchar(100) UNIQUE, key_concept varchar(250))");
mysqli_query($db_server, "INSERT IGNORE INTO dusc (name_d, key_concept) VALUES ('Networks', 'HTTPS')");
mysqli_query($db_server, "INSERT IGNORE INTO dusc (name_d, key_concept) VALUES ('AI','Modeling')");
?>

<table border="2">
    <h2>Fetch result:</h2>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Key concept</th>
    </tr>
    <?php
    $query_res = mysqli_query($db_server, "select * from dusc");

    if (mysqli_num_rows($query_res) > 0) {
        while ($row = mysqli_fetch_row($query_res)) {
            echo "<tr><td>$row[0]</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>";
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db_server);
    ?>
</table>

<br>
<hr style="width:40%">
<a href="index.php">На головну</a>
</body>

</html>