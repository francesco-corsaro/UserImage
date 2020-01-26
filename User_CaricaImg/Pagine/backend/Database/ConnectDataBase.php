<?php
$servername = "localhost";
$username = "mytraining";
$password ='' ;
$dbname = "my_mytraining";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}else{
    $erroreConnessione= "Connesso".'  ';}

 ?>














