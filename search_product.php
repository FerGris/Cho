<?php
include_once "funciones.php";

$producto = strtolower($_POST['producto']);
echo $producto;
    if ($producto == 'creatinas' || $producto == 'creatina' || $producto == 'creatina birdman' || $producto == 'creatina valara' || $producto == 'creatina h5' || $producto == 'creatinas birdman' || $producto == 'creatinas valara' || $producto == 'creatinas h5') {
        echo '<script language="javascript">';
        echo 'window.location="Creatinas.php";';
        echo '</script>';
    }else if($producto == 'proteina' || $producto == 'proteinas' || $producto == 'proteina birdman' || $producto == 'proteina falcon blue' || $producto == 'proteina whey' || $producto == 'proteinas birdman' || $producto == 'proteinas falcon blue' || $producto == 'proteinas whey') {
        echo '<script language="javascript">';
        echo 'window.location="Proteinas.php";';
        echo '</script>';
    }else if($producto == 'vitamina' || $producto == 'vitaminas' || $producto == 'vitamina coconut oil d3+k2' || $producto == 'vitamina mens blend' || $producto == 'vitamina ments platinum' || $producto == 'vitaminas coconut oil d3+k2' || $producto == 'vitaminas mens blend' || $producto == 'vitaminas ments platinum') {
        echo '<script language="javascript">';
        echo 'window.location="Vitaminas.php";';
        echo '</script>';
    }else {
            echo '<script language="javascript">';
            echo 'alert("Producto no encontrado");';
            echo 'window.location="Inicio.php";';
            echo '</script>';
    }
?>
