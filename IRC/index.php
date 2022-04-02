<?php 
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("location: join.php");
        exit();
    } 
    include_once 'src/php/connection.php';
?>

<!-- To-do: implement command functionality -->
<!DOCTYPE HTML>
<html>
    <!-- Head -->
    <head>
        <!-- Title -->
        <title>IRC | V1.0.0</title>
        <!-- Metas -->
        <meta charset="utf-8"></meta>
        <!-- CSS Stylesheets -->
        <link rel="stylesheet" href="src/css/main.css">
    </head>
    <!-- Body -->
    <body>
        <!-- Wrapper -->
        <div class="container">
            <!-- Chat Section (Loader) -->
            <div class="chat">
                <!-- Disconnect Form -->
                <form method="post" action="src/php/destroy.php" id="disc-form">
                    <button form="disc-form" class="btn_delete" name="btn_delete" type="submit"></button>
                </form>
                <div class="msgs">
                <?php 
                    include 'src/php/chat_load.php';
                ?>
                </div>
            </div>
            <!-- Message Prompter -->
            <div class="msg-prompt">
                <div class="msg-dialog">
                    <form class="msg-form" action="#" autocomplete="off">
                        <!-- To-do: make cursor start a bit on the right -->
                        <!-- To-do: Enter does not auto submit -->
                        <button form="msg-form" id="msg-send-btn" class="msg-send-btn" name="msg-send-btn" type="submit"><p id="btnText">>></p></button>
                        <input class="msg-content-text" id="msg-content-text" type="text" name="msg_content" maxlength="2048" autofocus></input>

                    </form>
                </div>
            </div>
            <!-- IRC Name / Creator / Info -->
            <!-- <div class="credits">
                <span class="irc-txt">GR-IRC V1.0.0 by </span><span class="creator">github.com/sxvaaze</span>
            </div> -->
        </div>
    </body>
</html>


<script src="js/send_message.js"></script>