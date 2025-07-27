<?php
require_once("../conf/conf.php");

if ($con != NULL) {
    if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contra_uno']) && isset($_POST['contra_dos'])) {
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($con, $_POST['apellido']);
        $mail = mysqli_real_escape_string($con, $_POST['correo']);
        $pass_uno = mysqli_real_escape_string($con, $_POST['contra_uno']);
        $pass_dos = mysqli_real_escape_string($con, $_POST['contra_dos']);

        if ($pass_uno == $pass_dos) {
            $consulta = "SELECT * FROM usuarios WHERE mail = '$mail'";
            $resultado = mysqli_query($con, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                header("Location: ../../pages/registro.php?mail=no");
                exit;
            } else {
                $insertar = "INSERT INTO usuarios (nombre, apellido, mail, pass, fk_id_tipo_usuario)
                        VALUES ('$nombre', '$apellido', '$mail', MD5('$pass_uno'), '2')";

                $resultado_insert = mysqli_query($con, $insertar);
                if (!$resultado_insert) {
                    die("Error al insertar: " . mysqli_error($con));
                }

                header("Location: ../../pages/registro.php?log=si");
                exit;
            }
        } else {
            header("Location: ../../pages/registro.php?pass=no");
            exit;
        }
    } else {
        die("Faltan datos del formulario.");
    }
} else {
    die("Error de conexión.");
}
