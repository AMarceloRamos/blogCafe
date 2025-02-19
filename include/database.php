<?php

function conectarDB() : Mysqli{

    $host =getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: 'admin1234';
    $database = getenv('DB_NAME') ?: 'blogCafe';

    $db= new mysqli( $host, $user , $password ,  $database);

    if(!$db){
        die( "Error no se puede conectar". $db->connect_error);
     
    }
    return $db;
}