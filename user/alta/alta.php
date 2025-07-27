<?php
include_once("../../components/conf/conf.php");

$titulo;
$descripcion;
$ingredientes;
$pasos;
$media;
$categoria;
$usuario;

if (isset($_POST['titulo']) or isset($_POST['descripcion']) or isset($_POST['ingredientes']) or isset($_POST['pasos']) or isset($_FILES['media']) or isset($_POST['categoria']) or isset($_POST['usuario'])) {
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    mysqli_real_escape_string($con, $_POST['ingredientes']);
    mysqli_real_escape_string($con, $_POST['pasos']);
    mysqli_real_escape_string($con, $_POST['categorias']);
    mysqli_real_escape_string($con, $_POST['usuarios']);

    $media = time() . "jpg";
    $temporal = $_FILES['media']['temp_name'];
    move_uploaded_file($temporal, "../../imgs/$media");

    $consulta = "INSERT INTO `recetas`(`titulo`, `imagen`, `descripcion`, `ingredientes`, `pasos`, `fk_usuarios`, `fk_id_categorias`) VALUES ('$titulo','$media','$descripcion','$ingredientes','$pasos','$usuario','$categoria')";

    mysqli_query($con, $consulta);
    header("Location: ../../index.php");
}
