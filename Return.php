<?php
// Iniciamos la sesión
session_start();
// Destruimos todas las variables de sesión
session_unset();
// Destruimos la sesión
session_destroy();
// Redireccionamos al usuario a la página de inicio de sesión
header("Location: Menu_Inicio.php");
exit;
?>