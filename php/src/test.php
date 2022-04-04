<?php
$username = $_ENV["MYUSER"];
$password = $_ENV["MYPASS"];
$servername = $_ENV["MYHOST"];
$dbname = $_ENV["MYDB"];
echo "user: $username";
echo "password: $password";
echo "host: $servername";
echo "db: $dbname";
$conn = new mysqli($servername, $username, $password, $dbname);
// select query //
$sql = 'SELECT * FROM salt_returns';


if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) :
echo $user->id;
echo $user->fun;
endforeach; ?>
