<?php
include_once "funciones.php";
$id_sesion = iniciarSesionSiNoEstaIniciada();
$productos = obtenerProductosEnCarrito();
if (count($productos) > 0) {
    foreach ($productos as $producto) {
        $total = verificarExistencia($producto->id_producto);
        foreach ($total as $inv) {
            if($inv->existencia == '0'){
            echo '<script language="javascript">';
            echo 'alert("No se puede realizar la compra ya que el artículo '.$producto->nombreProducto.' no se tiene en existencia");';
            echo 'window.location="Inicio.php";';
            echo '</script>';
            }else{
                $nuevotot = $inv->existencia - 1;
                compraProducto($nuevotot,$producto->id_producto);
                vaciaCarrito($producto->id_producto);
            }
        }
    }
    echo '<script language="javascript">';
    echo 'alert("Compra exitosa");';
    echo 'window.location="Inicio.php";';
    echo '</script>';
}
/*$correo = $_POST['email'];
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
  */    
   /* }
}*/

?>