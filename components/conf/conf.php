<?php
define('servidor', 'localhost');

define('usuario', 'root');

define('clave', '');

define('base_datos', 'recetas');

define('puerto', '3306');

$con = mysqli_connect(servidor, usuario, clave, base_datos, puerto);

?>


