<?php
$servername = "localhost";
$username = "root";
$password = "Jeeva@24";
$dbname = "jetcode_website_db";
$port = 3306;


$mysqli = new mysqli($servername, $username, $password, $dbname, $port);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    echo "Connected successfully<br>";
}

?>