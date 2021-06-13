<?php
/*
# Created by: Gregor Stojanovic (Tikky-Dev)
#   Created on: 07.06.2021.
#
#   Functionality:
#       Creating new account.
*/

//database connection
require('databaseConnection.php');

function registerNewUser(){
    $username = $_GET("username");
    $password = password_hash($_GET("password"), PASSWORD_DEFAULT);
    $email = $_GET("email");

    $querryCreatingUser = $DB->querry("INSERT INTO `users` (username, email, `password`)
                                            VALUES ($username, $email, $password);");
}

?>