
<?php 
include_once "funciones.php";
iniciarSesionSiNoEstaIniciada();
?>

    <?php
include_once "encabezado.php";
//$total = $_POST["total"];
$productos = obtenerProductosEnCarrito();
if (count($productos) <= 0) {
?>
 <meta http-equiv="refresh" content="0;url=Inicio.php">
<?php }else { ?>
  <body class="bg-light">
    <section class="hero is-info">
        <div class="categorias" id="categorias">
            <div class="container">
            <main>
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Tu carro</span>
                        <span class="badge bg-primary rounded-pill"><?php echo $producto->total; ?></span>
                        </h4>
                        <ul class="list-group mb-3">
                        <?php
                        $total = 0;
                        foreach ($productos as $producto) {
                            $total += $producto->precio;
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                            <h6 class="my-0"><?php echo $producto->nombreProducto ?></h6>
                            </div>
                            <span class="text-muted">$<?php echo number_format($producto->precio, 2) ?></span>
                        </li>
                        <?php } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (MXN)</span>
                            <strong>$<?php echo number_format($total, 2) ?></strong>
                        </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <form action="finaliza_compra.php" method="POST">
                            <h4 class="mb-3">Dirección de envio</h4>
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Se requiere un nombre válido.
                                    </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Se requiere apellido válido.
                                    </div>
                                    </div>

                                    <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-muted">(Opcional)</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="tu@example.com">
                                    <div class="invalid-feedback">
                                        Ingresa una dirección de correo electrónico válida para actualizaciones de envío.
                                    </div>
                                    </div>

                                    <div class="col-12">
                                    <label for="address" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="address" placeholder="Calle lindavista No. 54" required="">
                                    <div class="invalid-feedback">
                                        Por favor introduce tu direccion de envio.
                                        Please enter your shipping address.
                                    </div>
                                    </div>

                                    <div class="col-12">
                                    <label for="address2" class="form-label">Dirección 2 <span class="text-muted">(Opcional)</span></label>
                                    <input type="text" class="form-control" id="address2" placeholder="Apartamento o Casa">
                                    </div>

                                    <div class="col-md-5">
                                    <label for="country" class="form-label">País</label>
                                    <select class="form-select" id="country" required="">
                                        <option value="">Elige...</option>
                                        <option>México</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Selecciona un país válido.
                                    </div>
                                    </div>

                                    <div class="col-md-4">
                                    <label for="state" class="form-label">Estado</label>
                                    <select class="form-select" id="state" required="">
                                        <option value="">Elige...</option>
                                        <option>Aguascalientes</option>
                                        <option>Baja California</option>
                                        <option>Baja California Sur</option>
                                        <option>Campeche</option>
                                        <option>Chiapas</option>
                                        <option>Chihuahua</option>
                                        <option>Ciudad de México</option>
                                        <option>Coahuila</option>
                                        <option>Colima</option>
                                        <option>Durango</option>
                                        <option>Estado de México</option>
                                        <option>Guanajuato</option>
                                        <option>Guerrero</option>
                                        <option>Hidalgo</option>
                                        <option>Jalisco</option>
                                        <option>Michoacán</option>
                                        <option>Morelos</option>
                                        <option>Nayarit</option>
                                        <option>Nuevo León</option>
                                        <option>Oaxaca</option>
                                        <option>Puebla</option>
                                        <option>Querétaro</option>
                                        <option>Quintana Roo</option>
                                        <option>San Luis Potosí</option>
                                        <option>Sinaloa</option>
                                        <option>Sonora</option>
                                        <option>Tabasco</option>
                                        <option>Tamaulipas</option>
                                        <option>Tlaxcala</option>
                                        <option>Veracruz</option>
                                        <option>Yucatán</option>
                                        <option>Zacatecas </option>
                                    </select>
                                    </select>
                                    <div class="invalid-feedback">
                                        Proporciona un estado válido.
                                    </div>
                                    </div>

                                    <div class="col-md-3">
                                    <label for="zip" class="form-label">Código postal</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Código postal requerido.
                                    </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <h4 class="mb-3">Pago</h4>

                                <div class="my-3">
                                    <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                                    <label class="form-check-label" for="credit">Tarjeta de crédito</label>
                                    </div>
                                    <div class="form-check">
                                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
                                    <label class="form-check-label" for="debit">Tarjeta de débito</label>
                                    </div>
                                </div>

                                <div class="row gy-3">
                                    <div class="col-md-6">
                                    <label for="cc-name" class="form-label">Nombre del usuario de la tarjeta</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                    <small class="text-muted">Nombre completo como se muestra en la tarjeta</small>
                                    <div class="invalid-feedback">
                                        Se requiere el nombre en la tarjeta
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <label for="cc-number" class="form-label">Número de tarjeta de crédito</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required="" maxlength="18" minlength="16">
                                    <div class="invalid-feedback">
                                        Se requiere número de tarjeta de crédito
                                    </div>
                                    </div>

                                    <div class="col-md-3">
                                    <label for="cc-expiration" class="form-label">Vencimiento</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="" maxlength="5" minlength="5">
                                    <div class="invalid-feedback">
                                        Fecha de vencimiento requerida
                                    </div>
                                    </div>

                                    <div class="col-md-3">
                                    <label for="cc-cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="" maxlength="4" minlength="3">
                                    <div class="invalid-feedback">
                                        Código de seguridad requerido
                                    </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <button class="btn btn-primary btn-lg" type="submit">Continuar con el pago</button>
                            </form>
                        </form>
                    </div>
                </div>
            </main>
        </div>
        </div>
<?php }
include_once "pie.php" ?>