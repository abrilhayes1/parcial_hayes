<?php  
include_once("../components/include/header.php");
?>

<section>
    <article class="col-6">

        <h2>Login</h2>
        <?php
        if (isset($_GET['reg'])) {
            print "<p class='text-bg-danger p-3' >Por favor, registrate</p>";
        }
        if (isset($_GET['usr'])) {
            print "<p class='text-bg-danger p-3' >Usuario y/o Contraseña incorrectos</p>";
        }

        ?>
        <form action="../components/security/login.php" method="post">
            <div>
                <label for="usuario" class="form-label">Usuario/Correo</label>
                <input id="usuario" name="usuario" type="email" required class="form-control">

            </div>
            <div>
                <label for="clave" class="form-label">Contraseña</label>
                <input id="clave" name="clave" type="password" required class="form-control">
            </div>
            <div>
                <input type="submit" value="Ingresar" class="btn btn-primary">
            </div>


        </form>
    </article>
</section>
<?php
include_once("../components/include/footer.php");
?>
