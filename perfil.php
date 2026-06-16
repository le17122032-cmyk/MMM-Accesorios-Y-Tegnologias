<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>

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

        /* HEADER */

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

        /* PERFIL */

        .contenedor{
            max-width:700px;
            margin:50px auto;
            background:#181818;
            border:1px solid #d4af37;
            border-radius:20px;
            padding:40px;
        }

        .titulo{
            text-align:center;
            margin-bottom:30px;
        }

        .titulo h1{
            color:#d4af37;
        }

        .dato{
            margin-bottom:15px;
            font-size:18px;
        }

        .dato strong{
            color:#d4af37;
        }

        .botones{
            margin-top:30px;
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .btn{
            text-decoration:none;
            padding:12px 20px;
            border-radius:10px;
            font-weight:bold;
        }

        .btn-dorado{
            background:#d4af37;
            color:black;
        }

        .btn-gris{
            background:#333;
            color:white;
        }

        .btn-rojo{
            background:#c0392b;
            color:white;
        }

        .sin-login{
            text-align:center;
        }

        .sin-login h2{
            color:#d4af37;
            margin-bottom:20px;
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
                <?php } else { ?>
                    <a href="login.php">Iniciar Sesión</a>
                <?php } ?>
            </nav>
        </div>
    </header>

    <div class="contenedor">
        <?php if(!isset($_SESSION['id'])){ ?>
            <div class="sin-login">
                <h2>🔒 Debes iniciar sesión</h2>
                <p>Para ver tu perfil necesitas iniciar sesión.</p>
                
                <div class="botones">
                    <a href="login.php" class="btn btn-dorado">Iniciar Sesión</a>
                    <a href="registro.php" class="btn btn-gris">Registrarse</a>
                </div>
            </div>
        <?php } else { ?>
            <div class="titulo">
                <h1>👤 Mi Perfil</h1>
            </div>

            <div class="dato">
                <strong>Nombre:</strong> <?php echo $_SESSION['nombre']; ?>
            </div>

            <div class="dato">
                <strong>Correo:</strong> <?php echo $_SESSION['correo']; ?>
            </div>

            <div class="dato">
                <strong>Rol:</strong> <?php echo ucfirst($_SESSION['rol']); ?>
            </div>

            <div class="botones">
                <a href="pedidos.php" class="btn btn-dorado">📦 Mis Pedidos</a>

                <?php if($_SESSION['rol'] == 'admin'){ ?>
                    <a href="admin/dashboard.php" class="btn btn-gris">⚙️ Dashboard Admin</a>
                <?php } ?>

                <a href="logout.php" class="btn btn-rojo">🚪 Cerrar Sesión</a>
            </div>
        <?php } ?>
    </div>

</body>
</html>