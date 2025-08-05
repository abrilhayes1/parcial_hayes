<?php
session_start();
require_once("../conf/conf.php");

if (!isset($_SESSION['id_usuarios'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id_usuarios'];

$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
$apellido = mysqli_real_escape_string($con, $_POST['apellido']);
$fecha_nacimiento = mysqli_real_escape_string($con, $_POST['fecha_nacimiento']);

$update = "UPDATE usuarios SET 
            nombre = '$nombre', 
            apellido = '$apellido', 
            fecha_nacimiento = '$fecha_nacimiento' 
        WHERE id_usuarios = $id";

$result = mysqli_query($con, $update);

if ($result) {
    header("Location: ver_perfil_usr.php?edit=ok");
    exit;
} else {
    echo "Error al actualizar: " . mysqli_error($con);
}
