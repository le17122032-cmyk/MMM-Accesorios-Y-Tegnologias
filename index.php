<?php
session_start();
include("conexion.php");

$productos = mysqli_query($conn, "
    SELECT * 
    FROM productos
    WHERE estado = 'activo'
    ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMM Accesorios y Tecnología</title>

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header>

    <div class="logo">
        MMM Accesorios y Tecnología
    </div>

    <nav>
        <a href="index.php">Inicio</a>
        <a href="productos.php">Productos</a>
        <a href="carrito.php">Carrito</a>

        <?php if(isset($_SESSION['id'])): ?>

            <a href="pedidos.php">Mis Pedidos</a>
            <a href="perfil.php">Mi Perfil</a>

            <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
                <a href="admin/dashboard.php">Administración</a>
            <?php endif; ?>

            <a href="logout.php">Cerrar Sesión</a>

        <?php else: ?>

            <a href="login.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>

        <?php endif; ?>

    </nav>

</header>

<section class="hero">

    <h1>Bienvenido a MMM Accesorios y Tecnología</h1>

    <p>
        Los mejores accesorios, tecnología y productos gaming.
    </p>

    <a href="productos.php" class="btn">
        Ver Productos
    </a>

</section>

<section class="productos-destacados">

    <h2>Productos Destacados</h2>

    <div class="contenedor-productos">

        <?php while($producto = mysqli_fetch_assoc($productos)): ?>

            <div class="producto">

                <img
                    src="<?php echo $producto['imagen']; ?>"
                    alt="<?php echo htmlspecialchars($producto['nombre']); ?>"
                >

                <h3>
                    <?php echo htmlspecialchars($producto['nombre']); ?>
                </h3>

                <p>
                    <?php echo htmlspecialchars($producto['descripcion']); ?>
                </p>

                <h4>
                    $<?php echo number_format($producto['precio'], 2); ?>
                </h4>

                <form action="carrito.php" method="POST">

                    <input
                        type="hidden"
                        name="producto_id"
                        value="<?php echo $producto['id']; ?>"
                    >

                    <button type="submit">
                        Agregar al carrito
                    </button>

                </form>

            </div>

        <?php endwhile; ?>

    </div>

</section>

<footer>

    <p>
        © <?php echo date("Y"); ?> MMM Accesorios y Tecnología
    </p>

</footer>

</body>
</html>