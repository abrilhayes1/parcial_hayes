<?php  
include_once("../components/include/header.php");
?>
<section class="row">
    <article class="col-6">
        <h2>Registrate</h2>
        <?php
            if(isset($_GET['pass'])){
                print "<p class='text-bg-danger p-3' >Las contraseñas <strong>no</strong> coinciden</p>";

            }
            if(isset($_GET['mail'])){
                print "<p class='text-bg-danger p-3' >Esta direccion de correo electronico ya esta registrada, por favor, inicie sesion.</p>";

            }
            if(isset($_GET['log'])){
                print "<p class='text-bg-success p-3' >Te podes registrar</p>";

            }
        ?>
        <form action="../components/security/alta_usr.php" method="post" >
            <div>
                <label for="nombre" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" required class="form-control"  >
            </div>
            <div>
                <label for="apellido" class="form-label">Apellido</label>
                <input id="apellido" name="apellido" type="text" required class="form-control"  >
        
            </div>
            <div>
                <label for="correo" class="form-label">Correo</label>
                <input id="correo" name="correo" type="email" required class="form-control" >
        
            </div>
            <div>
                <label for="contra_uno" class="form-label">Contraseña</label>
                <input id="contra_uno" name="contra_uno" type="password" required class="form-control" >
        
            </div>
            <div>
                <label for="contra_dos" class="form-label">Repetir Contraseña</label>
                <input id="contra_dos" name="contra_dos" type="password" required class="form-control" >
        
            </div>
            <div>
                <input type="submit" value="Registarme" class="btn btn-primary">
            </div>
        
        
        </form>
    </article>
    
</section>
<?php
include_once("../components/include/footer.php");
?>
