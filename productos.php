<?php
session_start();
require_once "includes/conexion.php";

/* VALIDAR SESIÓN */
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

/* BUSCADOR */
$busqueda = "";
if (isset($_GET['buscar'])) {
    $busqueda = trim($_GET['buscar']);
}

/* OBTENER PRODUCTOS */
$sql = "SELECT * FROM productos";

if (!empty($busqueda)) {
    $sql .= " WHERE nombre LIKE ?";
}

$stmt = $conn->prepare($sql);

if (!empty($busqueda)) {
    $param = "%" . $busqueda . "%";
    $stmt->bind_param("s", $param);
}

$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos | La Hormiga Trabajadora</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ===== HEADER CON LOGO ===== -->
<header class="header-tienda">
    <img src="images/productos/logo.jpeg" alt="Logo La Hormiga Trabajadora" class="logo">
    <h1 class="nombre-tienda">La Hormiga Trabajadora.</h1>
</header>

<!-- ===== BUSCADOR PROFESIONAL ===== -->
<div class="buscador-contenedor">
    <form method="GET" action="productos.php" class="buscador-form">
        <input 
            type="text"
            name="buscar"
            placeholder="Buscar productos..."
            value="<?php echo htmlspecialchars($busqueda); ?>"
        >
        <button type="submit">🔍</button>
    </form>
</div>

<!-- ===== BOTONES ===== -->
<div class="acciones">
    <a href="carrito.php" class="btn-accion">🛒 Ver carrito</a>
    <a href="comentarios.php" class="btn-accion">💬 Comentarios o sugerencias</a>
    <a href="auth/logout.php" class="btn-accion cerrar">Cerrar sesión</a>
</div>

<!-- ===== LISTA DE PRODUCTOS ===== -->
<div class="productos">

<?php if ($resultado->num_rows > 0) { ?>

<?php while ($producto = $resultado->fetch_assoc()) { ?>

    <div class="card">
        <img 
            src="images/productos/<?php echo htmlspecialchars($producto['imagen']); ?>" 
            alt="<?php echo htmlspecialchars($producto['nombre']); ?>"
        >

        <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>

        <p class="precio">$<?php echo number_format($producto['precio'], 2); ?></p>

        <p class="stock">Stock disponible: <?php echo (int)$producto['stock']; ?></p>

        <form action="carrito.php" method="POST">
            <input type="hidden" name="id_producto" value="<?php echo (int)$producto['id_producto']; ?>">
            <button type="submit">Agregar al carrito</button>
        </form>
    </div>

<?php } ?>

<?php } else { ?>
    <p class="sin-resultados">
        ❌ No se encontraron productos
    </p>
<?php } ?>

</div>

</body>
</html>
