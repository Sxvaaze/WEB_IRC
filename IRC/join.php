<?php 
    session_start();
    if (isset($_SESSION['user_id'])) {
        header("location: index.php");
        exit();
    }
    include_once 'src/php/connection.php';
?>

<!-- To-do: Add support for 'already taken' front-end. -->
<!DOCTYPE HTML>
<html>
    <!-- Head -->
    <head>
        <!-- Title -->
        <title>IRC | V1.0.0</title>
        <!-- Metas -->
        <meta charset="utf-8"></meta>
        <!-- CSS Stylesheets -->
        <link rel="stylesheet" href="src/css/join.css">
        <link rel="stylesheet" type="text/css" href="src/vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="src/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="src/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="src/fonts/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="src/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="src/vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="src/vendor/daterangepicker/daterangepicker.css">
    </head>
    <!-- Body -->
    <body>
        <!-- Page -->
        <div class="limiter">
            <!-- Container -->
            <div class="container-login100">
                <!-- Join Wraper -->
                <div class="wrap-login100">
                    <!-- Join Form -->
                    <form class="login100-form validate-form" action="src/php/connect.php" id="connect-form">
                        <!-- Join Logo -->
                        <span class="login100-form-logo"> <i class="zmdi zmdi-landscape"></i></span><br>

                        <!-- Join Header -->
                        <span class="login100-form-title p-b-34 p-t-27"> IRC Connection Page </span><br>

                        <!-- Connection Error -->
                        
                        <!-- Join Nickname Input -->
                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" type="text" name="nickname" maxlength="32" placeholder="Nickname" required autocomplete="off">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <!-- Join Tag Input -->
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="text" name="tag" placeholder="Tag" maxlength="6" required autocomplete="off">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <!-- Join Btn -->
                        <div class="container-login100-form-btn">
                            <button form="connect-form" class="login100-form-btn" type="submit" name="submit-btn">Connect </button>
                        </div>
                    </form>
                </div>
            </div>
	    </div>
    </body>
</html>