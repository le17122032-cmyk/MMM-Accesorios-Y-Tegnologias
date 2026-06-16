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
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            background:#0f0f0f;
            color:white;
        }

        .header{
            background:#181818;
            border-bottom:2px solid #d4af37;
        }

        .top-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:20px 50px;
        }

        .logo{
            color:#d4af37;
            font-size:28px;
            font-weight:bold;
        }

        .menu{
            display:flex;
            gap:20px;
            flex-wrap:wrap;
        }

        .menu a{
            color:white;
            text-decoration:none;
            font-weight:bold;
        }

        .menu a:hover{
            color:#d4af37;
        }

        .busqueda{
            text-align:center;
            padding:15px;
        }

        .busqueda input{
            width:400px;
            max-width:90%;
            padding:12px;
            border:none;
            border-radius:10px;
        }

        .busqueda button{
            padding:12px 20px;
            border:none;
            border-radius:10px;
            background:#d4af37;
            cursor:pointer;
            font-weight:bold;
        }

        .titulo{
            text-align:center;
            padding:30px;
        }

        .titulo h1{
            color:#d4af37;
        }

        .contenedor{
            width:90%;
            max-width:1200px;
            margin:auto;
            padding-bottom:50px;
        }

        .carrito-vacio{
            text-align:center;
            background:#181818;
            border:1px solid #d4af37;
            border-radius:15px;
            padding:40px;
        }

        .item{
            background:#181818;
            border:1px solid #d4af37;
            border-radius:15px;
            padding:20px;
            margin-bottom:20px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
        }

        .info{
            display:flex;
            align-items:center;
            gap:20px;
        }

        .info img{
            width:120px;
            height:120px;
            object-fit:cover;
            border-radius:10px;
        }

        .info h3{
            color:#d4af37;
            margin-bottom:10px;
        }

        .controles{
            margin-top:10px;
        }

        .btn-cantidad{
            display:inline-block;
            width:35px;
            height:35px;
            line-height:35px;
            text-align:center;
            text-decoration:none;
            color:white;
            border-radius:5px;
            font-weight:bold;
        }

        .restar{
            background:#c0392b;
        }

        .sumar{
            background:#27ae60;
        }

        .cantidad{
            margin:0 10px;
            font-size:18px;
            font-weight:bold;
        }

        .subtotal{
            font-size:22px;
            color:#d4af37;
            font-weight:bold;
        }

        .btn-eliminar{
            background:#c0392b;
            color:white;
            text-decoration:none;
            padding:10px 15px;
            border-radius:10px;
        }

        .resumen{
            background:#181818;
            border:1px solid #d4af37;
            border-radius:15px;
            padding:25px;
            text-align:right;
        }

        .total{
            font-size:30px;
            color:#d4af37;
            font-weight:bold;
        }

        .botones{
            margin-top:20px;
        }

        .btn{
            display:inline-block;
            padding:12px 20px;
            text-decoration:none;
            border-radius:10px;
            font-weight:bold;
        }

        .btn-productos{
            background:#333;
            color:white;
        }

        .btn-checkout{
            background:#d4af37;
            color:black;
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

                <?php if(isset($_SESSION['id'])){ ?>
                    <a href="logout.php">Cerrar Sesión</a>
                <?php }else{ ?>
                    <a href="login.php">Iniciar Sesión</a>
                <?php } ?>
            </nav>
        </div>

        <div class="busqueda">
            <form action="productos.php" method="GET">
                <input type="text" name="buscar" placeholder="Buscar productos...">
                <button type="submit">Buscar</button>
            </form>
        </div>
    </header>

    <div class="titulo">
        <h1>🛒 Mi Carrito</h1>
    </div>

    <div class="contenedor">
        <?php if(empty($_SESSION['carrito'])){ ?>
            <div class="carrito-vacio">
                <h2>Tu carrito está vacío</h2>
                <br>
                <a href="productos.php" class="btn btn-checkout">Ver Productos</a>
            </div>
        <?php } else { ?>

            <?php foreach($_SESSION['carrito'] as $indice => $producto){ 
                $subtotal = $producto['precio'] * $producto['cantidad'];
                $total += $subtotal;
            ?>
                <div class="item">
                    <div class="info">
                        <img src="<?php echo $producto['imagen']; ?>">
                        <div>
                            <h3><?php echo $producto['nombre']; ?></h3>
                            <p>Precio: $<?php echo number_format($producto['precio'],2); ?></p>
                            
                            <div class="controles">
                                <a href="actualizar_carrito.php?indice=<?php echo $indice; ?>&accion=restar" class="btn-cantidad restar">-</a>
                                <span class="cantidad"><?php echo $producto['cantidad']; ?></span>
                                <a href="actualizar_carrito.php?indice=<?php echo $indice; ?>&accion=sumar" class="btn-cantidad sumar">+</a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="subtotal">$<?php echo number_format($subtotal,2); ?></p>
                        <br>
                        <a href="eliminar_carrito.php?indice=<?php echo $indice; ?>" class="btn-eliminar">Eliminar</a>
                    </div>
                </div>
            <?php } ?>

            <div class="resumen">
                <p class="total">Total: $<?php echo number_format($total,2); ?></p>
                <div class="botones">
                    <a href="productos.php" class="btn btn-productos">Seguir Comprando</a>
                    <a href="checkout.php" class="btn btn-checkout">Finalizar Compra</a>
                </div>
            </div>

        <?php } ?>
    </div>

</body>
</html>