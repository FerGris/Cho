<?php
include_once "funciones.php";
$producto = $_POST["id_producto"];
$total = verificarExistencia($producto);
foreach ($total as $inv) {
    if($inv->existencia == '0'){
    echo '<script language="javascript">';
    echo 'alert("No se puede añadir el artículo al carrito ya que no se tiene en existencia");';
    echo 'window.location="Inicio.php";';
    echo '</script>';
    }else if($inv->existencia > '0'){
    $total = verificarProductoCarrito($producto);
    foreach ($total as $inv) {
        if($inv->total > '0'){
        echo '<script language="javascript">';
        echo 'alert("No se puede añadir el artículo al carrito ya que ya había sido añadido");';
        echo 'window.location="Inicio.php";';
        echo '</script>';
        }else{
            agregarProductoAlCarrito($_POST["id_producto"]);
            header("Location: inicio.php");
        }
    }
}
}