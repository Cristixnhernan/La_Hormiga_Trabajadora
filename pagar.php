<?php
session_start();

/* VALIDAR SESIÓN */
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pagar | La Hormiga Trabajadora</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ===== HEADER ===== -->
<header>
    <h1 class="nombre-tienda">La Hormiga Trabajadora.</h1>
</header>

<!-- ===== CONTENEDOR ===== -->
<div class="carrito">

    <h2>💳 Selecciona tu método de pago</h2>

    <div class="metodos-pago">

        <!-- ================= PAYPAL SANDBOX ================= -->
        <div class="pago-card">
            <img src="images/paypal.png" alt="PayPal">
            <h3>PayPal (Sandbox)</h3>
            <p>Pago de prueba usando PayPal Sandbox.</p>

            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                
                <!-- CONFIGURACIÓN PAYPAL -->
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="sb-a44gk47748395@business.example.com">
                <input type="hidden" name="item_name" value="Compra en La Hormiga Trabajadora">
                <input type="hidden" name="amount" value="100.00">
                <input type="hidden" name="currency_code" value="MXN">

                <!-- REDIRECCIONES -->
                <input type="hidden" name="return" value="http://localhost/tienda_online/exito.php">
                <input type="hidden" name="cancel_return" value="http://localhost/tienda_online/cancelado.php">

                <button type="submit" class="btn-accion">
                    Pagar con PayPal Sandbox
                </button>
            </form>
        </div>

        <!-- ================= VISA (SIMULADO) ================= -->
        <div class="pago-card">
            <img src="images/visa.png" alt="Visa">
            <h3>Tarjeta Visa</h3>
            <p>Ingresa los datos de tu tarjeta para continuar.</p>

            <form class="form-tarjeta" onsubmit="return simularVisa();">
                <input type="text" placeholder="Nombre del titular" required>
                <input type="text" placeholder="Número de tarjeta" maxlength="16" required>
                <div class="fila">
                    <input type="text" placeholder="MM/AA" maxlength="5" required>
                    <input type="password" placeholder="CVV" maxlength="3" required>
                </div>
                <button type="submit" class="btn-accion">
                    Pagar con Visa
                </button>
            </form>
        </div>

    </div>

    <div style="text-align:center; margin-top:30px;">
        <a href="carrito.php" class="btn-accion cerrar">Volver al carrito</a>
    </div>

</div>

<!-- ===== SCRIPT VISA ===== -->
<script>
function simularVisa() {
    alert("✅ Pago con tarjeta Visa realizado con éxito.\nGracias por comprar en La Hormiga Trabajadora.");
    window.location.href = "productos.php";
    return false;
}
</script>

</body>
</html>
