<?php
require_once '../config/conexion.php';

// Solo acepta POST (más seguro)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?error=Método no permitido');
    exit;
}

// Validar ID
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    header('Location: index.php?error=ID inválido');
    exit;
}

$id = (int) $_POST['id'];

// Verificar que el artículo existe
$stmt = $pdo->prepare("SELECT id FROM articulos WHERE id = ?");
$stmt->execute([$id]);

if (!$stmt->fetch()) {
    header('Location: index.php?error=Artículo no encontrado');
    exit;
}

// Eliminar artículo
$stmt = $pdo->prepare("DELETE FROM articulos WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php?mensaje=Artículo eliminado correctamente');
exit;