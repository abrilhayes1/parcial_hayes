<?php
include_once("../components/include/header.php");
?>

<section class="flex justify-center items-center min-h-screen bg-gray-100">
    <article class="bg-white shadow-md rounded-xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-purple-700">Registrate</h2>

        <?php
        if (isset($_GET['pass'])) {
            print "<p class='bg-red-100 text-red-700 p-3 rounded mb-4 text-sm text-center'>Las contraseñas <strong>no</strong> coinciden</p>";
        }
        if (isset($_GET['mail'])) {
            print "<p class='bg-red-100 text-red-700 p-3 rounded mb-4 text-sm text-center'>Esta dirección de correo electrónico ya está registrada. Por favor, iniciá sesión.</p>";
        }
        if (isset($_GET['log'])) {
            print "<p class='bg-green-100 text-green-700 p-3 rounded mb-4 text-sm text-center'>Te podés registrar</p>";
        }
        ?>

        <form action="../components/security/alta_usr.php" method="post" class="space-y-4">
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                <input id="nombre" name="nombre" type="text" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div>
                <label for="apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                <input id="apellido" name="apellido" type="text" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div>
                <label for="correo" class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
                <input id="correo" name="correo" type="email" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div>
                <label for="contra_uno" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <input id="contra_uno" name="contra_uno" type="password" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div>
                <label for="contra_dos" class="block text-sm font-medium text-gray-700 mb-1">Repetir Contraseña</label>
                <input id="contra_dos" name="contra_dos" type="password" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div>
                <input type="submit" value="Registrarme"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
            </div>
        </form>
    </article>
</section>

<?php
include_once("../components/include/footer.php");
?>