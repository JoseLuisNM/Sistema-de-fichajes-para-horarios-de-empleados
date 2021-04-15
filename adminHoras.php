<?php

session_start();
require('functions/connection.php');
require('functions/functions.php');

$errors = array();
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}

if (isset($_POST['volverAdmin'])) {
    header('Location:admin.php');
} elseif (isset($_POST['cerrarSesion'])) {
    header('Location:logout.php');
}
?>

<?php include('templates/header.php'); ?>
<form method="POST">
    <div class="table col-3 m-auto">
        <table class="table table-striped table-hover table-bordered">
            <div class="px-5 pb-2 text-success bg-dark text-center">
                <div>
                    <h1>Sesión iniciada por el usuari@: <?php echo $_SESSION['user']; ?> </h1>
                </div>

                <div class="text-center">
                    <button name="volverAdmin" class="btn btn-success m-auto">Volver a la pagina de Admin</button></a>
                    <button name="cerrarSesion" class="btn btn-danger">Cerrar sesión</button></a>
                </div>
                <div>
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">FECHA INTRODUCIDA</th>
                            <th class="text-center">HORAS TRABAJADAS</th>
                        </tr>
                    </thead>

                    <tbody id="developers">

                        <?php

                        global $mysqli;

                        $sql = "SELECT nombre, fecha_introducida, horas FROM empleados WHERE nombre ='" . $_SESSION['user'] . "'ORDER BY id DESC LIMIT 31";
                        $resultset = mysqli_query($mysqli, $sql) or die("database error:" . mysqli_error($mysqli));
                        while ($developer = mysqli_fetch_assoc($resultset)) {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $developer['nombre']; ?></td>
                                <td><?php echo $developer['fecha_introducida']; ?></td>
                                <td><?php echo $developer['horas']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
        </table>
    </div>

    <div class="text-center">
        <button name="volverAdmin" class="btn btn-success m-auto">Volver a la pagina de Admin</button></a>
        <button name="cerrarSesion" class="btn btn-danger">Cerrar sesión</button></a><br><br>
    </div>
</form>
    <?php include('templates/footer.php'); ?>