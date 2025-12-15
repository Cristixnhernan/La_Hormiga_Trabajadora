<?php
/* Incluye el archivo de conexión a la base de datos
   Permite usar la variable $conn */
require_once "../includes/conexion.php";

/* Obtiene el nombre enviado desde el formulario por método POST */
$nombre = $_POST['nombre'];

/* Obtiene el email enviado desde el formulario por método POST */
$email = $_POST['email'];

/* 
   Obtiene la contraseña enviada desde el formulario y la encripta
   PASSWORD_DEFAULT usa el algoritmo recomendado por PHP
*/
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

/* Consulta SQL para insertar un nuevo usuario en la base de datos
   Se usan marcadores ? para mayor seguridad */
$sql = "INSERT INTO usuarios (nombre, email, contrasena)
        VALUES (?, ?, ?)";

/* Prepara la consulta SQL para evitar inyección SQL */
$stmt = $conn->prepare($sql);

/* Asocia los valores a los marcadores de la consulta
   "sss" indica que los tres parámetros son de tipo string */
$stmt->bind_param("sss", $nombre, $email, $contrasena);

/* 
   Ejecuta la consulta:
   - Si se ejecuta correctamente, el usuario se registra
   - Si falla, se muestra un mensaje de error
*/
if ($stmt->execute()) {

    /* Redirige al usuario a la página de inicio (login)
       indicando que el registro fue exitoso */
    header("Location: ../index.php");
} else {

    /* Mensaje mostrado si ocurre un error al registrar el usuario */
    echo "Error al registrar usuario";
}
?>
