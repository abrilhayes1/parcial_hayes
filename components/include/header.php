<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Página Siguiente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>

    
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen">
    <header class="bg-[#c084fc] shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="../index.php" class="text-black font-bold text-xl flex items-center gap-2">
                    📘 La siguiente página
                </a>
            </div>
            <div class="md:hidden">
                <button id="menu-btn" class="text-black focus:outline-none text-2xl">
                    ☰
                </button>
            </div>
            <div id="menu" class="hidden md:flex md:items-center md:gap-6 w-full md:w-auto mt-4 md:mt-0">
                <ul class="flex flex-col md:flex-row md:gap-4 text-black font-medium w-full md:w-auto">
                    <?php
                    if (!isset($_SESSION['id_usuarios'])) {
                        echo "
                        <li><a href='../pages/quienes_somos.php' class='hover:underline block py-1'>Quienes somos</a></li>
                        <li><a href='../pages/registro.php' class='hover:underline block py-1'>Registrarse</a></li>
                        <li><a href='../pages/logIn.php' class='hover:underline block py-1'>Iniciar sesión</a></li>
                        ";
                    } else {
                        if ($_SESSION['tipo'] == 1) {
                            echo "
                            <li><a href='../../admin/ver_usuarios.php' class='hover:underline block py-1'>Ver Usuarios</a></li>
                            <li><a href='../../admin/ver_recetas.php' class='hover:underline block py-1'>Ver Libros Publicados</a></li>
                            <li><a href='../admin/crear_categoria.php' class='hover:underline block py-1'>Crear Categoría</a></li>
                            <li><a href='../pages/quienes_somos.php' class='hover:underline block py-1'>Quienes somos</a></li>
                            ";
                        }

                        if ($_SESSION['tipo'] == 2) {
                            echo "
                            <li><a href='../pages/quienes_somos.php' class='hover:underline block py-1'>Quienes somos</a></li>
                            <li><a href='../user/panel.php' class='hover:underline block py-1'>Publicar Libro</a></li>
                            ";
                        }

                        echo "
                        <li><a href='../components/security/logout.php' class='text-red-700 hover:text-red-800 block py-1'>Cerrar sesión</a></li>
                        ";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</header>


    <main class="container mt-4">