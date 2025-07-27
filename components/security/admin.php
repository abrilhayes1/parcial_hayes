<?php
session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
    die("Error 404");
}


?>