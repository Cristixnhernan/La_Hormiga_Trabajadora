<?php
session_start();
require_once "includes/conexion.php";

/* VALIDAR SESIÓN */
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

/* ================= AGREGAR PRODUCTO AL CARRITO ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_producto'])) {

    $id_producto = (int) $_POST['id_producto'];

    // Verificar si el producto ya está en el carrito
    $verificar = $conn->prepare(
        "SELECT cantidad FROM carrito WHERE id_usuario = ? AND id_producto = ?"
    );
    $verificar->bind_param("ii", $id_usuario, $id_producto);
    $verificar->execute();
    $resultado_verificar = $verificar->get_result();

    if ($resultado_verificar->num_rows > 0) {
        // Si ya existe, aumentar cantidad
        $actualizar = $conn->prepare(
            "UPDATE carrito SET cantidad = cantidad + 1 WHERE id_usuario = ? AND id_producto = ?"
        );
        $actualizar->bind_param("ii", $id_usuario, $id_producto);
        $actualizar->execute();
    } else {
        // Si no existe, insertar
        $insertar = $conn->prepare(
            "INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES (?, ?, 1)"
        );
        $insertar->bind_param("ii", $id_usuario, $id_producto);
        $insertar->execute();
    }

    header("Location: carrito.php");
    exit();
}

/* ================= ELIMINAR PRODUCTO ================= */
if (isset($_GET['eliminar'])) {
    $id_producto_eliminar = (int) $_GET['eliminar'];

    $eliminar = $conn->prepare(
        "DELETE FROM carrito WHERE id_usuario = ? AND id_producto = ?"
    );
    $eliminar->bind_param("ii", $id_usuario, $id_producto_eliminar);
    $eliminar->execute();

    header("Location: carrito.php");
    exit;
}

/* ================= OBTENER PRODUCTOS DEL CARRITO ================= */
$sql = "
SELECT c.id_producto, p.nombre, p.precio, c.cantidad
FROM carrito c
JOIN productos p ON c.id_producto = p.id_producto
WHERE c.id_usuario = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito | La Hormiga Trabajadora</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="header-tienda">
    <h1 class="nombre-tienda">La Hormiga Trabajadora</h1>
</header>

<div class="acciones">
    <a href="productos.php" class="btn-accion">⬅ Seguir comprando</a>
    <a href="pagar.php" class="btn-accion">💳 Pagar</a>
</div>

<div class="contenedor-carrito">

<h2>🛒 Mi Carrito de Compras</h2>

<?php if ($resultado->num_rows > 0) { ?>

<table class="tabla-carrito">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

<?php
$total = 0;
while ($item = $resultado->fetch_assoc()):
$subtotal = $item['precio'] * $item['cantidad'];
$total += $subtotal;
?>

<tr>
    <td><?= htmlspecialchars($item['nombre']) ?></td>
    <td>$<?= number_format($item['precio'],2) ?></td>
    <td><?= $item['cantidad'] ?></td>
    <td>$<?= number_format($subtotal,2) ?></td>
    <td>
        <a href="carrito.php?eliminar=<?= $item['id_producto'] ?>" class="btn-eliminar">🗑️</a>
    </td>
</tr>

<?php endwhile; ?>

    </tbody>
</table>

<h3 class="total">
    Total: $<?= number_format($total,2) ?>
</h3>

<?php } else { ?>
    <p class="carrito-vacio">Tu carrito está vacío 🛒</p>
<?php } ?>

</div>
</body>
</html>
