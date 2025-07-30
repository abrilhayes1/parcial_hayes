<?php
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");
?>

<section class="py-16 bg-purple-600 text-white text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-8">Listado de usuarios</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-left">
            <?php
            $consulta = "SELECT * FROM usuarios";
            $resultado = mysqli_query($con, $consulta);

            while ($fila = mysqli_fetch_array($resultado)) {
                if ($fila['fk_id_tipo_usuario'] == 1) {
                            $tipo = "Administrador";
                } elseif ($fila['fk_id_tipo_usuario'] == 2) {
                            $tipo = "Usuario";
                }
                echo "
                    <div class='bg-white text-black rounded-lg shadow-md p-4'>
                        <h3 class='text-lg font-semibold mb-2'>{$fila['nombre']} {$fila['apellido']}</h3>
                        <p class='text-sm mb-1'><strong>Correo:</strong> {$fila['mail']}</p>
                        <p class='text-sm'><strong>Tipo:</strong> {$fila['fk_id_tipo_usuario']}</p>
                    </div>
                ";
            }
            ?>
        </div>
    </div>
</section>

<?php include_once("../components/include/footer.php"); ?>