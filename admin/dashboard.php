<?php
require_once("auth.php");
include("../conexion.php");

// Consultas para obtener totales
$totalProductos = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM productos"));
$totalUsuarios   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM usuarios"));
$totalPedidos    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pedidos"));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Panel Administrador</h1>
    
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="productos.php">Productos</a>
        <a href="../logout.php">Cerrar Sesión</a>
    </nav>

    <div class="cards">
        <div class="card">
            <h2><?php echo $totalProductos; ?></h2>
            <p>Productos</p>
        </div>
        
        <div class="card">
            <h2><?php echo $totalUsuarios; ?></h2>
            <p>Usuarios</p>
        </div>
        
        <div class="card">
            <h2><?php echo $totalPedidos; ?></h2>
            <p>Pedidos</p>
        </div>
    </div>
</body>
</html>