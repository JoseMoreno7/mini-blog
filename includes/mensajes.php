<?php
// Mensajes de éxito
if (isset($_GET['mensaje'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: '✅ Éxito',
        text: '<?= htmlspecialchars($_GET['mensaje']) ?>',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true
    });
</script>
<?php endif; ?>

<?php
// Mensajes de error
if (isset($_GET['error'])): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: '❌ Error',
        text: '<?= htmlspecialchars($_GET['error']) ?>',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Entendido'
    });
</script>
<?php endif; ?>