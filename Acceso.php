Usa una base de datos para identificar los ususarios y asi registrar los accesos asi como nuevos usuarios.

<?php
session_start();
// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validamos las credenciales ingresadas
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    if (empty($usuario)) {
        // Mostramos un mensaje de error y salimos del script
        exit("Error: El campo 'Usuario' es obligatorio.");
    }
    $contraseña = $_POST["contraseña"];
    if (empty($contraseña)) {
        // Mostramos un mensaje de error y salimos del script
        exit("Error: El campo 'Contraseña' es obligatorio.");
    }
    // Encriptamos la contraseña
    $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

    // Verificamos las credenciales con la base de datos (Ejemplo)
    // ...

    // Verificamos las credenciales ingresadas
    if ($usuario == "Admin" && password_verify($contraseña, '$2y$10$i9MXb1WTxGnJ12sYKuL8kO2Ptfw4TtJb19GzjS9aPIpqsu03cDBde')) {
        // Credenciales correctas, redireccionamos al usuario al menú de inicio
        $_SESSION["usuario"] = $usuario;
        header("Location: Menu_Inicio.html");
        exit;
    } else {
        // Verificamos si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificamos las credenciales ingresadas
            $usuario = $_POST["usuario"];
            $contraseña = $_POST["contraseña"];
            
            // Conexión a la base de datos (Ejemplo)
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "myDB";
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Verificamos si la conexión fue exitosa
            if (!$conn) {
                die("Error: No se pudo conectar a la base de datos." . mysqli_connect_error());
            }

            // Escapamos los caracteres especiales para prevenir inyección de SQL
            $usuario = mysqli_real_escape_string($conn, $usuario);
            $contraseña = mysqli_real_escape_string($conn, $contraseña);

            // Hash de la contraseña
            $hashed_contraseña = hash('sha256', $contraseña);

            // Consultamos la base de datos para verificar las credenciales
            $query = "SELECT id FROM usuarios WHERE usuario='$usuario' AND contraseña='$hashed_contraseña'";
            $resultado = mysqli_query($conn, $query);

            if (mysqli_num_rows($resultado) == 1) {
                // Credenciales correctas, creamos una sesión para el usuario
                session_start();
                $_SESSION["usuario"] = $usuario;
                // Redireccionamos al usuario al menú de inicio
                header("Location: Menu_Inicio.php");
                exit;
            } else {
                // Credenciales incorrectas, mostramos un mensaje de error
                echo "<div class='container'>";
                echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos.</div>";
                echo "</div>";
            }
            // Cerramos la conexión a la base de datos
            mysqli_close($conn);
			
        }
    }
}
?>

PHP que agarra un CSV como base de datos de los usuarios.

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    if (empty($usuario)) {
        exit("Error: El campo 'Usuario' es obligatorio.");
    }
    $contraseña = $_POST["contraseña"];
    if (empty($contraseña)) {
        exit("Error: El campo 'Contraseña' es obligatorio.");
    }
    $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

    // Leer el archivo CSV
    $usuarios = array_map('str_getcsv', file('usuarios.csv'));
    $usuario_valido = false;
    foreach ($usuarios as $row) {
        if ($row[0] == $usuario && password_verify($contraseña, $row[1])) {
            $usuario_valido = true;
            break;
        }
    }
    if ($usuario_valido) {
        $_SESSION["usuario"] = $usuario;
        header("Location: Menu_Inicio.html");
        exit;
    } else {
        echo "<div class='container'>";
        echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos.</div>";
        echo "</div>";
    }
}
?>
