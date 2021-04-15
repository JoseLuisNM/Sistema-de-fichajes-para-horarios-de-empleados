<?php
session_start();

require('functions/connection.php');
require('functions/functions.php');
require('functions/sesion.php');

$errors = array();
if (isset($_POST['enviar'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $repContrasena = $_POST['repContrasena'];

    if (!esVacia($usuario, $contrasena, $repContrasena)) {

        if (!is_numeric($usuario)) {

            if (validaLargo($usuario)) {

                if (!usuarioExiste($usuario)) {

                    if (contrasenasIguales($contrasena, $repContrasena)) {

                        $hash = hashContrasena($contrasena);

                        if (registro($usuario, $hash)) {
                            $resultado = "El usuario se registro correctamente";
                        } else {
                            $errors[] = "Error en el registro";
                        }
                    } else {
                        $errors[] = "Las contraseñas no coinciden";
                    }
                } else {
                    $errors[] = "El usuario ya existe";
                }
            } else {
                $errors[] = "El usuario solo puede tener entre 3 y 20 caracteres";
            }
        } else {
            $errors[] = "Tu usuario no puede contener solo numeros";
        }
    } else {
        $errors[] = "Rellene todos los campos.";
    }
}
if (isset($_POST['iniciar'])) {
    header('Location:login.php');
}

?>

<?php include('templates/header.php'); ?>

<div class="container">
    <div class="row mt-5">

        <div class="col-8 m-auto bg-white rounded shadow p-0">
            <h4 class="text-center mb-4 text-secondary mt-5">REGÍSTRATE EN EL SISTEMA DE FICHAJES</h4>
            <div class="text-center">
                <img src="img/clock.svg" width="50" height="50">
            </div>
            <div class="col-12 bg-light py-3 mb-5 text-center">
                <p class="text-secondary m-0 p-0">Regístrate para acceder al sistema de fichajes para horarios de empleados.</p>
            </div>

            <?php
            if (isset($resultado)) {
            ?>
                <div class="bg-success text-white p-2 mx-5 text-center">
                    <?php echo $resultado; ?>
                </div>
            <?php
            }
            include('functions/errors.php');
            ?>

            <form method="POST" class="m-5">

                <label for="" class="text-secondary">Usuario:</label>
                <div class="input-group mb-5">
                    <div class="input-group-prepend">
                        <i class="input-group-text bg-primary text-white fas fa-user"></i>
                    </div>
                    <!-- Input para el usuario -->
                    <input type="text" placeholder="Nombre de usuario" autocomplete="off" name="usuario" class="form-control">
                </div>

                <div class="form-row">

                    <div class="col-6 mb-3">
                        <label for="" class="text-secondary">Contraseña:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="input-group-text bg-primary text-white fas fa-key"></i>
                            </div>
                            <!-- Input para la contraseña -->
                            <input type="password" placeholder="Contraseña" name="contrasena" class="form-control">
                        </div>
                    </div>

                    <div class="col-6 mb-3">
                        <label for="" class="text-secondary">Repite la contraseña:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="input-group-text bg-primary text-white fas fa-key"></i>
                            </div>
                            <!-- Input para la repetición de la contraseña -->
                            <input type="password" placeholder="Repite tu contraseña" name="repContrasena" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 offset-8">
                        <!-- Input del botón para enviar el formulario -->
                        <button name="enviar" class="btn btn-primary form-control">Registrarme</button></a>
                    </div>

                </div>

            </form>
            <form method="POST">
            <div class="col-4 m-5">
                <button name="iniciar" class="btn btn-success form-control">Iniciar sesión</button></a>
                <p class="text-secondary text-center">¿Ya tienes cuenta?</p>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include('templates/footer.php'); ?>