<?php
session_start();
include("conexion.php");

// Consultar los 4 productos más recientes
$query = "SELECT * FROM productos ORDER BY id DESC LIMIT 4";
$productos = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Store</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <header>
        <div class="logo">👑 Luxury Store</div>

        <nav>
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="carrito.php">Carrito</a>
        </nav>

        <div class="auth-container">
            <?php if (isset($_SESSION['id'])) : ?>
                <div class="usuario-logeado">
                    <span>Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['nombre']); ?></strong></span>
                    <a href="logout.php" class="btn-salir">Salir</a>
                </div>
            <?php else : ?>
                <form action="procesar_login.php" method="POST" class="form-login-header">
                    <input type="email" name="correo" placeholder="Correo" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit">Entrar</button>
                    <a href="registro.php" class="btn-registro">Registro</a>
                </form>
            <?php endif; ?>
        </div>
    </header>

    <section class="hero">
        <h1>Luxury Store</h1>
        <p>Tecnología Premium</p>
        <a href="productos.php" class="btn-cat">Ver Catálogo</a>
    </section>

    <section class="destacados">
        <h2>Productos Destacados</h2>

        <div class="contenedor-productos">
            <?php while ($producto = mysqli_fetch_assoc($productos)) : ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                    <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                    <p class="precio">$<?php echo number_format($producto['precio'], 2); ?></p>
                    <a href="productos.php" class="btn-comprar">Comprar</a>
                </div>
            <?php endwith; // Nota: Se cambió a la sintaxis alternativa de llaves para mayor claridad en HTML ?>
            <?php endwhile; ?>
        </div>
    </section>

    <footer>
        <p>© 2026 Luxury Store - Todos los derechos reservados</p>
    </footer>

</body>

</html>