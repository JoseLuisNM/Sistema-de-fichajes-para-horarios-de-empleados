<?php
session_start();
require('functions/connection.php');
require('functions/functions.php');

$errors = array();
if (!isset($_SESSION['user'])) {
  header('Location:login.php');
}

if (isset($_POST['enviar'])) {

  $horas = $_POST['horas'];
  $fecha = strtotime($_POST['fecha_reg']);
  $nombre = $_SESSION['user'];
  $fechaActual = $_POST['fecha_actual'];

  $fechaActual = time();

  $fechaInicial = fechaInicio($fechaActual);
  $fechaIntroducida = strtotime($_POST['fecha_reg']);

  if (empty($fecha) || empty(trim($horas))) {
    $errors[] = "Complete todos los campos";
  } else {

    if (($fechaIntroducida > $fechaActual) || ($fechaIntroducida < $fechaInicial)) {

      $errors[] = "La fecha introducida no se encuentra en el rango correcto, 
                  el rango correcto para introducir las horas del mes anterior, es del dia 1 al 5 del mes actual,
                  y no es posible introducir registros en fechas posteriores.";
    } else {

      if (registroFecha($nombre, $fecha, $horas)) {
        $resultado = "Registro introducido con exito";
      }
    }
    //registroFecha($nombre, $fecha, $horas);
    //$resultado = "Fecha introducida con exito";
  }
}

if (isset($_POST['ver_reg'])) {
  header('Location:registros.php');
} elseif (isset($_POST['cerrarSesion'])) {
  header('Location:logout.php');
}

?>

<?php include('templates/header.php'); ?>

<div class="container">
  <div class="row mt-5">

    <div class="col-8 m-auto bg-white rounded shadow p-0">
      <h4 class="text-center mb-4 text-secondary mt-5">Sistema de fichajes para horarios de empleados</h4><br>

      <div class="text-center">
        <img src="img/clock.svg" width="50" height="50">
      </div>

      <div class="px-5 pb-5 text-center">
        <h4>Sesión iniciada por el usuari@: "<?php echo $_SESSION['user']; ?>" </h4>
        <div>
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
        </div>
        <form method="POST" class="m-5">

          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Fecha actual</label>
            <div class="col-10">
              <input class="form-control" type="text" name="fecha_actual" value="<?php echo date("d-m-Y") ?>" id="example-text-input" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">Fecha de registro</label>
            <div class="col-10">
              <input class="form-control" type="date" name="fecha_reg" value="" id="example-date-input">
            </div>
          </div>

          <div class="form-group row">
            <label for="example-number-input" class="col-2 col-form-label">Horas trabajdas</label>
            <div class="col-10">
              <input class="form-control" type="number" name="horas" value="" id="example-number-input">
            </div>
          </div>

          <div class="col-12 py-3 mb-5 text-center">
            <button name="enviar" type="submit" class="btn btn-success m-auto">Introducir registro</button>
            <button name="ver_reg" type="submit" class="btn btn-success m-auto">Ver registros</button>
          </div>
        </form>
        <div class="publicacion border-bottom">
        </div>
      </div>
      <form method="post">
        <div class="col-5 m-8">
          <button name="cerrarSesion" class="btn btn-danger form-control">Cerrar sesión</button></a>
          <p class="text-secondary text-center">¿Quiere iniciar sesión con otro usuario?</p>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include('templates/footer.php'); ?>