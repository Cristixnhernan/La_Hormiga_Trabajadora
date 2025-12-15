<?php
/* 
  Configuración de base de datos LOCAL (XAMPP)
  Para producción, estos datos deben cambiarse
*/

/* Datos del servidor de base de datos */
$host = "localhost";   /* Dirección del servidor (local) */
$user = "root";        /* Usuario de MySQL */
$pass = "";            /* Contraseña del usuario (vacía en entorno local) */
$db = "tienda_online"; /* Nombre de la base de datos */


/* Crea una nueva conexión a MySQL usando la extensión mysqli */
$conn = new mysqli($host, $user, $pass, $db);


/* Verifica si ocurrió un error al intentar conectarse */
if ($conn->connect_error) {

    /* Detiene la ejecución y muestra el mensaje de error */
    die("Error de conexión: " . $conn->connect_error);
}
?>

