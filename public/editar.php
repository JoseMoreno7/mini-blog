<?php
require_once '../config/conexion.php';

// Validar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php?error=ID inválido');
    exit;
}

$id = (int) $_GET['id'];

// Obtener artículo
$stmt = $pdo->prepare("SELECT * FROM articulos WHERE id = ?");
$stmt->execute([$id]);
$articulo = $stmt->fetch();

if (!$articulo) {
    header('Location: index.php?error=Artículo no encontrado');
    exit;
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $contenido = trim($_POST['contenido']);

    if ($titulo && $contenido) {
        $stmt = $pdo->prepare("UPDATE articulos SET titulo = ?, contenido = ? WHERE id = ?");
        $stmt->execute([$titulo, $contenido, $id]);

        header('Location: index.php?mensaje=Artículo actualizado correctamente');
        exit;
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}

include '../includes/header.php';
?>

<h2 class="text-2xl font-semibold mb-4">✏️ Editar Artículo</h2>

<?php if (!empty($error)): ?>
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="POST" id="formEditar" class="max-w-xl bg-white p-6 rounded-lg shadow space-y-4">
    <div>
        <label class="block font-medium mb-1">Título</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($articulo['titulo']); ?>" maxlength="255" required
               class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
    </div>

    <div>
        <label class="block font-medium mb-1">Contenido</label>
        <textarea name="contenido" rows="6" required
                  class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"><?= htmlspecialchars($articulo['contenido']); ?></textarea>
    </div>

    <div class="flex justify-end">
        <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition mr-2">
            Cancelar
        </a>
        <button type="button" onclick="confirmarEdicion()"
                class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700 transition">
            Actualizar
        </button>
    </div>
</form>

<script>
function confirmarEdicion() {
    Swal.fire({
        title: '¿Guardar cambios?',
        text: 'Se actualizará el contenido del artículo.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Sí, guardar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formEditar').submit();
        }
    });
}
</script>

<?php include '../includes/footer.php'; ?>