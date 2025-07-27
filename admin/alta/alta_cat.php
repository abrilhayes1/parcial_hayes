<?php 
include_once("../../components/conf/conf.php");
require_once("../../components/security/admin.php");

$categoria;
if(isset($_POST['categoria'])){
    $categoria = $_POST['categoria'];
    $consulta = "INSERT INTO categorias(nombre) VALUES ('$categoria')";
    mysqli_query($con,$consulta);
    header("Location: ../admin.index.php ");

}
?>