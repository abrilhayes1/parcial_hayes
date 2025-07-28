<?php 
//datos de conexión
include_once("../../components/conf/conf.php");
require_once("../../components/security/admin.php");

$id;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $consulta = "DELETE FROM categorias WHERE id_categorias='$id' ";
    mysqli_query($con,$consulta);
    header("Location: ../admin.index.php ");

}
?>