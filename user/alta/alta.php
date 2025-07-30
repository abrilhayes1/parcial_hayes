<?php
include_once("../../components/conf/conf.php");

$titulo = '';
$descripcion = '';
$autor = '';
$media = '';
$categoria = '';
$usuario = '';


if (isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['autor']) && isset($_POST['categoria']) && isset($_POST['usuario']) && isset($_FILES['media'])) {

    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $autor = mysqli_real_escape_string($con, $_POST['autor']); 
    $categoria = mysqli_real_escape_string($con, $_POST['categoria']);
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);

    
    if ($_FILES['media']['error'] === UPLOAD_ERR_OK) {
        $media = time() . ".jpg"; 
        $temporal = $_FILES['media']['tmp_name']; 
        move_uploaded_file($temporal, "../../imgs/$media");
    } else {
        $media = "default.jpg"; 
    }

    $consulta = "INSERT INTO `recetas`(`titulo`, `imagen`, `descripcion`, `autor`, `fk_usuarios`, `fk_id_categorias`) VALUES ('$titulo','$media','$descripcion','$autor','$usuario','$categoria')";

    mysqli_query($con, $consulta) or die("Error en la consulta: " . mysqli_error($con));
    header("Location: ../../index.php");
    exit;
}
