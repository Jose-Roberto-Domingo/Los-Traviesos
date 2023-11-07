<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Importamos la librería de Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
    body {
      background-color: #fffcf5; /* Utilizamos un color de fondo gris claro */
    }
		.container {
			margin-top: 50px;
		}
		.panel {
			margin: 0 auto;
			max-width: 400px;
		}
	</style>
</head>
<body>
<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Iniciar sesión</h3>
			</div>
			
			<center><img src="Tienda2.png" class="rounded mx-auto d-block" alt=" " height="200" width="200"></center>
		<form method="post">
			<div class="form-group">
				<label for="usuario">Usuario:</label>
				<input type="text" class="form-control" id="usuario" name="usuario">
			</div>
			<div class="form-group">
				<label for="contraseña">Contraseña:</label>
				<input type="password" class="form-control" id="contraseña" name="contraseña">
			</div>
			<button type="submit" class="btn btn-primary">Iniciar sesión</button>
			<button type="button" class="btn btn-success" onclick="location.href='registro.php'">Registrar usuario</button>

		</form>
	</div>
	<!-- Importamos la librería de jQuery y Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$sql = "SELECT * FROM `usuarios`;";

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Verificamos las credenciales ingresadas
	$usuario = $_POST["usuario"];
	$contraseña = $_POST["contraseña"];
	if ($usuario == "Admin" && $contraseña == "2023") {
		// Credenciales correctas, redireccionamos al usuario al menú de inicio
		header("Location: Menu_Inicio.php");
		exit;
	} 
	elseif ($usuario == "Emp" && $contraseña == "123"){
		header("Location: Menu_Inicio.php");
		exit;
	}else {
		// Credenciales incorrectas, mostramos un mensaje de error
		echo "<div class='container'>";
		echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos.</div>";
		echo "</div>";
	}
}
?>