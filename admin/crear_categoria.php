<?php 
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");

if (!$_SESSION['id_usuarios']) {
    die("Error 404");
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow border-0 mb-4">
                <div class="card-header text-white text-center fw-bold" style="background-color: #c084fc;">
                    <h1>Agregar categoría de libros</h1>
                </div>
                <div class="card-body">
                    <form action="alta/alta_cat.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Nombre de la categoría</label>
                            <input id="categoria" name="categoria" type="text" class="form-control" required>
                        </div>
                        <input type="hidden" name="usuario" value="<?= $_SESSION['id_usuarios'] ?>">
                        <div class="d-grid">
                            <input type="submit" value="Agregar categoría" class="btn text-white fw-semibold" style="background-color: #c084fc;">
                        </div>
                    </form>
                </div>
            </div>
            <?php if (isset($_GET['eliminada'])): ?>
                <div class="alert alert-success">Categoría eliminada correctamente.</div>
            <?php endif; ?>
            <?php if (isset($_GET['editada'])): ?>
                <div class="alert alert-success">Categoría modificada correctamente.</div>
            <?php endif; ?>
            <div class="card shadow border-0">
                <div class="card-header bg-light fw-bold text-center" style="background-color: #c084fc;">
                    Categorías existentes
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php
                        $consulta = "SELECT * FROM categorias";
                        $resultado = mysqli_query($con, $consulta);

                        while ($cat = mysqli_fetch_array($resultado)) {
                            echo "
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <form action='../admin/modi/mod_cat.php' method='post' class='d-flex w-100'>
                                        <input type='hidden' name='id' value='{$cat['id_categorias']}'>
                                        <input type='text' name='id' class='form-control me-2' value='{$cat['nombre']}' required>
                                        <button type='submit' class='btn btn-sm btn-outline-primary me-2'>Editar</button>
                                    </form>
                                    <form action='../admin/baja/eliminar_cat.php' method='post' class='d-flex'>
                                        <input type='hidden' name='id' value='{$cat['id_categorias']}'>
                                        <button type='submit' class='btn btn-sm btn-outline-danger'>Eliminar</button>
                                    </form>
                                </li>
                            ";
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once("../components/include/footer.php"); ?>
