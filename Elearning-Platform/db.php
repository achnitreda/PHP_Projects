<?php

$dsn = "mysql:host=localhost;dbname=e_classe_db";
$username = "root";
$password = "";

try {
    $connect = new PDO($dsn, $username, $password);

} catch(PDOException $e) {
    echo $e->getMessage(); 
}    

    