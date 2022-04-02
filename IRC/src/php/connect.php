<?php
/*

    Handles user join event (join.php submit)

*/

function userCreated() {  
    session_start();
    include_once 'connection.php';
        $nick = mysqli_real_escape_string($conn, $_GET['nickname']);
        $tag = mysqli_real_escape_string($conn, $_GET['tag']);
        
        if (strlen($nick) == 0 || strlen($tag) == 0) {
            return 0;
        }

        $query_checknick = mysqli_query($conn, "SELECT * from irc_users WHERE user_nickname='$nick'");
        $res_checknick = mysqli_fetch_assoc($query_checknick);

        if ($res_checknick) {
            header("location: ../../join.php");
            exit();
            return 0;
        }

        $query0 = mysqli_query($conn, "SELECT * FROM irc_users ORDER BY ID DESC LIMIT 1");
        $res0 = mysqli_fetch_assoc($query0);
        
        $id = 0;
        if ($query0) {
            $id = $res0['id'] + 1;
        }
        $user_id = "usr" . $id;

        $query1 = mysqli_query($conn, "INSERT INTO irc_users (user_id, user_nickname, user_tag, user_privilege, id) values ('$user_id', '$nick', '$tag', 'user', '$id')");
        $_SESSION['user_id'] = $user_id; // Creating a session based on the user's unique id 
        header("location: ../../index.php");
        exit();
}

userCreated();

?>