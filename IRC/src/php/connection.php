<?php
/* 

    Establish a connection with the server. This file is imported to the .php files that need access to the db. 
    Throws an error if connection with the server cannot be established.

*/

$conn = mysqli_connect("localhost", "root", "", "ircusers");
if (!$conn) {
    echo "Error connecting to DB" . mysqli_connect_error();
}


?>