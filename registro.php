<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuario</title>
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
				<h3 class="panel-title">Registro de usuario</h3>
			</div>
			<form method="post">
				<div class="form-group">
					<label for="usuario">Usuario:</label>
					<input type="text" class="form-control" id="usuario" name="usuario" required>
				</div>
				<div class="form-group">
					<label for="contraseña">Contraseña:</label>
					<input type="password" class="form-control" id="contraseña" name="contraseña" required>
				</div>
				<button type="submit" class="btn btn-primary">Registrar</button>
                <a href="Inicio.php" class="btn btn-default">Regresar</a>

			</form>
		</div>
	</div>
	<!-- Importamos la librería de jQuery y Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
