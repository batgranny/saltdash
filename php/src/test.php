<?php
include 'dbconn.php';

$sql = 'SELECT * FROM salt_returns ORDER BY jid DESC';

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}
?>
<? foreach ($users as $user) :
    echo $user->full_ret; 
endforeach; ?>

$input_line = '"__sls__": "alcali.user.present",'; 
$input_line = '{
    "user_|-alcali-user-present_|-alcali_|-present": {
        "name": "alcali",
        "changes": {},
        "result": true,
        "comment": "User alcali is present and up to date",
        "__sls__": "alcali.user.present",
        "__run_num__": 0,
        "start_time": "10:00:15.366791",
        "duration": 38.585,
        "__id__": "alcali-user-present"
    },
    "group_|-alcali-group-present_|-alcali_|-present": {
        "name": "alcali",
        "changes": {},
        "result": true,
        "comment": "Group alcali is present and up to date",
        "__sls__": "alcali.user.present",
        "__run_num__": 1,
        "start_time": "10:00:15.408277",
        "duration": 7.566,
        "__id__": "alcali-group-present"
    },';

preg_match('/(?<=sls__": ").*?(?=\.|")/', $input_line, $output_array);
echo "$output_array[0]";
?>