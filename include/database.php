<?php

function conectarDB(): PDO {
    $host = getenv('DB_HOST') ?: 'dpg-cur1vpdds78s7384bkr0-a';
    $port = getenv('DB_PORT') ?: '5432'; 
    $dbname = getenv('DB_NAME') ?: 'contactodb_i7hi';
    $user = getenv('DB_USER') ?: 'contactodb_i7hi_user';
    $password = getenv('DB_PASSWORD') ?: '1BesM5VW4iwl5rdJP9IXqNwETiKW9hA0';

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

    try {
        $db = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $db;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
