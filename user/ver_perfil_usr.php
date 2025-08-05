<?php
require_once("../components/conf/conf.php");
include_once("../components/include/header.php");

if (!isset($_SESSION['id_usuarios'])) {
    header("Location: login.php");
    exit;
}

$id = intval($_SESSION['id_usuarios']);
$query = "SELECT * FROM usuarios WHERE id_usuarios = $id";
$resultado = mysqli_query($con, $query);
$usuario = mysqli_fetch_assoc($resultado);
?>

<section class="class=" bg-gray-100 min-h-screen py-10 px-4">


    <div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-8">

        <h2 class="text-2xl font-bold mb-6 text-center text-purple-700">Editar perfil</h2>

        <?php if (isset($_GET['edit']) && $_GET['edit'] == "ok"): ?>
            <div class="bg-green-100 border border-green-500 text-green-700 p-4 rounded mb-4 text-center">
                ✅ Perfil actualizado correctamente.
            </div>
        <?php endif; ?>

        <form action="editar_perfil.php" method="POST" class="space-y-6">
            <div>
                <label class="block font-medium mb-1" for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?= $usuario['nombre'] ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div>
                <label class="block font-medium mb-1" for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" value="<?= $usuario['apellido'] ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div>
                <label class="block font-medium mb-1" for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?= $usuario['fecha_nacimiento'] ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-2 rounded transition duration-200">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
</section>

<?php include_once("../components/include/footer.php"); ?>