<?php
session_start();
require_once("../conf/conf.php");

if ($con != NULL) {
    $usuario;
    $clave;

    if (isset($_POST['usuario']) and isset($_POST['clave'])) {
        $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
        $clave = mysqli_real_escape_string($con, $_POST['clave']);

        $consulta = "SELECT * FROM usuarios WHERE mail = '$usuario'";

        $resultado = mysqli_query($con, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            $consulta_dos = "SELECT * FROM usuarios WHERE mail = '$usuario' AND pass = MD5('$clave')";

            $resultado_dos = mysqli_query($con, $consulta_dos);
            if (mysqli_num_rows($resultado_dos) > 0) {
                $datos = mysqli_fetch_array($resultado_dos);
                $_SESSION['id_usuarios'] = $datos['id_usuarios'];
                $_SESSION['email'] = $datos['mail'];
                $_SESSION['nombre'] = $datos['nombre'];
                $_SESSION['tipo'] = $datos['fk_id_tipo_usuario'];
                if ($datos['fk_id_tipo_usuario'] == 1) {
                    header("Location: ../../pages/inicio.php");
                } else if ($datos['fk_id_tipo_usuario'] == 2) {
                    header("Location: ../../user/panel.php");
                }
            } else {
                header("Location: ../../pages/registro.php?usr=no ");
            }
        } else {
            header("Location: ../../pages/registro.php?reg=no");
        }
    }
}
