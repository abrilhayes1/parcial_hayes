<?php
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");
?>

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-10 text-purple-700">Publicaciones de libros</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php
            $consulta = "SELECT recetas.*, usuarios.nombre, usuarios.apellido, usuarios.mail 
                        FROM recetas 
                        JOIN usuarios ON recetas.fk_usuarios = usuarios.id_usuarios";

            $resultado = mysqli_query($con, $consulta);

            while ($fila = mysqli_fetch_array($resultado)) {
                echo "
                    <div class='bg-white shadow-md rounded-lg overflow-hidden flex flex-col'>
                        <img src='/parcial_hayes/imgs/{$fila['imagen']}' alt='Libro' class='w-full h-48 object-cover'>
                        <div class='p-4 flex-1 flex flex-col justify-between'>
                            <h5 class='text-xl font-semibold mb-4'>{$fila['titulo']}</h5>
                            <a href='noticia.php?id={$fila['id_recetas']}' class='inline-block bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium py-2 px-4 rounded text-center transition'>Inspeccionar</a>
                        </div>
                        
                        <div class='p-4 border-t'>
                            <h6 class='text-lg font-semibold mb-2'>Propietario</h6>
                            <p class='text-sm'><strong>Mail:</strong> {$fila['mail']}</p>
                            <p class='text-sm'><strong>Nombre:</strong> {$fila['nombre']}</p>
                            <p class='text-sm'><strong>Apellido:</strong> {$fila['apellido']}</p>
                        </div>
                    </div>
                ";
            }
            ?>
        </div>
    </div>
</section>

<?php include_once("../components/include/footer.php"); ?>