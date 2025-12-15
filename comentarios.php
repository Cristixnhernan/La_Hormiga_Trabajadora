<?php
session_start();
require_once "includes/conexion.php";

/* VALIDAR SESIÓN */
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

/* GUARDAR COMENTARIO */
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comentario = trim($_POST["comentario"]);

    if (!empty($comentario)) {
        $id_usuario = $_SESSION["id_usuario"];
        $sql = "INSERT INTO comentarios (id_usuario, comentario, fecha) 
                VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $id_usuario, $comentario);
        $stmt->execute();
        $mensaje = "Comentario enviado correctamente 👍";
    }
}

/* OBTENER COMENTARIOS */
$sql_comentarios = "
    SELECT c.comentario, c.fecha, u.nombre 
    FROM comentarios c
    JOIN usuarios u ON c.id_usuario = u.id_usuario
    ORDER BY c.fecha DESC";
$resultado = $conn->query($sql_comentarios);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios | La Hormiga Trabajadora</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ===== HEADER ===== -->
<header class="header-tienda">
    <h1 class="nombre-tienda">La Hormiga Trabajadora</h1>
</header>

<!-- ===== BOTONES ===== -->
<div class="acciones">
    <a href="productos.php" class="btn-accion">⬅ Volver a productos</a>
</div>

<!-- ===== FORMULARIO ===== -->
<div class="contenedor-comentarios">
    <h2>💬 Comentarios y Sugerencias</h2>

    <?php if (!empty($mensaje)) { ?>
        <p class="mensaje-exito"><?php echo $mensaje; ?></p>
    <?php } ?>

    <form method="POST">
        <textarea name="comentario" placeholder="Escribe tu comentario o sugerencia..." required></textarea>
        <button type="submit">Enviar comentario</button>
    </form>
</div>

<!-- ===== LISTA DE COMENTARIOS ===== -->
<div class="lista-comentarios">
    <h3>📢 Opiniones de nuestros clientes</h3>

    <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <div class="comentario-card">
            <strong><?php echo htmlspecialchars($fila["nombre"]); ?></strong>
            <span><?php echo date("d/m/Y H:i", strtotime($fila["fecha"])); ?></span>
            <p><?php echo htmlspecialchars($fila["comentario"]); ?></p>
        </div>
    <?php } ?>
</div>

</body>
</html>
