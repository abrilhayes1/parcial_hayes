<?php 
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");

if(!$_SESSION['id_usuarios']){
    die("Error 404");

}else if($_SESSION['tipo'] != 1){
    header("Location: ../pages/inicio.php");
}
?>