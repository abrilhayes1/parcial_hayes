<?php 
include_once("../../components/conf/conf.php");
require_once("../../components/security/admin.php");


$categoria;
$id;
if(isset($_POST['categoria']) && isset($_POST['id']) ){
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];
    $consulta = "UPDATE categorias SET nombre='$categoria' WHERE id_categorias='$id'";
    mysqli_query($con,$consulta);
    header("Location: ../crear_categoria.php ");

}

?>