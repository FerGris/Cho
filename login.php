<?php include_once "encabezado.php";?>
<body class="bg-light">
    <section class="hero is-info">
        <div class="categorias" id="categorias">
            <div class="container">
            <main>
                <h2>Inicia Sesión</h2>
                <hr/>
                <form action="validate.php" method="POST">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Ingresa tus datos para iniciar sesión</h4>
                        <form class="needs-validation" novalidate="">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Correo electrónico</label>
                                    <input type="text" class="form-control" name="email" placeholder="example@test.com" required="">
                                    <div class="invalid-feedback">
                                        Se requiere ingresar un correo electrónico
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" required="">
                                    <div class="invalid-feedback">
                                        Se requiere ingresar la contraseña
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="codigo" class="form-label">Código de verificación</label>
                                    <input type="text" name="codigo" class="form-control" placeholder="Ingresa el texto de la imagen" required="">
                                </div>

                                <div class="mb-3">
                                    <img src="funcs/genera_codigo.php" alt="Código de verificación" id="img-codigo">
                                    &nbsp;
                                    <button type="button" class="btn btn-primary btn-sm" id="regenera">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                                        </svg>
                                    </button>
                                    &nbsp;
                                    Genera nuevo
                                </div>
                                <div class="col-sm-7">
                                    <button class="btn btn-primary btn-lg" type="submit">Iniciar sesión</button>
                                    <a href="registra_usuario.php">¿No tiene una cuenta registrada?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </main>
            </div>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const imgCodigo = document.getElementById('img-codigo');
            const btnGenera = document.getElementById('regenera');

            if (imgCodigo && btnGenera) {
                btnGenera.addEventListener('click', generaCodigo);
            }

            /**
             * Función que realiza una solicitud fetch para obtener una imagen generada.
             * La imagen se asigna dinámicamente a la propiedad 'src' de la imagen en el documento.
             */
            function generaCodigo() {
                let url = 'funcs/genera_codigo.php';

                fetch(url)
                    .then(response => response.blob())
                    .then(data => {
                        if (data) {
                            imgCodigo.src = URL.createObjectURL(data);
                        }
                    });
            }
        });
        </script>
<?php 
include_once "pie.php" ?>
