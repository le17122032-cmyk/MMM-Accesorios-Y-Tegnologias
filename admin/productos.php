<?php
require_once("auth.php");
include("../conexion.php");

$productos = mysqli_query($conn, "
    SELECT p.*, c.nombre AS categoria
    FROM productos p
    LEFT JOIN categorias c
    ON p.categoria_id = c.id
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Administrar Productos</h1>
    
    <a href="agregar_producto.php">Agregar Producto</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        
        <?php while($p = mysqli_fetch_assoc($productos)): ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td>
                <img src="../<?php echo $p['imagen']; ?>" width="80" alt="<?php echo $p['nombre']; ?>">
            </td>
            <td><?php echo $p['nombre']; ?></td>
            <td>$<?php echo number_format($p['precio'], 2); ?></td>
            <td><?php echo $p['stock']; ?></td>
            <td>
                <a href="editar_producto.php?id=<?php echo $p['id']; ?>">Editar</a>
                <a href="eliminar_producto.php?id=<?php echo $p['id']; ?>" 
                   onclick="return confirm('¿Eliminar producto?')">
                    Eliminar
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>