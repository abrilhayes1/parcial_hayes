<?php
include_once("../components/include/header.php");
?>

<section class="flex justify-center items-center min-h-screen bg-gray-100">
    <article class="bg-white shadow-md rounded-xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-purple-700">Iniciar sesión</h2>

        <?php
        if (isset($_GET['reg'])) {
            print "<p class='bg-red-100 text-red-700 p-3 rounded mb-4 text-sm text-center'>Por favor, registrate</p>";
        }
        if (isset($_GET['usr'])) {
            print "<p class='bg-red-100 text-red-700 p-3 rounded mb-4 text-sm text-center'>Usuario y/o Contraseña incorrectos</p>";
        }
        ?>

        <form action="../components/security/login.php" method="post" class="space-y-4">
            <div>
                <label for="usuario" class="block text-sm font-medium text-gray-700 mb-1">Usuario / Correo</label>
                <input id="usuario" name="usuario" type="email" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
            </div>

            <div>
                <label for="clave" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <input id="clave" name="clave" type="password" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
            </div>

            <div>
                <input type="submit" value="Ingresar"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
            </div>
        </form>
    </article>
</section>

<?php
include_once("../components/include/footer.php");
?>