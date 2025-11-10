<?php
// config/conexion.php

// Datos desde Railway
define('DB_HOST', 'mysql.railway.internal');
define('DB_PORT', 3306);
define('DB_NAME', 'railway');
define('DB_USER', 'root');
define('DB_PASS', 'ipweunePLGRtHVEMRtkmtxzTZakHZddk'); // usa tu valor real

try {
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);

    // Para probar conexión
    // echo "✅ Conexión a la base de datos exitosa.";
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("❌ Error de conexión a la base de datos.");
}
