
<?php
include_once "encabezado.php";
include_once "funciones.php";
$usuarios = obtenerUsuarios();
?>
    <div class="banner">
        <div class="container">
            <h2>¡Bienvenido a PRIMFIT!</h2>
            <p>Tu lugar para encontrar los mejores productos de fitness y bienestar.</p>
        </div>
    </div>
    <div class="categorias" id="categorias">
        <div class="container">
            <h2>Usuarios registrados</h2>
            <div class="categoria">
                <div class="car">
                     <div class="contenedor">
                        <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Nombre de usuario</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) { ?>
                                <tr>
                                    <td>
                                        <h5><?php echo $usuario->idUsuario?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $usuario->nombre ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $usuario->correo ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $usuario->username ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php if($usuario->isAdmin == '1'){
                                            echo "Administrador";
                                        }else{
                                            echo "Comprador";
                                        } ?></h5>
                                    </td>
                                    <td>
                                    <form action="elimina_usuario.php" method="post">
                                        <input type="hidden" name="userID" value="<?php echo $usuario->idUsuario ?>"/>
                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            <form action="register.php" method="post">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Agregar usuario
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agrega usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <align value="center">
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">Nombre Completo</label>
                                                <input type="text" class="form-control" name="nombre" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar un nombre
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">Correo electrónico</label>
                                                <input type="text" class="form-control" name="email" placeholder="example@test.com" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar un correo electrónico
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password" class="form-label">Usuario</label>
                                                <input type="text" class="form-control" name="usuario" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar el nombre de usuario
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password" class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" name="password" required="" minlength="10">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar la contraseña
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="rol" class="form-label">Rol</label>
                                                <select class="form-select" id="rol" name="rol" required="">
                                                    <option value="">Elige...</option> 
                                                    <option value="1">Administrador</option>
                                                    <option value="0">Comprador</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once "pie.php" 
?>