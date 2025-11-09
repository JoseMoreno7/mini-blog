<?php
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $contenido = trim($_POST['contenido']);

    if ($titulo && $contenido) {
        $stmt = $pdo->prepare("INSERT INTO articulos (titulo, contenido) VALUES (?, ?)");
        $stmt->execute([$titulo, $contenido]);
        header('Location: index.php?mensaje=Artículo creado correctamente');
        exit;
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}

include '../includes/header.php';
?>

<h2 class="text-2xl font-semibold mb-4">📝 Nuevo Artículo</h2>

<?php if (!empty($error)): ?>
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="POST" id="formCrear" class="max-w-xl bg-white p-6 rounded-lg shadow space-y-4">
    <div>
        <label class="block font-medium mb-1">Título</label>
        <input type="text" name="titulo" maxlength="255" required
               class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
               placeholder="Escribe un título atractivo...">
    </div>

    <div>
        <label class="block font-medium mb-1">Contenido</label>
        <textarea name="contenido" rows="6" required
                  class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                  placeholder="Escribe el contenido de tu artículo..."></textarea>
    </div>

    <div class="flex justify-end">
        <button type="button" onclick="confirmarSalida()" 
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition mr-2">
            Cancelar
        </button>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Guardar
        </button>
    </div>
</form>

<script>
function confirmarSalida() {
    // Verificar si hay contenido en el formulario
    const titulo = document.querySelector('input[name="titulo"]').value;
    const contenido = document.querySelector('textarea[name="contenido"]').value;
    
    if (titulo.trim() || contenido.trim()) {
        Swal.fire({
            title: '¿Salir sin guardar?',
            text: 'Los cambios no se guardarán si sales ahora.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, salir',
            cancelButtonText: 'Continuar editando'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php';
            }
        });
    } else {
        // Si está vacío, salir directamente
        window.location.href = 'index.php';
    }
}
</script>

<?php include '../includes/footer.php'; ?>