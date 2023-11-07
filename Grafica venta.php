<?php
$ventas = array();
if (($handle = fopen("Ventas.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $ventas[] = $data;
    }
    fclose($handle);
}
$productos = array();
foreach ($ventas as $venta) {
    $idProducto = $venta[3];
    if (!isset($productos[$idProducto])) {
        $productos[$idProducto] = 0;
    }
    $productos[$idProducto] += $venta[2];
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Gráfica Ventas</title>
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    body {
      background-color: #FFF8E1; /* Utilizamos un color de fondo gris claro */
    } 
    .navbar-inverse .active {
        background-color: #337ab7;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
          <center>
          <ul class="nav navbar-nav">
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Menu_Inicio.php") echo "class='active'"; ?>><a href="Menu_Inicio.php"><i class="glyphicon glyphicon-home"></i> Menu Inicio</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Proveedores.php") echo "class='active'"; ?>><a href="Proveedores.php"><i class="glyphicon glyphicon-user"></i> Proveedores</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Producto.php") echo "class='active'"; ?>><a href="Producto.php"><i class="glyphicon glyphicon-shopping-cart"></i> Productos</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Compras.php") echo "class='active'"; ?>><a href="Compras.php"><i class="glyphicon glyphicon-shopping-cart"></i> Compras</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Ventas.php") echo "class='active'"; ?>><a href="Ventas.php"><i class="glyphicon glyphicon-stats"></i> Ventas</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Clientes.php") echo "class='active'"; ?>><a href="Clientes.php"><i class="glyphicon glyphicon-credit-card"></i> Clientes</a></li>
            <li <?php if(basename($_SERVER['PHP_SELF']) == "Grafica venta.php") echo "class='active'"; ?>><a href="Grafica venta.php"><i class="glyphicon glyphicon-stats"></i> Grafica venta</a></li>
            
          </ul>
  </center>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="M_I.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
          </ul>
          </nav>
<div id="container" style="height: 600px"></div>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Ventas por día'
    },
    xAxis: {
        categories: [<?php foreach ($productos as $idProducto => $cantidad) {
            echo '"' . $idProducto . '",';
        } ?>]
    },
    yAxis: {
        title: {
            text: 'Ganancias diarias'
        }
    },
    series: [{
        name: 'Días',
        data: [<?php foreach ($productos as $idProducto => $cantidad) {
            echo $cantidad . ',';
        } ?>]
    }]
});
</script>
	</body>
</html>