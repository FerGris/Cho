<?php
include_once "funciones.php";

$id_producto = $_POST['idProducto'];
$nombre = $_POST['nombreProducto'];
$precio = $_POST['precio'];
$typeProduct = $_POST['typeProducto'];
$content = $_POST['Content'];
$sabor = $_POST['Sabor'];
$existencia = $_POST['existencia'];
$edad = $_POST['limiteEdad'];
$imageID = $_POST['image_id'];
$categoria = $_POST['categoria'];


    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT count(*) as total FROM creatinas WHERE id_producto = ?");
    $sentencia->execute([$id_producto]);
    $result = $sentencia->fetchAll();
    foreach ($result as $producto) {  
        $total = $producto->total;
    }
    if ($total != 0) {
        echo '<script language="javascript">';
        echo 'alert("El producto ya se encuentra registrado");';
        echo 'window.location="productos.php";';
        echo '</script>';
    }else {
        $sentencia = $bd->prepare("INSERT INTO creatinas(id_producto, nombreProducto, precio, existencia, Content, typeProduct, Sabor, limiteEdad, image_id, categoria) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $sentencia->execute([$id_producto, $nombre, $precio, $existencia, $content, $typeProduct, $sabor, $edad, $imageID, $categoria]);
        if ($result == true) {
            echo '<script language="javascript">';
            echo 'alert("Producto registrado exitosamente");';
            echo 'window.location="productos.php";';
            echo '</script>';
        }else {
            echo '<script language="javascript">';
            echo 'alert("Error al agregar producto");';
            echo 'window.location="productos.php";';
            echo '</script>';
        }
    }

?>
