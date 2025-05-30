<?php
include_once "funciones.php";
$id_sesion = iniciarSesionSiNoEstaIniciada();
$correo = $_POST['email'];
$password = $_POST['password'];
$codigo = $_POST['codigo'];


$bd = obtenerConexion();
$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE correo = ?");
$sentencia->execute([$correo]);
$result = $sentencia->fetchAll();
foreach ($result as $producto) {  
    $verify_pass = $producto->password;
}

$codigoVerificacion = isset($_SESSION['codigo_verificacion']) ? $_SESSION['codigo_verificacion'] : '';
$captcha = sha1($codigo);

if ($codigoVerificacion !== $captcha) {
    $_SESSION['codigo_verificacion'] = '';
    echo '<script language="javascript">';
    echo 'alert("El código de verificación es incorrecto");';
    echo 'window.location="login.php";';
    echo '</script>';
}else{
    if (password_verify($password, $verify_pass)) {
        $sentencia = $bd->prepare("UPDATE usuarios SET id_sesion = ?, ActiveSesion = '1' WHERE correo = ?");
        $sentencia->execute([$id_sesion, $correo]);
        echo '<script language="javascript">';
        echo 'window.location="Inicio.php";';
        echo '</script>';
    }else {
        echo '<script language="javascript">';
        echo 'alert("Credenciales Inválidas");';
        echo 'window.location="login.php";';
        echo '</script>';
    }
}

?>