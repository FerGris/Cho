<?php 
    include_once "funciones.php";
    $productos = obtenerCantidadProductosEnCarrito();
    $hizoLogin = hizoLogin(); 
    foreach ($productos as $producto) {  }
    foreach ($hizoLogin as $nombre) {  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="form-validation.css" rel="stylesheet">
    <title>PRIMFIT</title>
    <body>
    <style>
        body 
        .video-background {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            transform: translate(-50%, -50%);
        }
        .content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
        }
    </style>
</head>
<body>

    <video autoplay muted loop class="video-background">
        <source src="man.mp4" type="video/mp4">
        Tu navegador no soporta el video.
    </video>

    <style>
        /* Reset de estilo básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilo general del cuerpo */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f4f4f4;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
        /* Contenedor principal */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        /* Estilo del encabezado */
        header {
            background: rgba(51, 51, 51, 0.8);
            color: #fff;
            padding: 10px 0;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        header .logo {
            display: flex;
            align-items: center;
        }

        header .logo img {
            margin-right: 10px;
            max-width: 100%;
            height: auto;
        }

        header .logo h1 {
            font-size: 1.8em;
        }

        header nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        header nav .barra-busqueda {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        header nav .barra-busqueda input[type="text"] {
            padding: 5px;
            border: none;
            border-radius: 3px;
        }

        header nav .barra-busqueda button {
            padding: 5px 10px;
            border: none;
            background: #555;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
            margin-left: 5px;
        }

        header nav .barra-busqueda button:hover {
            background: #666;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 3px;
            margin-left: 15px;
        }

        header nav a:hover {
            background: #575757;
        }

        /* Estilo del banner principal */
        .banner {
            background: rgba(0, 0, 0, 0.6) url('banner.jpg') no-repeat center center/cover;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }

        .banner h2 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .banner p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .banner .cta {
            background: #f04e23;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }

        .banner .cta:hover {
            background: #e03d14;
        }

        /* Estilo de categorías */
        .categorias {
            padding: 20px 0;
            background: rgba(249, 249, 249, 0.9);
        }

        .categorias h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .categoria {
              width: 80%; /* o un ancho fijo, como 600px */
    max-width: 600px; /* Opcional: límite máximo de ancho */
    margin: 0 auto; /* Centra horizontalmente */
    text-align: center;
        }

        .categoria img {

    flex-wrap: wrap; /* Permite que los elementos se ajusten */
    gap: 20px; /* Espacio entre elementos */
            max-width: 100%;
            height: auto;
        }

        .categoria h3 {
            margin: 10px 0;
        }

        .categoria .cta {
            background: #f04e23;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }

        .categoria .cta:hover {
            background: #808080;
        }

        /* Estilo de la suscripción al boletín */
        .suscripcion {
            padding: 20px 0;
            background: rgba(255, 255, 255, 0.9);
            text-align: center;
        }

        .suscripcion h2 {
            margin-bottom: 20px;
        }

        .suscripcion form {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .suscripcion input[type="email"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            width: 60%;
            max-width: 300px;
            margin-right: 10px;
        }

        .suscripcion button {
            padding: 10px 20px;
            border: none;
            background: #f04e23;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
        }

        .suscripcion button:hover {
            background: #e03d14;
        }

        /* Estilo del pie de página */
        footer {
            background: rgba(51, 51, 51, 0.8);
            color: #fff;
            padding: 20px 0;
        }

        footer .container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        footer .contacto,
        footer .social,
        footer .políticas {
            flex: 1;
            padding: 10px;
        }

        footer .contacto h2,
        footer .social h2,
        footer .políticas h2 {
            margin-bottom: 10px;
        }

        footer .contacto p,
        footer .social a,
        footer .políticas a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        footer .social a:hover,
        footer .políticas a:hover {
            text-decoration: underline;
        }

        /* Estilo de la sección de Membresía */
        .membresia {
            padding: 40px 0;
            background: rgba(255, 255, 255, 0.9);
            text-align: center;
        }

        .membresia h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .membresia p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .membresia .cta {
            background: #f04e23;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }

        .membresia .cta:hover {
            background: #e03d14;
        }

        /* Estilo del Modal */
     /*   .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 5px;
        }*/

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilo de los planes en el modal */
        .planes {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .plan {
            background: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: calc(50% - 20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .plan h3 {
            margin-bottom: 10px;
            font-size: 1.5em;
        }

        .plan p {
            margin-bottom: 10px;
        }

      /*  .plan ul {
            list-style: none;
            padding: 0;
        }

        .plan ul li {
            margin-bottom: 5px;
        }
*/
        .plan .cta {
            background: #f04e23;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .form-inscripcion {
            display: none; /* Oculto por defecto */
            margin-top: 15px;
        }

        .form-inscripcion input {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-inscripcion button {
            background: #f04e23;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-inscripcion button:hover {
            background: #e03d14;
        }

        /* Estilo del ticket */
        .ticket {
            display: none; /* Oculto por defecto */
            background: #fefefe;
            border: 1px solid #888;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .ticket h3 {
            margin-bottom: 10px;
        }

        .ticket p {
            margin: 5px 0;
        }

    </style>
</head>
<header>
        <div class="container">
            <div class="logo">
                <a href="Inicio.php"><img src="image.png" alt="Logo PRIMFIT" height="100" width="100"></a>
                <h1>PRIMFIT</h1>
            </div>
            <nav>
                <form class="d-flex" role="search" action="search_product.php" method="post">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" name="producto">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <a href="Inicio.php">Inicio</a>
                <a href="#categorias">Categorías</a>
                <a href="ver_carrito.php">Carrito (<?php echo $producto->total; ?>)</a>
                <?php if($hizoLogin == null || $hizoLogin == " ") {?>
                    <a href="login.php">Iniciar Sesión</a>
                <?php }else{?>
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">¡Bienvenido: <?php echo $nombre->nombre?>!</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php if($nombre->isAdmin == '1') {?>
                            <li><a class="dropdown-item" href="usuarios.php">Administración de usuarios</a></li>
                            <li><a class="dropdown-item" href="productos.php">Administración de productos</a></li>
                            <li><a class="dropdown-item" href="cierra_sesion.php">Cerrar Sesión</a></li>
                            <?php }else{?>
                                <li><a class="dropdown-item" href="cierra_sesion.php">Cerrar Sesión</a></li>
                            <?php }?>

                        </div>
                    </div>
                    
                <?php } ?>
            </nav>
        </div>
    </header>