<?php 
include_once("../../components/conf/conf.php");
require_once("../../components/security/admin.php");

if (!isset($_GET['id'])) {
    die("No llegó el parámetro ID");
}
$id = $_GET['id'];


$consulta = "SELECT * FROM categorias WHERE id_categorias='$id'";
$resultado = mysqli_query($con, $consulta) or die("Error en la consulta: " . mysqli_error($con));

while ($fila = mysqli_fetch_array($resultado)) {
    echo "
    <form action='mod_cat_ok.php' method='get'>
        <input type='hidden' name='id' value='{$fila['id_categorias']}'>
        <input type='text' name='categoria' value='{$fila['nombre']}'>
        <input type='submit' value='Modificar'>
    </form>
    ";
}
?>
