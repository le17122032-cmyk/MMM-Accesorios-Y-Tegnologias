<?php
session_start();

if (empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit();
}

$total = 0;

foreach ($_SESSION['carrito'] as $producto) {
    $total += $producto['precio'] * $producto['cantidad'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
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
            font-weight: bold;
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

        .checkout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .formulario {
            background: #181818;
            border: 1px solid #d4af37;
            border-radius: 15px;
            padding: 25px;
        }

        .formulario h2 {
            color: #d4af37;
            margin-bottom: 20px;
        }

        .formulario input,
        .formulario textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 10px;
            background: #2a2a2a;
            color: white;
        }

        .formulario textarea {
            height: 100px;
            resize: none;
        }

        .opciones {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 20px;
        }

        .opcion {
            background: #2a2a2a;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #333;
            cursor: pointer;
        }

        .opcion:hover {
            border-color: #d4af37;
        }

        .opcion input {
            width: auto;
            margin-right: 10px;
        }

        .resumen {
            background: #181818;
            border: 1px solid #d4af37;
            border-radius: 15px;
            padding: 25px;
        }

        .resumen h2 {
            color: #d4af37;
            margin-bottom: 20px;
        }

        .producto {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            padding-bottom: 10px;
            border-bottom: 1px solid #333;
        }

        .total {
            margin-top: 20px;
            font-size: 26px;
            color: #d4af37;
            font-weight: bold;
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: #d4af37;
            border: none;
            border-radius: 10px;
            color: black;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #f1c84a;
        }

        .transferencia {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background: #222;
            border: 1px solid #d4af37;
            border-radius: 10px;
        }

        .transferencia h3 {
            color: #d4af37;
            margin-bottom: 10px;
        }

        @media(max-width: 900px) {
            .checkout {
                grid-template-columns: 1fr;
            }
            .top-header {
                flex-direction: column;
            }
            .menu {
                flex-wrap: wrap;
                justify-content: center;
            }
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
            <?php if (isset($_SESSION['id'])) { ?>
                <a href="logout.php">Cerrar Sesión</a>
            <?php } else { ?>
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

<div class="container">
    <h1 class="titulo">🛒 Finalizar Compra</h1>

    <div class="checkout">
        <div class="formulario">
            <form action="procesar_compra.php" method="POST">
                <h2>Datos del Cliente</h2>
                <input type="text" name="nombre" placeholder="Nombre Completo" required>
                <input type="email" name="correo" placeholder="Correo Electrónico" required>
                <input type="text" name="telefono" placeholder="Teléfono" required>
                <input type="text" name="direccion" placeholder="Dirección" required>
                <textarea name="referencias" placeholder="Referencias de entrega"></textarea>

                <h2>Tipo de Entrega</h2>

<div class="opciones">

    <label class="opcion">

        <input
        type="radio"
        name="tipo_entrega"
        value="domicilio"
        required>

         <strong>Envío a domicilio</strong>

    </label>

    <label class="opcion">

        <input
        type="radio"
        name="tipo_entrega"
        value="local">

        <strong>Recoger en el Local</strong>

        <div style="
        margin-top:10px;
        padding:10px;
        background:#1a1a1a;
        border-left:4px solid #d4af37;
        border-radius:5px;
        color:white;
        ">

            Plaza de la Tecnología<br>
            ocales 194, 132 y 93

        </div>

    </label>

</div>

                <h2>Método de Pago</h2>
                <div class="opciones">
                    <label class="opcion">
                        <input type="radio" name="metodo_pago" value="efectivo" required> Efectivo
                    </label>
                    <label class="opcion">
                        <input type="radio" name="metodo_pago" value="transferencia">Transferencia Bancaria
                    </label>
                </div>

                <div id="datosTransferencia" class="transferencia">
                    <h3>Datos Bancarios</h3>
                    <p><strong>Banco:</strong> BBVA</p>
                    <p><strong>Cuenta:</strong> 1234567890</p>
                    <p><strong>CLABE:</strong> 012345678901234567</p>
                    <p><strong>Titular:</strong> MMM Accesorios y Tecnología</p>
                </div>
                <br>
                <button type="submit" class="btn">Confirmar Compra</button>
            </form>
        </div>

        <div class="resumen">
            <h2>Resumen del Pedido</h2>
            <?php foreach ($_SESSION['carrito'] as $producto) { ?>
                <div class="producto">
                    <div>
                        <?php echo $producto['nombre']; ?>
                        <br>
                        Cantidad: <?php echo $producto['cantidad']; ?>
                    </div>
                    <div>
                        $<?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?>
                    </div>
                </div>
            <?php } ?>
            <div class="total">
                Total: $<?php echo number_format($total, 2); ?>
            </div>
        </div>
    </div>
</div>

<script>
    const radios = document.querySelectorAll('input[name="metodo_pago"]');
    const datos = document.getElementById('datosTransferencia');

    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'transferencia' && radio.checked) {
                datos.style.display = 'block';
            } else {
                datos.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>