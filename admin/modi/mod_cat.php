<?php 
include_once("../../components/conf/conf.php");
include_once("../../components/include/header.php");

if (!isset($_GET['id'])) {
    die("No llegó el parámetro ID");
}

$id = $_GET['id'];

$consulta = "SELECT * FROM categorias WHERE id_categorias='$id'";
$resultado = mysqli_query($con, $consulta) or die("Error en la consulta: " . mysqli_error($con));
?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold text-purple-700 mb-6 text-center">Modificar Categoría</h2>
        <?php
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "
            <form action='mod_cat_ok.php' method='get' class='space-y-4'>
                <input type='hidden' name='id' value='{$fila['id_categorias']}'>
                
                <div>
                    <label for='categoria' class='block text-sm font-medium text-gray-700 mb-1'>Nombre de la categoría</label>
                    <input type='text' id='categoria' name='categoria' value='{$fila['nombre']}'
                        class='w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500'
                        required>
                </div>
                
                <div class='text-center'>
                    <input type='submit' value='Modificar'
                        class='bg-purple-600 text-white font-semibold py-2 px-6 rounded hover:bg-purple-700 transition duration-200 cursor-pointer'>
                </div>
            </form>
            ";
        }
        ?>
    </div>
</div>

<?php
include_once("../../components/include/footer.php");
?>
