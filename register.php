<?php
include_once "funciones.php";

$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$username = $_POST['usuario'];
$password = $_POST['password'];
$rol = $_POST['rol'];

    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT count(*) as total FROM usuarios WHERE username = ? OR correo = ? ");
    $sentencia->execute([$username, $correo]);
    $result = $sentencia->fetchAll();
    foreach ($result as $producto) {  
        $total = $producto->total;
    }
    if ($total != 0) {
        echo '<script language="javascript">';
        echo 'alert("El usuario ya se encuentra registrado");';
        echo 'window.location="Inicio.php";';
        echo '</script>';
    }else {
        $count = $bd->prepare("SELECT idUsuario FROM usuarios ORDER BY idUsuario ");
        $count->execute();
        $countA = $count->fetchAll();
        foreach ($countA as $idContinuo) {  
            $idNuevo = $idContinuo->idUsuario + 1;
        }

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $sentencia = $bd->prepare("INSERT INTO usuarios(idUsuario, nombre, correo, username, password, ActiveSesion, isAdmin) VALUES(?, ?, ?, ?, ?, ?, ?)");
        if($rol == null){
            $rol = "0";
        }
        $result = $sentencia->execute([$idNuevo, $nombre, $correo, $username, $passwordHash, "0", $rol]);
        if ($result == true) {
            echo '<script language="javascript">';
            echo 'alert("Usuario registrado exitosamente");';
            echo 'window.location="Inicio.php";';
            echo '</script>';
        }else {
            echo '<script language="javascript">';
            echo 'alert("Error al agregar usuario");';
            echo 'window.location="Inicio.php";';
            echo '</script>';
        }
    }

?>
