<!DOCTYPE html>
<html>
<head>
  <title>Tabla de Clientes</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Importamos la librería de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    body {
      background-color: #fffcf5; /* Utilizamos un color de fondo gris claro */
    }
    .navbar-inverse .active {
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
    <h2>Tabla de Clientes</h2>
    <p>Esta tabla muestra a todos los clientes que obtuvieron crédito en la tienda</p>
                
    <table class="table table-striped" border="1">
      <thead>
        <tr>
          <th>Id Cliente</th>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Teléfono</th>
          <th>Calle</th>
          <th>Colonia</th>
          <th>Número</th>
          <th>C.P</th>
          <th>Id Venta</th>
          <th>Fecha Crédito</th>
          <th>Crédito</th>
          <th>Abono</th>
          <th>Total</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Leemos el archivo CSV
          $archivo = fopen("Clientes.csv", "r");
          // Recorremos el archivo y creamos las filas de la tabla
          while (($datos = fgetcsv($archivo)) !== FALSE) {
            echo "<tr>";
            echo "<td>".$datos[0]."</td>";
            echo "<td>".$datos[1]."</td>";
            echo "<td>".$datos[2]."</td>";
            echo "<td>".$datos[3]."</td>";
            echo "<td>".$datos[4]."</td>";
            echo "<td>".$datos[5]."</td>";
            echo "<td>".$datos[6]."</td>";
            echo "<td>".$datos[7]."</td>";
            echo "<td>".$datos[8]."</td>";
            echo "<td>".$datos[9]."</td>";
            echo "<td>".$datos[10]."</td>";
            echo "<td>".$datos[11]."</td>";
            echo "<td>".$datos[10]-$datos[11]."</td>";
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
            echo "<h5 class='modal-title' id='editarLabel-" . $datos[0] . "'>Editar cliente</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>×</span>";
            echo "</button>";
            echo "</div>";
            echo "<form action='editar_producto.php' method='post'>";
            echo "<div class='modal-body'>";
            echo "<input type='hidden' name='id' value='" . $datos[0] . "'>";
            echo "<div class='form-group'>";
            echo "<label for='id_Cliente-" . $datos[0] . "'>Id_Cliente:</label>";
            echo "<input type='text' class='form-control' id='id_Cliente-" . $datos[0] . "' name='id_Cliente' value='" . $datos[0] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Nombre-" . $datos[0] . "'>Nombre:</label>";
            echo "<input type='text' class='form-control' id='Nombre-" . $datos[0] . "' name='Nombre' value='" . $datos[1] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Apellido-" . $datos[0] . "'>Apellido:</label>";
            echo "<input type='text' class='form-control' id='Apellido-" . $datos[0] . "' name='Apellido' value='" . $datos[2] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Telefono-" . $datos[0] . "'>Telefono:</label>";
            echo "<textarea class='form-control' id='Telefono-" . $datos[0] . "' name='Telefono'>" . $datos[3] . "</textarea>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Calle-" . $datos[0] . "'>Calle:</label>";
            echo "<input type='text' class='form-control' id='Calle-" . $datos[0] . "' name='Calle' value='" . $datos[4] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Colonia-" . $datos[0] . "'>Colonia:</label>";
            echo "<input type='text' class='form-control' id='Colonia-" . $datos[0] . "' name='Colonia' value='" . $datos[5] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Numero-" . $datos[0] . "'>Número:</label>";
            echo "<input type='number' class='form-control' id='Numero-" . $datos[0] . "' name='Numero' value='" . $datos[6] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Cp-" . $datos[0] . "'>C.P:</label>";
            echo "<input type='number' class='form-control' id='Cp-" . $datos[0] . "' name='Cp' value='" . $datos[7] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='venta-" . $datos[0] . "'>Id_venta:</label>";
            echo "<input type='text' class='form-control' id='venta-" . $datos[0] . "' name='venta' value='" . $datos[8] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='FC-" . $datos[0] . "'>Fecha Credito:</label>";
            echo "<input type='text' class='form-control' id='FC-" . $datos[0] . "' name='FC' value='" . $datos[9] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='credito-" . $datos[0] . "'>Crédito:</label>";
            echo "<input type='number' class='form-control' id='credito-" . $datos[0] . "' name='credito' value='" . $datos[10] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Abono-" . $datos[0] . "'>Abono:</label>";
            echo "<input type='number' class='form-control' id='Abono-" . $datos[0] . "' name='Abono' value='" . $datos[11] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Total-" . $datos[0] . "'>Total:</label>";
            echo "<input type='number' class='form-control' id='Total-" . $datos[0] . "' name='Total' value='" . $datos[10]-$datos[11] . "'>";
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
            echo "<h5 class='modal-title' id='eliminarLabel-" . $datos[0] . "'>Eliminar cliente</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>×</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<p>¿Está seguro que desea eliminar al cliente <strong>" . $datos[1] . "</strong>?</p>";
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
      Cliente</button>
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
            <h4 class="modal-title" id="modal-anadir-label">Añadir Cliente</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="input-id">Id-Cliente:</label>
              <input type="text" class="form-control" id="input-id" name="id">
            </div>
            <div class="form-group">
              <label for="input-nombre">Nombre:</label>
              <input type="text" class="form-control" id="input-nombre" name="nombre">
            </div>
            <div class="form-group">
              <label for="input-apellido-paterno">Apellido Paterno:</label>
              <input type="text" class="form-control" id="input-apellido-paterno" name="apellido-paterno">
            </div>
            <div class="form-group">
              <label for="input-telefono">Teléfono:</label>
              <input type="number" class="form-control" id="input-telefono" name="telefono">
            </div>
            <div class="form-group">
              <label for="input-calle">Calle:</label>
              <input type="text" class="form-control" id="input-calle" name="calle">
            </div>
            <div class="form-group">
              <label for="input-colonia">Colonia:</label>
              <input type="text" class="form-control" id="input-colonia" name="colonia">
            </div>
            <div class="form-group">
              <label for="input-num">Número:</label>
              <input type="number" class="form-control" id="input-num" name="num">
            </div>
            <div class="form-group">
              <label for="input-CP">C.P:</label>
              <input type="number" class="form-control" id="input-CP" name="CP">
            </div>
            <div class="form-group">
              <label for="input-venta">Id_venta:</label>
              <input type="text" class="form-control" id="input-venta" name="venta">
            </div>
            <div class="form-group">
              <label for="input-fecha_credito">Fecha Crédito:</label>
              <input type="date" class="form-control" id="input-fecha_credito" name="fecha_credito">
            </div>
            <div class="form-group">
              <label for="input-credito">Crédito:</label>
              <input type="number" class="form-control" id="input-credito" name="credito">
            </div>
            <div class="form-group">
              <label for="input-abono">Abono:</label>
              <input type="number" class="form-control" id="input-abono" name="abono">
            </div>
            <div class="form-group">
              <label for="input-total">Total:</label>
              <input type="number" class="form-control" id="input-total" name="total">
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