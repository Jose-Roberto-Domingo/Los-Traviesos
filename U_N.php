
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST["usuario"];
  $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT); // Se utiliza la función password_hash para almacenar la contraseña de forma segura
  // Se establece la conexión a la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "usuario";
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Se comprueba si se estableció la conexión correctamente
  if ($conn->connect_error) {
    die("Error al conectarse a la base de datos: " . $conn->connect_error);
  }
  // Se inserta el nuevo usuario en la tabla "usuarios"
  $sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$contraseña')";
  if ($conn->query($sql) === TRUE) {
    // Se redirecciona al usuario al menú de inicio
    header("Location: Menu_Inicio.php");
    exit;
  } else {
    echo "Error al agregar nuevo usuario: " . $conn->error;
  }
  $conn->close();
}
?>
