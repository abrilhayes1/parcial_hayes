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
            <div class="card shadow border-0">
                <div class="card-header bg-purple text-white text-center fw-bold" style="background-color: #c084fc;">
                    <h4>Publicar Libro</h4>
                </div>
                <div class="card-body">
                    <form action="alta/alta.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input id="titulo" name="titulo" type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ingredientes" class="form-label">Autor</label>
                            <input id="titulo" name="titulo" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="media" class="form-label">Imagen</label>
                            <input id="media" name="media" type="file" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select id="categoria" name="categoria" class="form-select" required>
                                <?php
                                $consulta = "SELECT * FROM categorias";
                                $resultado = mysqli_query($con, $consulta);

                                while ($categoria = mysqli_fetch_array($resultado)) {
                                    echo "<option value='{$categoria['id_categorias']}'>{$categoria['nombre']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <input type="hidden" name="usuario" value="<?= $_SESSION['id_usuarios'] ?>">

                        <div class="d-grid">
                            <input type="submit" value="Publicar Receta" class="btn text-white fw-semibold" style="background-color: #c084fc;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../components/include/footer.php"); ?>
