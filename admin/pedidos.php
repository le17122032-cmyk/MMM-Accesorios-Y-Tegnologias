<?php
require_once("auth.php");
include("../conexion.php");

// Actualizar estado del pedido
if (isset($_GET['estado']) && isset($_GET['id'])) {
    $id     = (int)$_GET['id'];
    $estado = $_GET['estado'];

    mysqli_query($conn, "
        UPDATE pedidos 
        SET estado = '$estado' 
        WHERE id = '$id'
    ");

    header("Location: pedidos.php");
    exit();
}

// Obtener lista de pedidos
$pedidos = mysqli_query($conn, "
    SELECT 
        p.*,
        u.nombre,
        u.apellido
    FROM pedidos p
    INNER JOIN usuarios u ON p.usuario_id = u.id
    ORDER BY p.fecha_pedido DESC
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Pedidos</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Administrar Pedidos</h1>
    
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="productos.php">Productos</a>
        <a href="pedidos.php">Pedidos</a>
        <a href="../logout.php">Cerrar Sesión</a>
    </nav>

    <table>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Acciones</th>
            <th>Detalle</th>
        </tr>
        
        <?php while ($pedido = mysqli_fetch_assoc($pedidos)): ?>
        <tr>
            <td><?php echo $pedido['id']; ?></td>
            <td><?php echo $pedido['nombre'] . " " . $pedido['apellido']; ?></td>
            <td>$<?php echo number_format($pedido['total'], 2); ?></td>
            <td><?php echo ucfirst($pedido['estado']); ?></td>
            <td><?php echo $pedido['fecha_pedido']; ?></td>
            <td>
                <a href="?id=<?php echo $pedido['id']; ?>&estado=pagado">Pagado</a> |
                <a href="?id=<?php echo $pedido['id']; ?>&estado=enviado">Enviado</a> |
                <a href="?id=<?php echo $pedido['id']; ?>&estado=entregado">Entregado</a> |
                <a href="?id=<?php echo $pedido['id']; ?>&estado=cancelado" 
                   onclick="return confirm('¿Cancelar este pedido?')">
                    Cancelar
                </a>
            </td>
            <td>
                <a href="ver_pedido.php?id=<?php echo $pedido['id']; ?>">Ver Detalle</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>