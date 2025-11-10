<?php
define('DB_HOST', 'switchback.proxy.rlwy.net');
define('DB_PORT', 57175);
define('DB_NAME', 'railway');
define('DB_USER', 'root');
define('DB_PASS', 'ipweunePLGRtHVEMRtkmtxzTZakHZddk');

try {
    $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    error_log("Error de conexión: " . $e->getMessage());
    die("❌ Error de conexión a la base de datos.");
}
