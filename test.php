<?php
$host = getenv('DB_HOST') ?: 'dpg-cur1vpdds78s7384bkr0-a';
$port = getenv('DB_PORT') ?: '5432';
$dbname = getenv('DB_NAME') ?: 'contactodb_i7hi';
$user = getenv('DB_USER') ?: 'contactodb_i7hi_user';
$password = getenv('DB_PASSWORD') ?: 'TU_PASSWORD';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {
    $db = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "✅ Conexión exitosa a PostgreSQL en Render";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>
