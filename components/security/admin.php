<?php
session_start();

if(!isset($_SESSION['id_usuarios']) or $_SESSION ['fk_id_tipo_usuario'] !=1){
    die("Error 404");
}

?>