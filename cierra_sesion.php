<?php
include_once "funciones.php";
$prueba = hizoLogin();
foreach ($prueba as $test2) {
    $nombre = $test2->nombre;
  } 
    $bd = obtenerConexion();
    $idSesion = iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("UPDATE usuarios SET id_sesion = ' ', ActiveSesion = '0' WHERE id_sesion = ?");
    $sentencia->execute([$idSesion]);
    $sentencia->fetchAll();
    header("Location: Inicio.php");
   /* session_start();
session_unset();  // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión
*/
  
?>