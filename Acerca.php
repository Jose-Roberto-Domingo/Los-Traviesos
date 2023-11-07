<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body{
            background-color: #FFF8E1;
        }
        #developers {
            background-color: #f2f2f2;
            padding: 20px;
        }

        #developers h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        #developers ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #developers li {
            font-size: 18px;
            margin-bottom: 5px;
        }

        #developers p {
            font-size: 16px;
            margin-top: 10px;
        }

        .navbar-inverse .active {
            background-color: #337ab7;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li <?php if (basename($_SERVER['PHP_SELF']) == "Menu_Inicio.php")
                echo "class='active'"; ?>><a
                    href="Menu_Inicio.php"><i class="glyphicon glyphicon-home"></i> Menu Inicio</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == "Proveedores.php")
                echo "class='active'"; ?>><a
                    href="Proveedores.php"><i class="glyphicon glyphicon-user"></i> Proveedores</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == "Producto.php")
                echo "class='active'"; ?>><a
                    href="Producto.php"><i class="glyphicon glyphicon-shopping-cart"></i> Productos</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == "Compras.php")
                echo "class='active'"; ?>><a
                    href="Compras.php"><i class="glyphicon glyphicon-shopping-cart"></i> Compras</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == "Ventas.php")
                echo "class='active'"; ?>><a
                    href="Ventas.php"><i class="glyphicon glyphicon-stats"></i> Ventas</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == "Clientes.php")
                echo "class='active'"; ?>><a
                    href="Clientes.php"><i class="glyphicon glyphicon-credit-card"></i> Clientes</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li <?php if (basename($_SERVER['PHP_SELF']) == "Acerca.php")
                echo "class='active'"; ?>><a
                    href="Acerca.php"><i class="glyphicon glyphicon-info-sign"></i> Acerca de</a></li>
            <li><a href="M_I.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="developers">
        <h1>Acerca de nuestra página web</h1>
        <h2>Nuestro Equipo</h2>
        <ul>
            <li>Avilés Monfil Daniel<p>Encargado del diseño inicial</p></li>
            <li>Domingo Cabrera José Roberto <p>Encargado del desarrollado de cada sección del programa</p></li>
            <li>Fernández Mora Gerardo <p>Encargado de dar funcionalidad de cada formulario y botones de cada seccion</p></li>
            <li>Márquez Romero José Eduardo <p>Ayudo a dar la funcionalidad de los botones para añadir nuevos elementos </p></li>
        </ul>
        <br>
        <h2>Nuestro programa</h2>
        <p>La aplicación está destinada a ser utilizada para la administración del inventario dentro de misceláneas en la región de Teziutlán, Puebla. Ofrece calidad y sencillez en cuánto a su uso, así como seguridad de datos que se manejen dentro de cualquier tienda de abarrotes.
Su nombre proviene de las iniciales de los desarrolladores del programa, el software ROLAGEDA.</p>
        <br>
        <h2>Nuestra Misión</h2>
        <p>ROLAGEDA fue desarrollado para facilitar la administración de manera electrónica del inventario de una tienda de abarrotes, ya sea administrando diferentes campos que esté compuesta por la misma; tales como los proveedores, las compras y ventas de los productos; así mismo un control de clientes a los cuáles se les ofrece créditos y frecuentan la misma. En cada decisión de producto subyace nuestro deseo de permitir que los dueños faciliten de manera repentina su administración. </p>
        <br>
        <h2>Contactanos al 231-155-0527 <br>
            Facebook ROLAGEDA
        </h2>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>