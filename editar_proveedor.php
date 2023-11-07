<?php
  // Conectamos a la base de datos
  $conexion = mysqli_connect("localhost", "root", "", "proveedor");
  
  // Si no se pudo conectar a la base de datos
  if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
  }
  
  // Si se envió el formulario
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario
    $id = $_POST["ID_Proveedor"];
    $empresa = $_POST["empresa"];
    $telefono = $_POST["telefono"];
    $dias_visita = $_POST["dias_visita"];
    
    // Preparamos la consulta SQL para actualizar el proveedor
    $sql = "UPDATE proveedores SET empresa='$empresa', telefono='$telefono', dias_visita='$dias_visita' WHERE ID_Proveedor=$id";
    
    // Ejecutamos la consulta SQL
    if (mysqli_query($conexion, $sql)) {
      // Si se actualizó el proveedor correctamente, redirigimos a la página de proveedores
      header("Location: Proveedores.php");
      exit();
    } else {
      // Si hubo un error al actualizar el proveedor, mostramos un mensaje de error
      echo "Error al actualizar el proveedor: " . mysqli_error($conexion);
    }
  }
  
  // Obtenemos el ID del proveedor a editar
  $id = $_GET["id"];
  
  // Preparamos la consulta SQL para obtener los datos del proveedor
  $sql = "SELECT * FROM proveedores WHERE id=$id";
  
  // Ejecutamos la consulta SQL
  $resultado = mysqli_query($conexion, $sql);
  
  // Si se encontró el proveedor
  if (mysqli_num_rows($resultado) == 1) {
    // Obtenemos los datos del proveedor
    $datos = mysqli_fetch_assoc($resultado);
    $empresa = $datos["empresa"];
    $telefono = $datos["telefono"];
    $dias_visita = $datos["dias_visita"];
  } else {
    // Si no se encontró el proveedor, mostramos un mensaje de error
    echo "Proveedor no encontrado";
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <Center>
    <h2>Editar Proveedor</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label>ID-Proveedor:</label>
        <input type="text" class="form-control" id="idProveedor" name="idProveedor" value="<?php echo $ID_Proveedor;?>" readonly>
      </div>   
      <div class="form-group">
        <label>Empresa:</label>
        <input type="text" class="form-control" id="empresa" name="empresa" value="<?php echo $empresa;?>" readonly>
      </div>
      <div class="form-group">
        <label>Telefono:</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono;?>" readonly>
      </div>
      <div class="form-group">
        <label>dias-visita:</label>
        <input type="text" class="form-control" id="dias_visita" name="dias_visita" value="<?php echo $dias_visita;?>" readonly>
      </div>  
    </form> 
    </Center>
</div> 
</body>
</html>

