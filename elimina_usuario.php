<?php
include_once "funciones.php";

$userID = $_POST['userID'];

    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM usuarios WHERE idUsuario = ?");
    $result = $sentencia->execute([$userID]);
    
    if ($result == true) {
        echo '<script language="javascript">';
        echo 'alert("El usuario ha sido eliminado correctamente");';
        echo 'window.location="usuarios.php";';
        echo '</script>';
    }else {
            echo '<script language="javascript">';
            echo 'alert("No se pudo eliminar al usuario");';
            echo 'window.location="usuarios.php";';
            echo '</script>';
    }
?>
