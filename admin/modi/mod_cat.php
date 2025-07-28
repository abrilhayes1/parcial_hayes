<?php 

include_once("../../components/include/header.php");

if (!isset($_POST['id'])) {
    die("No llegó el parámetro ID");
}
$id = $_POST['id'];


$consulta = "SELECT * FROM categorias WHERE id_categorias='$id'";
$resultado = mysqli_query($con, $consulta) or die("Error en la consulta: " . mysqli_error($con));

while ($fila = mysqli_fetch_array($resultado)) {
    echo "
    <form action='mod_cat_ok.php' method='post'>
        <input type='hidden' name='id' value='{$fila['id_categorias']}'>
        <input type='text' name='categoria' value='{$fila['nombre']}'>
        <input type='submit' value='Modificar'>
    </form>
    ";
}
include_once("../../components/include/footer.php");
?>
