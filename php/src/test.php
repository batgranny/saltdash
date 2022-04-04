<?php
include 'dbconn.php';
$searchres = $_GET['search'];

if ($searchres == "Success"){
    $searchres = "0";
}elseif ($searchres == "Fail"){
    $searchres = "1";

}

$sql = "SELECT * from salt_returns WHERE id LIKE '%".$searchres."%' UNION SELECT * from salt_returns WHERE fun LIKE '%".$searchres."%' UNION SELECT * from salt_returns WHERE jid LIKE '%".$searchres."%' UNION SELECT * from salt_returns WHERE alter_time LIKE '%".$searchres."%' UNION SELECT * from salt_returns WHERE success LIKE '%".$searchres."%'
";

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}
?>
<? 
if (empty($users)){
    echo "No result";
}else{
    foreach ($users as $user) :
    echo $user->id; 
    endforeach; 
}
?>