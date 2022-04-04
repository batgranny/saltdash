<?php
$username = $_ENV["MYUSER"];
$password = $_ENV["MYPASS"];
$servername = $_ENV["MYHOST"];
$dbname = $_ENV["MYDB"];
$conn = new mysqli($servername, $username, $password, $dbname);
?>