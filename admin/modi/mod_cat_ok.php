<?php 
include_once("../../components/conf/conf.php");
require_once("../../components/security/admin.php");

$categoria;
$id;
if(isset($_GET['categoria']) && isset($_GET['id']) ){
    $categoria = $_GET['categoria'];
    $id = $_GET['id'];
    $consulta = "UPDATE categorias SET nombre='$categoria' WHERE id_categorias='$id'";
    mysqli_query($con,$consulta);
    header("Location: ../index.php ");

}
?>