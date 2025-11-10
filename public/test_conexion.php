<?php
require_once __DIR__ . '/../config/conexion.php';

// Mostrar info básica de conexión (útil para debug en deploy)
$host = getenv('MYSQLHOST') ?: getenv('MYSQL_HOST') ?: '127.0.0.1';
$dbname = getenv('MYSQLDATABASE') ?: getenv('MYSQL_DATABASE') ?: 'miniblog_db';
$port = getenv('MYSQLPORT') ?: 3306;

echo "<h2>Prueba de conexión</h2>";
echo "<p>Host: " . htmlspecialchars($host) . "</p>";
echo "<p>DB: " . htmlspecialchars($dbname) . "</p>";
echo "<p>Puerto: " . htmlspecialchars($port) . "</p>";

// Hacemos una consulta simple
try {
    $stmt = $pdo->query("SELECT VERSION() AS v");
    $row = $stmt->fetch();
    echo "<p>MySQL version: " . htmlspecialchars($row['v']) . "</p>";
    echo "<p style='color:green'>✅ Conexión OK</p>";
} catch (Exception $e) {
    echo "<p style='color:red'>❌ Error ejecutando consulta: " . htmlspecialchars($e->getMessage()) . "</p>";
}
