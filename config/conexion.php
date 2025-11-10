<?php
// config/conexion.php
// Conexión PDO usando variables de entorno (Railway / otros providers).
// No pongas credenciales en el repo. Railway inyecta las variables automáticamente.

$host = getenv('MYSQLHOST') ?: getenv('MYSQL_HOST') ?: '127.0.0.1';
$db   = getenv('MYSQLDATABASE') ?: getenv('MYSQL_DATABASE') ?: getenv('MYSQL_DATABASE_NAME') ?: 'miniblog_db';
$user = getenv('MYSQLUSER') ?: getenv('MYSQL_USER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: getenv('MYSQL_PASSWORD') ?: getenv('MYSQL_ROOT_PASSWORD') ?: '';
$port = getenv('MYSQLPORT') ?: 3306;
$charset = 'utf8mb4';

$dsn = "mysql:host={$host};port={$port};dbname={$db};charset={$charset}";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // Opcional: definir variables útiles para debug (no imprimir en producción)
    // define('DB_CONNECTED', true);
} catch (PDOException $e) {
    // En producción no muestres $e->getMessage(); aquí lo mostramos para debug.
    http_response_code(500);
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
