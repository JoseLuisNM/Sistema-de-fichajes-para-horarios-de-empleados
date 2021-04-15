<?php
session_start();

require('functions/connection.php');
require('functions/functions.php');
require('functions/sesion.php');

$errors = array();
if (isset($_POST['enviar'])) {
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $contrasena = $mysqli->real_escape_string($_POST['contrasena']);

    if (!loginVacio($usuario, $contrasena)) {
        $errors[] = login($usuario, $contrasena);
    } else {
        $errors[] = "Rellene todos los campos.";
    }
}
if (isset($_POST['registrarte'])) {
    header('Location:registro.php');
}

?>

<?php include('templates/header.php'); ?>

<div class="container">
    <div class="row mt-5">

        <div class="col-8 m-auto bg-white rounded shadow p-0">

            <h4 class="text-center mb-4 text-secondary mt-5">INICIAR SESIÓN EN EL SISTEMA DE FICHAJES</h4>
            <div class="text-center">
                <img src="img/clock.svg" width="50" height="50">
            </div>
            <div class="col-12 bg-light py-3 mb-5 text-center">
                <p class="text-secondary m-0 p-0">Inicia sesión para registrar horas en el sistema de fichajes para horarios de empleados.</p>
            </div>
            <?php include('functions/errors.php'); ?>

            <form method="POST" class="m-5">

                <label for="" class="text-secondary">Usuario:</label>
                <div class="input-group mb-5">
                    <div class="input-group-prepend">
                        <i class="input-group-text bg-primary text-white fas fa-user"></i>
                    </div>
                    <!-- Input para el usuario -->
                    <input type="text" placeholder="Nombre de usuario" name="usuario" autcomplete="off" class="form-control">
                </div>

                <div class="form-row">

                    <div class="col-12 mb-3">
                        <label for="" class="text-secondary">Contraseña:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="input-group-text bg-primary text-white fas fa-key"></i>
                            </div>
                            <!-- Input para la contraseña -->
                            <input type="password" placeholder="Contraseña" name="contrasena" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 offset-8">
                        <!-- Input del botón para enviar el formulario -->
                        <button name="enviar" class="btn btn-primary form-control">Iniciar sesión</button></a>
                    </div>

                </div>

            </form>
            <form method="POST">
                <div class="col-4 m-5">
                    <button name="registrarte" class="btn btn-success form-control">Registrarte</button></a>
                    <p class="text-secondary text-center">¿No tienes cuenta?</p>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('templates/footer.php'); ?>