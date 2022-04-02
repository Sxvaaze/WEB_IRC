<?php
/* 

    Is used to load the chat (index.php)

*/
include_once 'connection.php';

$query = mysqli_query($conn, "SELECT * FROM messages ORDER BY message_id DESC LIMIT 42");
$msg_counter = 0;
$cmd_counter = 0;
$i = 0;
$messages = [];
while ($row = mysqli_fetch_assoc($query)) {
    $to_show = '<span class=msg ';
    if ($row['is_command'] == 0) {
        $to_show .= "msg" . $msg_counter;
        $msg_counter++;
    } else {
        $to_show .= "cmd" . $cmd_counter;
        $cmd_counter++;
    }
    $date = gmdate("Y-m-d - H:i:s", $row['unix_time']);
    $to_show = "[" . $date . "] (" . $row['sender_nickname'] . "#" . $row['sender_tag'] . " - " . $row['sender_user_id'] . "): " . $row['message_content'] . "</span><br>";
    $messages[$i++] = $to_show;
}

// Show the messages from last to first (most recent message is further down)
for ($i = count($messages) - 1; $i >= 0; $i--) { echo $messages[$i]; }

?>