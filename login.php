<?php
/* Inicia o reanuda la sesión para poder usar variables de sesión */
session_start();

/* Incluye el archivo de conexión a la base de datos */
require_once "../includes/conexion.php";

/* Obtiene el email enviado desde el formulario por método POST */
$email = $_POST['email'];

/* Obtiene la contraseña enviada desde el formulario por método POST */
$contrasena = $_POST['contrasena'];

/* Consulta SQL para buscar un usuario por su email */
$sql = "SELECT * FROM usuarios WHERE email = ?";

/* Prepara la consulta para evitar inyección SQL */
$stmt = $conn->prepare($sql);

/* Asocia el parámetro del email a la consulta preparada */
$stmt->bind_param("s", $email);

/* Ejecuta la consulta preparada */
$stmt->execute();

/* Obtiene el resultado de la consulta */
$result = $stmt->get_result();

/* Convierte el resultado en un arreglo asociativo */
$usuario = $result->fetch_assoc();

/* 
   Verifica dos cosas:
   1. Que el usuario exista en la base de datos
   2. Que la contraseña ingresada coincida con la contraseña encriptada
*/
if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {

    /* Guarda el ID del usuario en la sesión */
    $_SESSION['id_usuario'] = $usuario['id_usuario'];

    /* Guarda el nombre del usuario en la sesión */
    $_SESSION['nombre'] = $usuario['nombre'];

    /* Redirige al usuario a la página de productos */
    header("Location: ../productos.php");
} else {

    /* Mensaje que se muestra si las credenciales son incorrectas */
    echo "Credenciales incorrectas";
}
?>
