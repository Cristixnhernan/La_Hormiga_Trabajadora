<?php 
// Inicia o reanuda una sesión para manejar datos del usuario
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Título que se muestra en la pestaña del navegador -->
    <title>Tienda | Login</title>
</head>

<!-- Clase usada para aplicar estilos específicos a la página de login -->
<body class="login-body">

    <!-- Contenedor principal del formulario -->
    <div class="login-container">

        <!-- Título de la sección de inicio de sesión -->
        <h2>Iniciar Sesión</h2>

        <!-- Formulario de inicio de sesión -->
        <!-- Envía los datos al archivo auth/login.php usando el método POST -->
        <form action="auth/login.php" method="POST">

            <!-- Campo para ingresar el correo electrónico -->
            <input type="email" name="email" placeholder="Correo" required>

            <!-- Campo para ingresar la contraseña -->
            <input type="password" name="contrasena" placeholder="Contraseña" required>

            <!-- Botón para enviar el formulario -->
            <button>Entrar</button>
        </form>

        <!-- Título de la sección de registro -->
        <h3>Crear cuenta</h3>

        <!-- Formulario de registro de nuevos usuarios -->
        <!-- Envía los datos al archivo auth/registro.php usando el método POST -->
        <form action="auth/registro.php" method="POST">

            <!-- Campo para ingresar el nombre del usuario -->
            <input type="text" name="nombre" placeholder="Nombre" required>

            <!-- Campo para ingresar el correo electrónico -->
            <input type="email" name="email" placeholder="Correo" required>

            <!-- Campo para ingresar la contraseña -->
            <input type="password" name="contrasena" placeholder="Contraseña" required>

            <!-- Botón para registrar al usuario -->
            <button>Registrarse</button>
        </form>

    </div>
</body>
</html>
