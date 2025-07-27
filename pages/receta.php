<?php
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");
echo "Header incluido correctamente.";
$id;
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $consulta = "SELECT * FROM noticias WHERE id_noticia='$id'";
    $resultado =  mysqli_query($con,$consulta);
    while($fila = mysqli_fetch_array($resultado)){
        print "
            <div>
                <h2>$fila[titulo]</h2>
                <figure>
                <img src=../imgs/$fila[media] >
                </figure>
                <p>Descripcion: $fila[Descripcion]</p>
                <p>$fila[ingredientes]</p>
                <p>$fila[pasos]</p>                           
        </div>                            
        ";
    }
}
include_once("../components/include/footer.php");
?>