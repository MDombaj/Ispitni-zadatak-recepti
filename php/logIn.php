<?php
/*
# Created by: Gregor Stojanovic (Tikky-Dev)
#   Created on: 07.06.2021.
#
#   Functionality:
#       Checking and verifying login.
*/

//database connection
require('databaseConnection.php');

//function to verify log in parametars and if correct return user data.
function logInVerification(){
    $username = $_GET("username");
    $password = password_hash($_GET("password"), PASSWORD_DEFAULT);

    $querrSelectSpecificUsers = $DB->querry("SELECT *
                                            FROM `users`
                                            WHERE `users`.username = $username;");
    if($querrSelectSpecificUsers === NULL){
        return "Incorect username";
    }
    while($selectedUser = $querrSelectSpecificUsers->fetch_object()){
        if($selectedUser->password === $password){
            return $selectedUser;
        } 
    }

    if($selectedUser === NULL){
        return "Incorect password";
    }
}

?>