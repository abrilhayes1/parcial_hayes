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

            if (!$resultado) {
                die("Error en la consulta: " . mysqli_error($con));
            }

            while ($fila = mysqli_fetch_assoc($resultado)) {
                $tipo = ($fila['fk_id_tipo_usuario'] == 1) ? "Administrador" : "Cliente";

                echo "
                    <div class='bg-white text-black rounded-lg shadow-md p-4'>
                        <h3 class='text-lg font-semibold mb-2'>{$fila['nombre']} {$fila['apellido']}</h3>
                        <p class='text-sm mb-1'><strong>Correo:</strong> {$fila['mail']}</p>
                        <p class='text-sm'><strong>Tipo:</strong> $tipo</p>
                        <a href='info_usuario.php?id={$fila['id_usuarios']}' class='inline-block mt-4 bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700'>Ver información</a>
                    </div>
                ";
            }
            ?>
        </div>
    </div>
</section>

<?php include_once("../components/include/footer.php"); ?>