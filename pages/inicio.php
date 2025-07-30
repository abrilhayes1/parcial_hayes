<?php
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");
?>


<section class="py-16 bg-purple-600 text-black text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">La Página Siguiente</h1>
        <p class="text-lg md:text-xl mb-6">Donde los libros, las recetas y el café se encuentran</p>
        <a href="registro.php" class="inline-block bg-white text-purple-700 font-semibold py-2 px-4 rounded shadow hover:bg-gray-100 transition">
            Unite a la comunidad
        </a>
    </div>
</section>


<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div>
            <div class="text-5xl mb-4">📚</div>
            <h4 class="text-xl font-bold mb-2">Libros Accesibles</h4>
            <p class="text-gray-700">Reevendemos libros usados en excelente estado para que la lectura esté al alcance de todos.</p>
        </div>
        <div>
            <div class="text-5xl mb-4">☕</div>
            <h4 class="text-xl font-bold mb-2">Café de Especialidad</h4>
            <p class="text-gray-700">Disfrutá de un buen libro acompañado por un café hecho con amor en nuestra sucursal.</p>
        </div>
        <div>
            <div class="text-5xl mb-4">👥</div>
            <h4 class="text-xl font-bold mb-2">Comunidad Lectora</h4>
            <p class="text-gray-700">Organizamos charlas, encuentros y talleres para compartir experiencias e ideas.</p>
        </div>
    </div>
</section>


<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-10 text-purple-700">Libros destacados</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php
            $consulta = "SELECT * FROM recetas";
            $resultado = mysqli_query($con, $consulta);
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "
                    <div class='bg-white shadow-md rounded-lg overflow-hidden flex flex-col'>
                        <img src='/parcial_hayes/imgs/{$fila['imagen']}' alt='Libro' class='w-full h-48 object-cover'>
                        <div class='p-4 flex-1 flex flex-col justify-between'>
                            <h5 class='text-xl font-semibold mb-4'>{$fila['titulo']}</h5>
                            <a href='noticia.php?id={$fila['id_recetas']}' class='inline-block bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium py-2 px-4 rounded text-center transition'>
                                Ver más
                            </a>
                        </div>
                    </div>
                ";
            }
            ?>
        </div>
    </div>
</section>

<?php
include_once("../components/include/footer.php");
?>