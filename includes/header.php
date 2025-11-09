<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Blog</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        .navbar {
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

<!-- Navbar -->
<nav class="navbar sticky top-0 z-50 border-b border-gray-200 shadow-sm">
    <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
        <a href="index.php" class="text-xl font-bold text-blue-600 hover:text-blue-700">
            🗃️Mini Blog
        </a>

        <div class="space-x-4">
            <a href="index.php" class="text-gray-700 hover:text-blue-600 font-medium">Inicio</a>
            <a href="crear.php" class="text-white bg-blue-600 px-3 py-1 rounded hover:bg-blue-700 font-medium transition">
                ➕ Nuevo
            </a>
        </div>
    </div>
</nav>

<!-- Contenedor principal -->
<main class="flex-1 max-w-6xl mx-auto px-4 py-8">
