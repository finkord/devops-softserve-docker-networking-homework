<?php
include_once("db.php");

$LastModified_unix = strtotime(date("D, d M Y H:i:s", filectime($_SERVER['SCRIPT_FILENAME'])));
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);

echo "<p>Файл був змінений: $LastModified" . "<br></P>";
