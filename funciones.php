<?php

function hizoLogin()
{
    $bd = obtenerConexion();
    $idSesion = session_id();
    $sentencia = $bd->prepare("SELECT * FROM usuarios WHERE id_sesion = ? ");
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}

function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion();
    $idSesion = session_id();
    $sentencia = $bd->prepare("SELECT creatinas.id, creatinas.nombreProducto, creatinas.content, creatinas.precio, creatinas.id_producto
     FROM creatinas
     INNER JOIN carrito_usuarios
     ON creatinas.id_producto = carrito_usuarios.id_producto
     WHERE carrito_usuarios.id_sesion = ? ");
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}

function obtenerCantidadProductosEnCarrito()
{
    $bd = obtenerConexion();
    $idSesion = iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT count(*) as total FROM carrito_usuarios WHERE carrito_usuarios.id_sesion = ? ");
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}

function quitarProductoDelCarrito($idProducto)
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE id_sesion = ? AND id_producto = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
}

function obtenerProductos($idProducto)
{
    $consul;
    if($idProducto=="CR"){
        $consul = "creatinas";
    }
    elseif($idProducto=="PR"){
        $consul = "proteinas";
    }elseif($idProducto=="VI"){
        $consul = "vitaminas";
    }
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT nombreProducto, precio, existencia, id_producto, image_id, typeProduct, Content, Sabor, limiteEdad FROM creatinas WHERE categoria = '$consul'");
    return $sentencia->fetchAll();
}

function obtenerProductosA()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT nombreProducto, precio, existencia, id_producto, typeProduct, Content, Sabor, limiteEdad, categoria FROM creatinas ORDER BY id_producto");
    return $sentencia->fetchAll();
}

function obtenerUsuarios()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT idUsuario, nombre, correo, username, isAdmin FROM usuarios");
    return $sentencia->fetchAll();
}

function obtenerIdsDeProductosEnCarrito()
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT id_producto FROM carrito_usuarios WHERE id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}

function verificarProductoCarrito($producto)
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT count(id_producto) as total FROM carrito_usuarios WHERE id_sesion = ? AND id_producto = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion,$producto]);
    return $sentencia->fetchAll();
}

function verificarExistencia($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT existencia FROM creatinas WHERE id_producto = ?");
    $sentencia->execute([$idProducto]);
    return $sentencia->fetchAll();
}

function agregarProductoAlCarrito($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $sentencia = $bd->prepare("INSERT INTO carrito_usuarios(id_sesion, id_producto) VALUES (?, ?)");
    return $sentencia->execute([$idSesion, $idProducto]);
}


function iniciarSesionSiNoEstaIniciada()
{
    
    if (session_status() !== PHP_SESSION_ACTIVE) {
       session_start();
    }
    return session_id();
}

function eliminarProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM productos WHERE id = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($nombre, $precio, $descripcion)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO productos(nombre, precio, descripcion) VALUES(?, ?, ?)");
    return $sentencia->execute([$nombre, $precio, $descripcion]);
}

function compraProducto($existencia,$idProducto)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE creatinas SET existencia = ? WHERE id_producto = ?");
    return $sentencia->execute([$existencia, $idProducto]);
}

function vaciaCarrito($idProducto){
    {
        $bd = obtenerConexion();
        iniciarSesionSiNoEstaIniciada();
        $idSesion = session_id();
        $sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE id_producto = ? AND id_sesion = ?");
        return $sentencia->execute([$idProducto, $idSesion]);
    }
}

function guardarUsuario($nombre, $correo, $username, $password)
{
    $bd = obtenerConexion();
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sentencia = $bd->prepare("INSERT INTO usuarios(nombre, correo, username, password) VALUES(?, ?, ?, ?)");
    return $sentencia->execute([$nombre, $correo, $username, $passwordHash]);
}


function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}
function obtenerConexion()
{
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
function editarProducto($id, $nombre, $precio, $type, $content, $sabor, $existencia, $limiteEdad, $categoria)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE creatinas SET nombreProducto = ?, precio = ?, typeProduct = ?, Content = ?, Sabor = ?, existencia = ?, limiteEdad = ?, categoria = ? WHERE id_producto = ?");
    return $sentencia->execute([$nombre, $precio, $type, $content, $sabor, $existencia, $limiteEdad, $categoria, $id]);
}

