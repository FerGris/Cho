<?php
include_once "encabezado.php";
include_once "funciones.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editarProducto'])) {
    $id = $_POST['idProducto'];
    $nombre = $_POST['nombreProducto'];
    $precio = $_POST['precio'];
    $type = $_POST['typeProducto'];
    $content = $_POST['Content'];
    $sabor = $_POST['Sabor'];
    $existencia = $_POST['existencia'];
    $limiteEdad = $_POST['limiteEdad'];
    $categoria = $_POST['categoria'];

    editarProducto($id, $nombre, $precio, $type, $content, $sabor, $existencia, $limiteEdad, $categoria);
    
}

$productos = obtenerProductosA();
?>
    <div class="banner">
        <div class="container">
            <h2>¡Bienvenido a PRIMFIT!</h2>
            <p>Tu lugar para encontrar los mejores productos de fitness y bienestar.</p>
        </div>
    </div>
    <div class="categorias" id="categorias">
        <div class="container">
            <h2>Productos en inventario</h2>
            <div class="categoria">
                <div class="car">
                     <div class="contenedor">
                        <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Forma del producto</th>
                                <th>Contenido</th>
                                <th>Sabor</th>
                                <th>Existencia</th>
                                <th>Limite de Edad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $producto) { ?>
                                <tr>
                                    <td>
                                        <h5><?php echo $producto->id_producto?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $producto->nombreProducto ?></h5>
                                    </td>
                                    <td>
                                        <h5>$<?php echo number_format($producto->precio, 2) ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $producto->typeProduct ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $producto->Content ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $producto->Sabor ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $producto->existencia ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $producto->limiteEdad ?></h5>
                                    </td>
                                    <td>
                                    <form action="elimina_producto.php" method="post" style="display:inline;">
                                        <input type="hidden" name="userID" value="<?php echo $producto->id_producto ?>"/>
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                    <!-- Botón editar, sin form ni action -->
                                    <button class="btn btn-primary btn-editar" 
                                        data-id="<?php echo $producto->id_producto ?>"
                                        data-nombre="<?php echo htmlspecialchars($producto->nombreProducto) ?>"
                                        data-precio="<?php echo $producto->precio ?>"
                                        data-type="<?php echo htmlspecialchars($producto->typeProduct) ?>"
                                        data-content="<?php echo htmlspecialchars($producto->Content) ?>"
                                        data-sabor="<?php echo htmlspecialchars($producto->Sabor) ?>"
                                        data-existencia="<?php echo $producto->existencia ?>"
                                        data-limiteedad="<?php echo $producto->limiteEdad ?>"
                                        data-categoria="<?php echo htmlspecialchars($producto->categoria) ?>"
                                        >
                                        Editar
                                    </button>
                                    </td>
                                </tr>
                            <?php } ?>
                            <form action="agrega_producto.php" method="post">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Agregar producto
                                </button>
                                <!-- Modal Agregar producto (igual que antes) -->
                                <div class="modal fade" id="exampleModal" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agrega producto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <align value="center">
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">ID Producto</label>
                                                <input type="text" class="form-control" name="idProducto" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar el id del producto
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" name="nombreProducto" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar un nombre
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">Precio</label>
                                                <input type="text" class="form-control" name="precio" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar el precio
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">Forma del producto</label>
                                                <select class="form-select" id="rol" name="typeProducto" required="">
                                                    <option value="">Elige...</option> 
                                                    <option value="Polvo">Polvo</option>
                                                    <option value="Cápsula">Cápsulas</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar la forma del producto
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password" class="form-label">Contenido</label>
                                                <input type="text" class="form-control" name="Content" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar el contenido
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password" class="form-label">Sabor</label>
                                                <input type="text" class="form-control" name="Sabor" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar el sabor del producto
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password" class="form-label">Existencia</label>
                                                <input type="text" class="form-control" name="existencia" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar la existencia del producto
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password" class="form-label">Limite de Edad</label>
                                                <input type="text" class="form-control" name="limiteEdad" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar el límite de edad del producto
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password" class="form-label">No. de imagen</label>
                                                <input type="text" class="form-control" name="image_id" required="">
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar el número de imágen
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="rol" class="form-label">Categoria</label>
                                                <select class="form-select" id="rol" name="categoria" required="">
                                                    <option value="">Elige...</option> 
                                                    <option value="creatinas">Creatina</option>
                                                    <option value="proteinas">Proteína</option>
                                                    <option value="vitaminas">Vitamina</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Se requiere ingresar la categoría del producto
                                                </div>
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
    <!-- Modal Editar producto -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="productos.php" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="editarProducto" value="1">
        <input type="hidden" name="idProducto" id="edit-idProducto">
        <div class="mb-3">
          <label>Nombre</label>
          <input type="text" class="form-control" name="nombreProducto" id="edit-nombre" required>
        </div>
        <div class="mb-3">
          <label>Precio</label>
          <input type="number" class="form-control" name="precio" id="edit-precio" required>
        </div>
        <div class="mb-3">
          <label>Forma del producto</label>
          <select class="form-select" name="typeProducto" id="edit-type" required>
            <option value="Polvo">Polvo</option>
            <option value="Cápsula">Cápsula</option>
          </select>
        </div>
        <div class="mb-3">
          <label>Contenido</label>
          <input type="text" class="form-control" name="Content" id="edit-content" required>
        </div>
        <div class="mb-3">
          <label>Sabor</label>
          <input type="text" class="form-control" name="Sabor" id="edit-sabor" required>
        </div>
        <div class="mb-3">
          <label>Existencia</label>
          <input type="number" class="form-control" name="existencia" id="edit-existencia" required>
        </div>
        <div class="mb-3">
  <label>Límite de Edad</label>
  <input type="text" class="form-control" name="limiteEdad" id="edit-limiteEdad" required>
</div>

        <div class="mb-3">
          <label>Categoría</label>
          <select class="form-select" name="categoria" id="edit-categoria" required>
            <option value="creatinas">Creatina</option>
            <option value="proteinas">Proteína</option>
            <option value="vitaminas">Vitamina</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </form>
  </div>
</div>

<?php
    include_once "pie.php" 
?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const botonesEditar = document.querySelectorAll('.btn-editar');
    const modal = new bootstrap.Modal(document.getElementById('modalEditar'));

    botonesEditar.forEach(boton => {
        boton.addEventListener('click', function () {
            document.getElementById('edit-idProducto').value = this.dataset.id;
            document.getElementById('edit-nombre').value = this.dataset.nombre;
            document.getElementById('edit-precio').value = this.dataset.precio;
            document.getElementById('edit-type').value = this.dataset.type;
            document.getElementById('edit-content').value = this.dataset.content;
            document.getElementById('edit-sabor').value = this.dataset.sabor;
            document.getElementById('edit-existencia').value = this.dataset.existencia;
            document.getElementById('edit-limiteEdad').value = this.dataset.limiteedad;
            document.getElementById('edit-categoria').value = this.dataset.categoria;

            modal.show();
        });
    });
});
</script>
