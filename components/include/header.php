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

<body class="bg-gray-100 text-gray-800 min-h-screen w-full">

<header class="bg-[#c084fc] shadow relative z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <a href="../index.php" class="text-black font-bold text-xl flex items-center gap-2">
                📘 La siguiente página
            </a>

            <button id="menu-btn" class="text-black md:hidden text-2xl">
                ☰
            </button>

            <?php
            $menu_items = [];

            if (!isset($_SESSION['id_usuarios'])) {
                $menu_items = [
                    ['label' => 'Quienes somos', 'url' => '../pages/quienes_somos.php'],
                    ['label' => 'Registrarse', 'url' => '../pages/registro.php'],
                    ['label' => 'Iniciar sesión', 'url' => '../pages/logIn.php']
                ];
            } else {
                if ($_SESSION['tipo'] == 1) { // Admin
                    $menu_items = [
                        ['label' => 'Ver Usuarios', 'url' => '/parcial_hayes/admin/ver_usuarios.php'],
                        ['label' => 'Ver Libros Publicados', 'url' => '/parcial_hayes/admin/ver_libros_publicados.php'],
                        ['label' => 'Crear Categoría', 'url' => '../admin/crear_categoria.php'],
                        ['label' => 'Quienes somos', 'url' => '../pages/quienes_somos.php']
                    ];
                } elseif ($_SESSION['tipo'] == 2) { // Usuario
                    $menu_items = [
                        ['label' => 'Quienes somos', 'url' => '../pages/quienes_somos.php'],
                        ['label' => 'Publicar Libro', 'url' => '../user/panel.php'],
                        ['label' => 'Ver perfil', 'url' => '/parcial_hayes/user/ver_perfil_usr.php']
                    ];
                }
                $menu_items[] = ['label' => 'Cerrar sesión', 'url' => '../components/security/logout.php', 'class' => 'text-red-700 hover:text-red-800'];
            }
            ?>

            <nav id="menu" class="hidden md:flex flex-col md:flex-row md:items-center gap-4 absolute top-16 left-0 w-full bg-[#c084fc] z-50 md:static md:bg-transparent md:w-auto">
                <ul class="flex flex-col md:flex-row w-full md:w-auto text-black font-medium px-4 md:px-0">
                    <?php foreach ($menu_items as $item): ?>
                        <li>
                            <a href="<?= $item['url'] ?>" class="block px-4 py-2 md:py-1 hover:underline <?= $item['class'] ?? '' ?>">
                                <?= $item['label'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
    document.querySelectorAll('#menu a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 768) {
                menu.classList.add('hidden');
            }
        });
    });
</script>
