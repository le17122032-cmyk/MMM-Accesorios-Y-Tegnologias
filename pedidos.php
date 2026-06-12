<?php
session_start();
include("conexion.php");

$pedidos = mysqli_query($conn, "
    SELECT * FROM pedidos 
    ORDER BY fecha DESC
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #0f0f0f;
            color: white;
        }

        /* HEADER */
        .header {
            background: #181818;
            border-bottom: 2px solid #d4af37;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
        }

        .logo {
            color: #d4af37;
            font-size: 28px;
            font-weight: bold;
        }

        .menu {
            display: flex;
            gap: 20px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .menu a:hover {
            color: #d4af37;
        }

        .busqueda {
            text-align: center;
            padding: 15px;
        }

        .busqueda input {
            width: 400px;
            max-width: 90%;
            padding: 12px;
            border: none;
            border-radius: 10px;
        }

        .busqueda button {
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            background: #d4af37;
            cursor: pointer;
        }

        /* CONTENIDO */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .titulo {
            text-align: center;
            color: #d4af37;
            margin-bottom: 30px;
        }

        .pedido {
            background: #181818;
            border: 1px solid #d4af37;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .pedido h3 {
            color: #d4af37;
            margin-bottom: 10px;
        }

        .pedido p {
            margin: 8px 0;
        }

        .total {
            color: #d4af37;
            font-size: 22px;
            font-weight: bold;
        }

        .vacio {
            text-align: center;
            background: #181818;
            padding: 40px;
            border-radius: 15px;
            border: 1px solid #d4af37;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="top-header">
        <div class="logo">
            MMM Accesorios y Tecnología
        </div>
        <nav class="menu">
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="carrito.php">Carrito</a>
            <a href="pedidos.php">Mis Pedidos</a>
            <a href="perfil.php">Mi Perfil</a>
        </nav>
    </div>
</header>

<div class="container">
    <h1 class="titulo">📦 Mis Pedidos</h1>

    <?php if (mysqli_num_rows($pedidos) > 0) { ?>
        <?php while ($pedido = mysqli_fetch_assoc($pedidos)) { ?>
            <div class="pedido">
                <h3>Pedido #<?php echo $pedido['id']; ?></h3>
                <p><strong>Fecha:</strong> <?php echo $pedido['fecha']; ?></p>
                <p><strong>Cliente:</strong> <?php echo $pedido['nombre']; ?></p>
                <p><strong>Entrega:</strong> <?php echo $pedido['tipo_entrega']; ?></p>
                <p><strong>Pago:</strong> <?php echo $pedido['metodo_pago']; ?></p>
                <p class="total">Total: $<?php echo number_format($pedido['total'], 2); ?></p>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="vacio">
            <h2>No tienes pedidos registrados</h2>
            <br>
            <a href="productos.php" style="background:#d4af37; color:black; padding:12px 20px; text-decoration:none; border-radius:10px; font-weight:bold;">
                Ver Productos
            </a>
        </div>
    <?php } ?>
</div>

</body>
</html>