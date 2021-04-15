<?php

    function esVacia($usuario, $contrasena, $repContrasena){

        if(!empty(trim($usuario)) && !empty(trim($contrasena)) && !empty(trim($repContrasena))){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    function validaLargo($usuario){
        if(strlen(trim($usuario)) > 3 && strlen(trim($usuario)) < 20){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function usuarioExiste($usuario){
        global $mysqli;

        $_usuario= trim($usuario);
        $sql = "SELECT id FROM users WHERE usuario = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s",$_usuario);
        $stmt->execute();
        $stmt->store_result();
        $numRows = $stmt->num_rows();
        $stmt->close();
        if($numRows > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function contrasenasIguales($contrasena, $repContrasena){
        if(strcmp($contrasena,$repContrasena) == 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function hashContrasena($contrasena){
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        return $hash;
    }

    function registro($usuario, $contrasena){
        global $mysqli;

        $_usuario = trim($usuario);
        $fecha = date("Y-m-d:H:i:s");

        $id = NULL;
        $ultima = NULL;

        $sql = "INSERT INTO users(usuario, contrasena, fecha_registro) VALUES(?,?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sss", $_usuario, $contrasena, $fecha);

        if($stmt->execute()){
            $stmt->close();
            return TRUE;
        }else{
            $stmt->close();
            return FALSE;
        }
    }

    function loginVacio($usuario, $contrasena){
        if(!empty(trim($usuario)) && !empty(trim($contrasena))){
            return FALSE;
        }else{
            return TRUE;
        }
    }


    function login($usuario, $contrasena){

        global $mysqli;

        $sql = "SELECT id, contrasena, tipo_usuario FROM users WHERE usuario = ?";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s",$usuario);
        $stmt->execute();
        $stmt->store_result();

        $numRows = $stmt->num_rows();

        if ($numRows > 0) {
            $stmt->bind_result($id, $contra, $tipo_usuario);
            $stmt->fetch();

            $contraValidada = password_verify($contrasena, $contra);

            if($contraValidada){

                if($tipo_usuario == 1){
                    $_SESSION['user'] = $usuario;
                    $lastSession = lastSession($id);
                    header('Location:admin.php');
                }else{
                        $_SESSION['user'] = $usuario;
                        $lastSession = lastSession($id);
                        header('Location:index.php');
                }
            
        }else{
            return "Las contraseñas no coinciden";
        }
    }
    return "El usuario no existe";
}

    function lastSession($id){
        global $mysqli;

        $stmt = $mysqli->prepare("UPDATE users SET ultima_conexion=NOW() WHERE id=?");
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            if($stmt->affected_rows > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }

    function fechaInicio($fechaActual){

        $fechaInicio = 0;
        $dia = date("d", $fechaActual);


        if ($dia >= 5) {

            $fechaInicio = time() - (($dia) * 24 * 60 * 60);
            
        } else {

            if (date("m", $fechaActual) == 03) $diasMes = 28;
            elseif ((date("m", $fechaActual) % 2 == 0) || date("m", $fechaActual) == 9) $diasMes = 31;
            elseif (date("m", $fechaActual) % 2 != 0) $diasMes = 30;

            $fechaInicio = time() - (($dia) * 24 * 60 * 60) - ($diasMes * 24 * 60 * 60);
        }

        return $fechaInicio;
    }

    function registroFecha($nombre, $fecha_reg, $horas)
    {
        global $mysqli;

        $_nombre = trim($nombre);
        $_fechaReg = date("d-m-Y", $fecha_reg);
        $_horas = trim($horas);

        $id = NULL;
        $ultima = NULL;

        $sql = "INSERT INTO empleados(nombre, fecha_introducida, horas) VALUES(?,?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssi", $_nombre, $_fechaReg, $_horas);

        if ($stmt->execute()) {
            $stmt->close();
            return TRUE;
        } else {
            $stmt->close();
            return FALSE;
        }
    }

?>