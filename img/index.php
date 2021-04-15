<?php
session_start();
require('functions/connection.php');
require('functions/functions.php');

if (!isset($_SESSION['user'])) {
  header('Location:login.php');
}
?>

<?php include('templates/header.php'); ?>

<div class="container">
  <div class="row mt-5">

    <div class="col-8 m-auto bg-white rounded shadow p-0">
      <h4 class="text-center mb-4 text-secondary mt-5">Registro de horas trabajadas</h4>

      <div class="px-5 pb-5 text-center">
        <h4>Estás logueado como: <?php echo $_SESSION['user']; ?> </h4><br><br>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-5">

          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Fecha actual</label>
            <div class="col-10">
              <input class="form-control" type="text" value="<?php echo date("d-m-Y") ?>" id="example-text-input">
            </div>
          </div>

          <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">Fecha de registro</label>
            <div class="col-10">
              <input class="form-control" type="date" value="" id="example-date-input">
            </div>
          </div>

          <div class="form-group row">
            <label for="example-number-input" class="col-2 col-form-label">Horas trabajdas</label>
            <div class="col-10">
              <input class="form-control" type="number" name="horas" value="" id="example-number-input">
            </div>
          </div>

          <div class="col-12 bg-light py-3 mb-5 text-center">
            <input type="submit" name="enviar" value="Introducir registro" class="btn btn-success m-auto">
          </div>
        </form>
          <div class="publicacion border-bottom">

          </div>
      </div>

      <div class="col-4 m-5">
        <a href="logout.php"><button class="btn btn-outline-secondary form-control">Cerrar sesión</button></a>
        <p class="text-secondary text-center">¿Quieres cerrar sesión?</p>
      </div>
    </div>
  </div>
</div>
<?php include('templates/footer.php'); ?>