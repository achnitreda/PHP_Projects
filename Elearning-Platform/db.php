<?php

$dsn = "mysql:host=localhost;dbname=e_classe_db";
$username = "elearn_user";
$password = "StrongPass123!";

try {
    $connect = new PDO($dsn, $username, $password);

} catch(PDOException $e) {
    echo $e->getMessage(); 
}    
