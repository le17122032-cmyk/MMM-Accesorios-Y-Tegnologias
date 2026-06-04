<?php
require_once("auth.php");
include("../conexion.php");

$id = (int)$_GET['id'];

// Obtener información del pedido
$consultaPedido = mysqli_query($conn, "
    SELECT 
        p.*,
        u.nombre,
        u.apellido
    FROM pedidos p
    INNER JOIN usuarios u ON p.usuario_id = u.id
    WHERE p.id = '$id'
");
$pedido = mysqli_fetch_assoc($consultaPedido);

// Obtener detalles de los productos del pedido
$detalles = mysqli_query($conn, "
    SELECT 
        dp.*,
        pr.nombre
    FROM detalle_pedidos dp
    INNER JOIN productos pr ON dp.producto_id = pr.id
    WHERE dp.pedido_id = '$id'
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Pedido #<?php echo $pedido['id']; ?></title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Pedido #<?php echo $pedido['id']; ?></h1>
    
    <p>
        <strong>Cliente:</strong> 
        <?php echo $pedido['nombre'] . " " . $pedido['apellido']; ?>
    </p>
    
    <p>
        <strong>Estado:</strong> 
        <?php echo ucfirst($pedido['estado']); ?>
    </p>
    
    <p>
        <strong>Total:</strong> 
        $<?php echo number_format($pedido['total'], 2); ?>
    </p>

    <h2>Productos del Pedido</h2>
    
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
        </tr>
        
        <?php while ($detalle = mysqli_fetch_assoc($detalles)): ?>
        <tr>
            <td><?php echo $detalle['nombre']; ?></td>
            <td><?php echo $detalle['cantidad']; ?></td>
            <td>$<?php echo number_format($detalle['precio'], 2); ?></td>
            <td>$<?php echo number_format($detalle['subtotal'], 2); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    
    <br>
    <a href="pedidos.php">← Volver a Pedidos</a>
</body>
</html>