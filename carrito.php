<?php
session_start();

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Carrito</title>

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

        .header {
            background: #181818;
            border-bottom: 2px solid #d4af37;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            color: #d4af37;
        }

        .contenedor {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .carrito-vacio {
            text-align: center;
            background: #181818;
            padding: 40px;
            border-radius: 15px;
            border: 1px solid #d4af37;
        }

        .item {
            background: #181818;
            border: 1px solid #d4af37;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .info img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }

        .info h3 {
            color: #d4af37;
            margin-bottom: 10px;
        }

        .precio {
            color: white;
        }

        .cantidad {
            font-size: 18px;
        }

        .subtotal {
            color: #d4af37;
            font-size: 20px;
            font-weight: bold;
        }

        .btn-eliminar {
            background: #c0392b;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 10px;
        }

        .btn-eliminar:hover {
            background: #e74c3c;
        }

        .resumen {
            margin-top: 30px;
            background: #181818;
            border: 1px solid #d4af37;
            border-radius: 15px;
            padding: 25px;
            text-align: right;
        }

        .total {
            font-size: 28px;
            color: #d4af37;
            font-weight: bold;
        }

        .botones {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-seguir {
            background: #333;
            color: white;
            margin-right: 10px;
        }

        .btn-pagar {
            background: #d4af37;
            color: black;
        }

        .btn-seguir:hover {
            background: #444;
        }

        .btn-pagar:hover {
            background: #f1c84a;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>🛒 Mi Carrito</h1>
    </div>

    <div class="contenedor">

        <?php if(empty($_SESSION['carrito'])){ ?>

            <div class="carrito-vacio">
                <h2>Tu carrito está vacío</h2>
                <br>
                <a href="productos.php" class="btn btn-pagar">Ver Productos</a>
            </div>

        <?php } else { ?>

            <?php foreach($_SESSION['carrito'] as $indice => $producto){ 
                $subtotal = $producto['precio'] * $producto['cantidad'];
                $total += $subtotal;
            ?>

                <div class="item">

                    <div class="info">
                        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <div>
                            <h3><?php echo $producto['nombre']; ?></h3>
                            <p class="precio">Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                            <p class="cantidad">Cantidad: <?php echo $producto['cantidad']; ?></p>
                        </div>
                    </div>

                    <div>
                        <p class="subtotal">$<?php echo number_format($subtotal, 2); ?></p>
                        <br>
                        <a href="eliminar_carrito.php?indice=<?php echo $indice; ?>" class="btn-eliminar">Eliminar</a>
                    </div>

                </div>

            <?php } ?>

            <div class="resumen">
                <p class="total">Total: $<?php echo number_format($total, 2); ?></p>
                <div class="botones">
                    <a href="productos.php" class="btn btn-seguir">Seguir Comprando</a>
                    <a href="checkout.php" class="btn btn-pagar">Finalizar Compra</a>
                </div>
            </div>

        <?php } ?>

    </div>

</body>
</html>