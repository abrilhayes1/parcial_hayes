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
</head>

<body class="bg-light">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #c084fc;">
            <div class="container">

                <a class="navbar-brand fw-bold d-flex align-items-center" href="../index.php">
                    <i class="bi bi-journal-bookmark-fill me-2 fs-4"></i>
                    La siguiente página
                </a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        require_once("../components/conf/conf.php");
                        if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
                            $consulta = "SELECT * FROM categorias";
                            $resultado = mysqli_query($con, $consulta);
                            while ($fila = mysqli_fetch_array($resultado)) {
                                echo "
                                <li class='nav-item'>
                                    <a class='nav-link text-dark fw-semibold' href='../pages/categoria.php?id={$fila['id_categoria']}'>
                                        {$fila['nombre']}
                                    </a>
                                </li>";
                            }
                        }
                        ?>
                    </ul>


                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <?php
                        if (!isset($_SESSION['id_usuarios'])) {
                            echo "
                        <li class='nav-item'>
                            <a class='nav-link text-dark fw-semibold' href='../pages/quienes_somos.php'>Quienes somos</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link text-dark fw-semibold' href='../pages/registro.php'>Registrarse</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link text-dark fw-semibold' href='../pages/logIn.php'>Iniciar sesion</a>
                        </li>
                        
                        ";
                        } else {

                            if ($_SESSION['tipo'] == 1) {
                                echo "
                            <li class='nav-item'>
                                <a class='nav-link text-dark fw-semibold' href='../../admin/ver_usuarios.php'>Ver Usuarios</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link text-dark fw-semibold' href='../../admin/ver_recetas.php'>Ver Libros Publicados</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link text-dark fw-semibold' href='../../admin/crear_categoria.php'>Ver Libros Publicados</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link text-dark fw-semibold' href='../pages/quienes_somos.php'>Quienes somos</a>
                        </li>
                            ";
                            }


                            if ($_SESSION['tipo'] == 2) {
                                echo "
                            <li class='nav-item'>
                            <a class='nav-link text-dark fw-semibold' href='../pages/quienes_somos.php'>Quienes somos</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link text-dark fw-semibold' href='../user/panel.php'>Publicar Libro</a>
                            </li>
                            
                            ";
                            }


                            echo "
                        <li class='nav-item'>
                            <a class='nav-link text-danger fw-semibold' href='../components/security/logout.php'>Cerrar Sesión</a>
                        </li>
                        ";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4">