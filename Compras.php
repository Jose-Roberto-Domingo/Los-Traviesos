<!DOCTYPE html>
<html>
<head>
  <title>Tabla de Compras</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Importamos la librería de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    body {
      background-color: #fffcf5; /* Utilizamos un color de fondo gris claro */
    } .navbar-inverse .active {
        background-color: #337ab7;
    }
  </style>
</head>
<body>
        <nav class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Menu_Inicio.php") echo "class='active'"; ?>><a href="Menu_Inicio.php"><i class="glyphicon glyphicon-home"></i> Menu Inicio</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Proveedores.php") echo "class='active'"; ?>><a href="Proveedores.php"><i class="glyphicon glyphicon-user"></i> Proveedores</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Producto.php") echo "class='active'"; ?>><a href="Producto.php"><i class="glyphicon glyphicon-shopping-cart"></i> Productos</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Compras.php") echo "class='active'"; ?>><a href="Compras.php"><i class="glyphicon glyphicon-shopping-cart"></i> Compras</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Ventas.php") echo "class='active'"; ?>><a href="Ventas.php"><i class="glyphicon glyphicon-stats"></i> Ventas</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Clientes.php") echo "class='active'"; ?>><a href="Clientes.php"><i class="glyphicon glyphicon-credit-card"></i> Clientes</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="M_I.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
          </ul>
          </nav>
  <div class="container">
    <Center>
    <h2>Tabla de Compras</h2>
    <p>Esta tabla muestra las compras realizadas, ya sean de proveedores o externas</p>
                
    <table class="table table-striped" border="1">
      <thead>
        <tr>
            <th>ID-Compra</th>
            <th>Fecha</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>ID-Producto</th>
            <th>ID-Proveedor</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Leemos el archivo CSV
          $archivo = fopen("Compras.csv", "r");
          // Recorremos el archivo y creamos las filas de la tabla
          while (($datos = fgetcsv($archivo)) !== FALSE) {
            echo "<tr>";
            echo "<td>".$datos[0]."</td>";
            echo "<td>".$datos[1]."</td>";
            echo "<td>".$datos[2]."</td>";
            echo "<td>".$datos[3]."</td>";
            echo "<td>".$datos[4]."</td>";
            echo "<td>".$datos[5]."</td>";
            echo "<td>";
            echo "<a href='#' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#editar-" . $datos[0] . "'>Editar</a>";
  // Botón de eliminación
            echo "<a href='#' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#eliminar-" . $datos[0] . "'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
            // Formulario de edición
            echo "<div class='modal fade' id='editar-" . $datos[0] . "' tabindex='-1' role='dialog' aria-labelledby='editarLabel-" . $datos[0] . "' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='editarLabel-" . $datos[0] . "'>Editar compra</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>×</span>";
            echo "</button>";
            echo "</div>";
            echo "<form action='editar_producto.php' method='post'>";
            echo "<div class='modal-body'>";
            echo "<input type='hidden' name='id' value='" . $datos[0] . "'>";
            echo "<div class='form-group'>";
            echo "<label for='id_Compra-" . $datos[0] . "'>Id_Compra:</label>";
            echo "<input type='text' class='form-control' id='id_Compra-" . $datos[0] . "' name='id_Compra' value='" . $datos[0] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Fecha-" . $datos[0] . "'>Fecha:</label>";
            echo "<input type='text' class='form-control' id='Fecha-" . $datos[0] . "' name='Fecha' value='" . $datos[1] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Cantidad-" . $datos[0] . "'>Cantidad:</label>";
            echo "<input type='number' class='form-control' id='Cantidad-" . $datos[0] . "' name='Cantidad' value='" . $datos[2] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='precio-" . $datos[0] . "'>Total:</label>";
            echo "<input type='number' class='form-control' id='precio-" . $datos[0] . "' name='precio' value='" . $datos[3] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='id_producto-" . $datos[0] . "'>Id_Producto:</label>";
            echo "<textarea class='form-control' id='id_producto-" . $datos[0] . "' name='id_producto'>" . $datos[4] . "</textarea>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='id_proveedor-" . $datos[0] . "'>Id_proveedor:</label>";
            echo "<input type='text' class='form-control' id='id_proveedor-" . $datos[0] . "' name='id_proveedor' value='" . $datos[5] . "'>";
            echo "</div>";
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>";
            echo "<button type='submit' class='btn btn-primary'>Guardar cambios</button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          
            
            // Formulario de eliminación
            echo "<div class='modal fade' id='eliminar-" . $datos[0] . "' tabindex='-1' role='dialog' aria-labelledby='eliminarLabel-" . $datos[0] . "' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='eliminarLabel-" . $datos[0] . "'>Eliminar compra</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>×</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<p>¿Está seguro que desea eliminar la compra <strong>" . $datos[0] . "</strong>?</p>";
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>";
            echo "<form action='eliminar_compra.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $datos[0] . "'>";
            echo "<button type='submit' class='btn btn-danger'>Eliminar</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
          fclose($archivo);
        ?>
      </tbody>
    </table>
    </Center>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-anadir">Añadir
      Compra</button>
    <a href="Menu_Inicio.php" class="btn btn-default">Regresar</a>
    <br><br>
  </div>
  <div class="modal fade" id="modal-anadir" tabindex="-1" role="dialog" aria-labelledby="modal-anadir-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="form-anadir">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span
                aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal-anadir-label">Añadir Compra</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="input-id">Id-Compra:</label>
              <input type="text" class="form-control" id="input-id" name="id">
            </div>
            <div class="form-group">
              <label for="input-fecha">Fecha:</label>
              <input type="date" class="form-control" id="input-fecha" name="fecha">
            </div>
            <div class="form-group">
              <label for="input-cantidad">Cantidad:</label>
              <input type="number" class="form-control" id="input-cantidad" name="cantidad">
            </div>
            <div class="form-group">
              <label for="input-total">Total:</label>
              <input type="number" class="form-control" id="input-total" name="total">
            </div>
            <div class="form-group">
              <label for="input-id-producto">ID-Producto:</label>
              <input type="text" class="form-control" id="input-id-producto" name="id-producto">
            </div>
            <div class="form-group">
              <label for="input-id-proveedor">ID-Proveedor:</label>
              <input type="text" class="form-control" id="input-id-proveedor" name="id-proveedor">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
          </form>
      </div>
    </div>
  </div>
  <!-- Importamos la librería de jQuery y Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
