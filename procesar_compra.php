<?php
session_start();

if (empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit();
}

/* Aquí después podrás guardar en la BD */

unset($_SESSION['carrito']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Compra Exitosa</title>
</head>
<body style="background:#0f0f0f; color:white; text-align:center; font-family:Arial;">

    <h1 style="color:#d4af37;">
        ✅ Compra realizada con éxito
    </h1>

    <p>
        Gracias por comprar en MMM Accesorios y Tecnología.
    </p>

    <br>

    <a href="index.php" style="background:#d4af37; color:black; padding:12px 20px; text-decoration:none; border-radius:10px; font-weight:bold;">
        Volver al Inicio
    </a>

</body>
</html>