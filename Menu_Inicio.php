<!DOCTYPE html>
<html>
<head>
  <title>Menu de Inicio</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Importamos la librería de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    body {
      background-color: #FFF8E1; /* Utilizamos un color de fondo gris claro */
    }
    .navbar-inverse .active {
        background-color: #337ab7;
    }
    .btn{
      background-color: #FFECB3;
      color: rgb(0, 51, 255);
      border-color: blue;
    }
    .panel{
      background-color: #FFF8E1;
    }
    .panel .panel-heading{
      background-color: #FFF59D;
    }
  </style>
</head>
<body>
    <center>
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
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Acerca.php") echo "class='active'"; ?>><a href="Acerca.php"><i class="glyphicon glyphicon-info-sign"></i> Acerca de</a></li>
            <li><a href="M_I.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
          </ul> 
          </nav>
  <div class="container">
    <h1>Menú de Inicio</h1>
    <br>
    <section id="image-carousel" class="splide" aria-label="Beautiful Images">
  <div class="splide__track">
    <ul class="splide__list">
      <i class="splide__slide">
        <a href="Proveedores.php" class="btn btn-primary">
          <img src="Pro.jpeg" alt="" class="img-fluid" style="width: 120px; height: 85px;"><br>
          Proveedores
        </a>
      </i>
      <i class="splide__slide">
        <a href="Producto.php" class="btn btn-primary">
          <img src="Pd.png" alt="" class="img-fluid" style="width: 150px; height: 83px;"><br>
          Productos
        </a>
      </i>
      <i class="splide__slide">
        <a href="Compras.php" class="btn btn-primary">
          <img src="Com.jpeg" alt="" class="img-fluid" style="width: 120px; height: 80px;"><br>
          Compras
        </a>
      </i>
      <i class="splide__slide">
        <a href="Ventas.php" class="btn btn-primary">
          <img src="Ven.jpeg" alt="" class="img-fluid"style="width: 150px; height: 80px;"><br>
          Ventas
        </a>
      </i>
      <i class="splide__slide">
        <a href="Clientes.php" class="btn btn-primary">
          <img src="Cli.jpeg" alt="" class="img-fluid"style="width: 160px; height: 80px;"><br>
          Clientes
        </a>
      </i>
    </ul>
  </div>
</section>
    <div class="panel panel-default">
        <div class="panel-heading">Movimientos Recientes</div>
        <div class="panel-body">
          <!-- Agregamos una lista de movimientos dentro del panel -->
          <ul>
            <li>Compra de 3 unidades del producto SA01</li>
            <li>CL08 pagó $500 de crédito restan $300 </li>
            <li>Venta de 4 unidades del producto GA12</li>
          </ul>
        </div>
      </div>
      <center><img src="Tienda2.png" class="rounded mx-auto d-block" alt=" " height="180" width="200"></center>
  </div>
</center>
  <!-- Importamos la librería de jQuery y Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener( 'DOMContentLoaded', function () {
  new Splide( '#card-carousel', {
		perPage    : 2,
		breakpoints: {
			640: {
				perPage: 1,
			},
		},
  } ).mount();
} );
  </script>
</body>
</html>
