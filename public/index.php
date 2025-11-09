<?php
require_once '../config/conexion.php';
include '../includes/header.php';
include '../includes/mensajes.php'; // Mensajes con SweetAlert2

// Obtener artículos
$stmt = $pdo->query("SELECT * FROM articulos ORDER BY fecha_creacion DESC");
$articulos = $stmt->fetchAll();
?>

<h2 class="text-2xl font-semibold mb-4">Últimos artículos</h2>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php if ($articulos): ?>
        <?php foreach ($articulos as $articulo): ?>
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-bold mb-2"><?= htmlspecialchars($articulo['titulo']); ?></h3>
                <p class="text-gray-700 mb-2">
                    <?= nl2br(htmlspecialchars(substr($articulo['contenido'], 0, 150))); ?>...
                </p>
                <p class="text-sm text-gray-500 mb-3">
                    📆<?= date('d/m/Y H:i', strtotime($articulo['fecha_creacion'])); ?>
                </p>
                <div class="flex gap-2">
                    <a href="editar.php?id=<?= $articulo['id']; ?>" 
                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm">
                        🖋️ Editar
                    </a>
                    <button onclick="confirmarEliminacion(<?= $articulo['id']; ?>)"
                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition text-sm">
                        🗑️ Eliminar
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-span-full text-center py-8">
            <p class="text-gray-500 text-lg">📭 No hay artículos publicados todavía.</p>
            <a href="crear.php" class="inline-block mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                ➕ Crear primer artículo
            </a>
        </div>
    <?php endif; ?>
</div>

<!-- Formulario oculto para eliminar (método POST) -->
<form id="formEliminar" method="POST" action="eliminar.php" style="display: none;">
    <input type="hidden" name="id" id="idEliminar">
</form>

<script>
function confirmarEliminacion(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción eliminará el artículo de forma permanente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Usar el formulario POST para eliminar
            document.getElementById('idEliminar').value = id;
            document.getElementById('formEliminar').submit();
        }
    });
}
</script>

<?php include '../includes/footer.php'; ?>