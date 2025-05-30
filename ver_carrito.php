<?php 
include_once "funciones.php";
iniciarSesionSiNoEstaIniciada();
?>

    <?php
include_once "encabezado.php";
$productos = obtenerProductosEnCarrito();
if (count($productos) <= 0) {
?>
<body>
    <section class="hero is-info">
        <div class="categorias" id="categorias">
            <div class="container">
                <h1 class="title">
                    Todavía no hay productos
                </h1>
                <h2 class="subtitle">
                    Visita la tienda para agregar productos a tu carrito
                </h2>
                <a href="Inicio.php" class="button is-warning">Ver tienda</a>
            </div>
        </div>
    </section>
<?php } else { ?>
    <div class="categorias" id="categorias">
        <div class="container">
        <h2 class="is-size-2">Mi carrito de compras</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($productos as $producto) {
                        $total += $producto->precio;
                    ?>
                        <tr>
                            <td><?php echo $producto->nombreProducto ?></td>
                            <td><?php echo $producto->content ?></td>
                            <td>$<?php echo number_format($producto->precio, 2) ?></td>
                            <td>
                                <form action="eliminar_del_carrito.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->id_producto ?>">
                                    <input type="hidden" name="redireccionar_carrito">
                                    <button class="btn btn-danger"> Eliminar producto
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                        <td colspan="2" class="is-size-4">
                            $<?php echo number_format($total, 2) ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <form action="terminar_compra.php" method="post">
                <!--<input type="hidden" name="total" value="<?php //echo number_format($total, 2) ?>">-->
                <button class="btn btn-success"> Proceder al pago
                    <i class="fa fa-trash-o"></i>
                </button>
            </form>
        </div>
    </div>
<?php } ?>
<?php include_once "pie.php" ?>