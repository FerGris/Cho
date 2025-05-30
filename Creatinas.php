<?php
    include_once "encabezado.php"; ?>
    <?php
    include_once "funciones.php";
    $productos = obtenerProductos("CR");
?>
<body>

    <div class="banner">
        <div class="container">
            <h2>CREATINAS</h2>
            <p>Los mejores productos al mejor precio proteinas, sumplementos y creatinas.</p>
            
        </div>
    </div>
    <div class="categorias" id="categorias">
        <div class="container">
            <h2>Creatina</h2>
            <div class="categoria">
                <div class="car">
                     <div class="contenedor">
                        <table>
                            <?php foreach ($productos as $producto) { ?>
                                <tr>
                                    <td>
                                        <img src="Imagenes/<?php echo $producto->image_id ?>.png" alt="Categoria 1">
                                    </td>
                                    <td>
                                        <h3><?php echo $producto->nombreProducto ?></h3>
                                        <h3> Precio: $<?php echo number_format($producto->precio, 2) ?></h3>
                                        <h3>Forma del producto: <?php echo $producto->typeProduct ?><br>
                                            Contenido: <?php echo $producto->Content ?><br>
                                            Sabor: <?php echo $producto->Sabor ?><br>
                                            Rango de edad: <?php echo $producto->limiteEdad ?>
                                        </h3>
                                        <form action="agregar_al_carrito.php" method="post">
                                        <input type="hidden" name="id_producto" value="<?php echo $producto->id_producto ?>"/>
                                        <button class="btn btn-success">
                                            <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <a href="Inicio.php">Regresar al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once "pie.php" 
?>