<?php 
include_once "encabezado.php" 
?>
<body class="bg-light">
    <section class="hero is-info">
        <div class="categorias" id="categorias">
            <div class="container">
            <main>
                <h2>Registro Usuario</h2>
                <hr/>
                <form action="register.php" method="POST">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Ingresa tus datos para registrarte</h4>
                        <form class="needs-validation" novalidate="">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" name="nombre" required="">
                                    <div class="invalid-feedback">
                                        Se requiere ingresar un nombre
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="firstName" class="form-label">Correo electrónico</label>
                                    <input type="text" class="form-control" name="email" placeholder="example@test.com" required="">
                                    <div class="invalid-feedback">
                                        Se requiere ingresar un correo electrónico
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="password" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" name="usuario" required="">
                                    <div class="invalid-feedback">
                                        Se requiere ingresar el nombre de usuario
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" required="" minlength="10">
                                    <div class="invalid-feedback">
                                        Se requiere ingresar la contraseña
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <button class="btn btn-success" type="submit">Registrar</button>
                                    <a href="login.php">¿Ya tiene una cuenta registrada?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </main>
            </div>
        </div>
<?php 
include_once "pie.php" ?>
