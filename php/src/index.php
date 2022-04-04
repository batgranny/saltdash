<?php
$servername = "192.168.68.107";
$username = "salt";
$password = "spartans162";
$dbname = "salt";
$testy = $_SERVER["FROMENV"];

$conn = new mysqli($servername, $username, $password, $dbname);

// select query //
// $sql = 'SELECT * FROM salt_returns';
$sql = "SELECT * from salt_returns WHERE jid = '20220402084729473204'";

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) : ?>
  <? echo $user->return; 
echo "<pre>"; 
echo json_encode(json_decode($user->return), JSON_PRETTY_PRINT); 
echo "</pre>";
  ?>
 <? endforeach; ?>



   <table>
     <tr>
       <td>Minion</td>
       <td>Command</td>
       <td>Status</td>
       <td>Time</td>
       <td>Test</td>
     </tr>
     <? foreach ($users as $user) : ?>
     <tr>
       <td><? echo $user->return; ?></td>
       <td><? echo $user->fun; ?></td>
       <td><? echo $user->success; ?></td>
       <td><? echo $user->alter_time; ?></td>
       <td><? if ($user->success > "0"){ echo "success";} else { echo "failed"; } ?></td>
     </tr>

     <? endforeach; ?>
   </table>


