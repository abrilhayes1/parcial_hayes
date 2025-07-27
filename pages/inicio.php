<?php
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");
?>

<!-- HERO / BANNER -->
<section class="py-5 text-center text-white" style="background-color: #a855f7;">
    <div class="container">
        <h1 class="display-4 fw-bold">La Página Siguiente</h1>
        <p class="lead">Donde los libros, las recetas y el café se encuentran</p>
        <a href="registro.php" class="btn btn-light mt-3">Unite a la comunidad</a>
    </div>
</section>

<!-- SERVICIOS / VALORES -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <i class="bi bi-book fs-1 text-primary"></i>
                <h4 class="fw-bold mt-2">Libros Accesibles</h4>
                <p>Reevendemos libros usados en excelente estado para que la lectura esté al alcance de todos.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-cup-hot fs-1 text-danger"></i>
                <h4 class="fw-bold mt-2">Café de Especialidad</h4>
                <p>Disfrutá de un buen libro acompañado por un café hecho con amor en nuestra sucursal.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-people fs-1 text-success"></i>
                <h4 class="fw-bold mt-2">Comunidad Lectora</h4>
                <p>Organizamos charlas, encuentros y talleres para compartir experiencias e ideas.</p>
            </div>
        </div>
    </div>
</section>

<!-- LISTADO DE RECETAS -->
<section class="container py-5">
    <h2 class="mb-4 fw-bold text-center" style="color: #7c3aed;">Libros destacados</h2>
    <div class="row g-4">
        <?php
        $consulta = "SELECT * FROM recetas";
        $resultado =  mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "
                <div class='col-md-4'>
                    <div class='card h-100 shadow-sm'>
                        <img src='../imgs/{$fila['media']}' class='card-img-top' alt='imagen receta'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$fila['titulo']}</h5>
                            <a href='noticia.php?id={$fila['id_recetas']}' class='btn btn-primary'>Ver más</a>
                        </div>
                    </div>
                </div>
            ";
        }
        ?>
    </div>
</section>

<?php
include_once("../components/include/footer.php");
?>
