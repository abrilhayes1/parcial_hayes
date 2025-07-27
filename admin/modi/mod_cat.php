<?php 
include_once("../../components/conf/conf.php");
require_once("../../components/security/admin.php");
$id;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $consulta = "SELECT * FROM categorias WHERE id_categoria='$id' ";
    $resultado = mysqli_query($con,$consulta);    
}
?>
<form action="mod_cat_ok.php" method="get" >
    <?php
    while($fila = mysqli_fetch_array($resultado)){
        print "
            <input type=hidden name=id value=$fila[id_categoria] >
            <input type=text name=categoria value=$fila[nombre] >
            <input type=submit value=Modificar> 
    ";
    }
    ?>
</form>