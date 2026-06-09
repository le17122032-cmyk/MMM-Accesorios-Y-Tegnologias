<?php
session_start();

if (
    !isset($_SESSION['rol']) ||
    $_SESSION['rol'] != 'admin'
) {
    die("Acceso denegado");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

    <h1>Panel de Administración</h1>

    <p>
        Bienvenido: <?php echo $_SESSION['nombre']; ?>
    </p>

    <hr>

    <a href="productos.php">
        Administrar Productos
    </a>

    <br><br>

    <a href="pedidos.php">
        Ver Pedidos
    </a>

    <br><br>

    <a href="crear_admin.php">
        Crear Administrador
    </a>

    <br><br>

    <a href="../logout.php">
        Cerrar Sesión
    </a>

</body>
</html>