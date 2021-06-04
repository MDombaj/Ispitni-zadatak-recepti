<?php
/*
# Created by: Gregor Stojanovic (Tikky-Dev)
#   Created on: 04.06.2021.
#
#   Functionality:
#       Connection to database.
*/

// Information for connecting to database
$serverName = "localhost"; //localhost je privremeno postavljeno. Treba promeniti prilikom implementacije i podizanja na server.
$username = "root"; //root je privremeno postavljeno. Treba promeniti prilikom implementacije i podizanja na server.
$password = "password"; //password je privremeno postavljeno. Treba promeniti prilikom implementacije i podizanja na server.
$database = "receptaplikacjaispit";

//Conecting to database
$DB = new mysqli($server, $username, $password);

//Checking connection
if($DB -> connection_error){
    die("Connection failed: ".$DB->connection_error);
}

//function to close connection with database
function closeDBConnection(){
   $DB->close(); 
}
?>