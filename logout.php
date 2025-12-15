<?php
session_start();

/* DESTRUIR SESIÓN */
session_unset();
session_destroy();

/* REDIRIGIR AL LOGIN */
header("Location: ../index.php");
exit();
