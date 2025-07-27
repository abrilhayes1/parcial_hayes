<?php 
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");

if(!$_SESSION['id_usuarios']){
    die("Error 404");

}
?>