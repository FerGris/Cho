<?php
include_once "funciones.php";

$userID = $_POST['userID'];

    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM creatinas WHERE id_producto = ?");
    $result = $sentencia->execute([$userID]);
    
    if ($result == true) {
        echo '<script language="javascript">';
        echo 'alert("El producto ha sido eliminado correctamente");';
        echo 'window.location="productos.php";';
        echo '</script>';
    }else {
            echo '<script language="javascript">';
            echo 'alert("No se pudo eliminar al usuario");';
            echo 'window.location="productos.php";';
            echo '</script>';
    }
?>
