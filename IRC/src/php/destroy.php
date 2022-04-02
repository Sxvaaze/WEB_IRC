<?php
/*

    Handles destroying a user's connection to the irc (exit button in index.php)

*/


function destroy() { 
    session_start();
    if (isset($_POST['btn_delete'])) {
        include_once 'connection.php';
        $f = 'user_id';
        $sql = "DELETE FROM irc_users WHERE user_id='$_SESSION[$f]'";
        mysqli_query($conn, $sql);
        session_destroy();
        header("location: ../../join.php");
        exit();
    } else {
        if (isset($_SESSION['user_id'])) {
            header("location: ../../index.php");
        } else {
            header("location: ../../join.php");
        }
    }
}

destroy();

?>