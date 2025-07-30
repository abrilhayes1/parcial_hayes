<?php 
include_once("../../components/conf/conf.php");
require_once("../../components/security/admin.php");

$categoria;
if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];
    $consulta = "INSERT INTO categorias(nombre) VALUES ('$categoria')";
    mysqli_query($con,$consulta);
    header("Location: ../crear_categoria.php ");

}
?>