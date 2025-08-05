<?php 
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");

$id = intval($_GET['id']);

$query = "SELECT * FROM usuarios WHERE id_usuarios = $id";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result); 

if (!$user) {
    echo "Usuario no encontrado.";
    exit;
}

$tipo = ($user['fk_id_tipo_usuario'] == 1) ? "Administrador" : "Cliente";
?>

<section class="py-12 bg-gradient-to-b from-purple-200 to-white min-h-screen">
    <div class="max-w-lg mx-auto bg-white text-black rounded-xl shadow-md p-8 mt-10">
        <h1 class="text-2xl font-bold text-purple-700 mb-6 text-center">Información de Perfil</h1>

        <div class="space-y-4 text-left">
            <p><span class="font-semibold">Nombre:</span> <?= $user['nombre'] . ' ' . $user['apellido']; ?></p>
            <p><span class="font-semibold">Email:</span> <?= $user['mail']; ?></p>
            <p><span class="font-semibold">Fecha de registro:</span> <?= date('d/m/Y H:i', strtotime($user['fecha_registro'])); ?></p>
            <p><span class="font-semibold">Tipo:</span> <?= $tipo; ?></p>
        </div>

        <div class="mt-6 text-center">
            <a href="ver_usuarios.php" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded">
                Volver
            </a>
        </div>
    </div>
</section>

<?php include_once("../components/include/footer.php"); ?>
