<?php
mysqli_report(MYSQLI_REPORT_STRICT); 
$username = $_ENV["MYUSER"];
$password = $_ENV["MYPASS"];
$servername = $_ENV["MYHOST"];
$dbname = $_ENV["MYDB"];

try{
    $conn = new mysqli($servername, $username, $password, $dbname);
}
catch(Exception $e){
header('Location: /error.html');
die();
}
//$conn = new mysqli($servername, $username, $password, $dbname);

?>