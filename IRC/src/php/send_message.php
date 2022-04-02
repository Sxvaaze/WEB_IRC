<?php
/* 

    Handles message sending.

*/

include_once 'connection.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $msg = mysqli_real_escape_string($conn, $_POST['msg_content']);
    if (!empty($msg)) {
        $arg = 'user_id';
        $sql = mysqli_query($conn, "SELECT * from irc_users WHERE user_id = '$_SESSION[$arg]'");
        $res = mysqli_fetch_assoc($sql);
    
        $query0 = mysqli_query($conn, "SELECT * FROM messages ORDER BY message_id DESC LIMIT 1");
        $msg_id = 0;
        if ($query0) {
            $res0 = mysqli_fetch_assoc($query0);
            $msg_id = $res0['message_id'] + 1;
        }
    
    
        $time = time();
        $user_id = $res['user_id'];
        $sender_nickname = $res['user_nickname'];
        $sender_tag = $res['user_tag'];
        $is_command = 0;
        $new_msg = $msg;

        if (mb_substr($new_msg, 0, 1) == '/') {
            $is_command = 1;
        }

        if ($is_command == 1) {
            $args = explode(" ", $msg);
            switch ($args[0]) {
                case 'kick':
                    include_once 'cmds/kick.php';
                    break;
                default:
                    break;
            }

        }
        
        $sql_msg = mysqli_query($conn, "INSERT INTO messages (message_id, message_content, sender_user_id, sender_nickname, sender_tag, unix_time, is_command) VALUES ('$msg_id', '$msg', '$user_id', '$sender_nickname', '$sender_tag', '$time', '$is_command')");
    }

    
} else {
    header('../../join.php');
    exit();
}

?>