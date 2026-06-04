<?php
require_once("auth.php");
include("../conexion.php");

$id = $_GET['id'];

// Obtener datos del producto
$consulta = mysqli_query($conn, "SELECT * FROM productos WHERE id='$id'");
$producto = mysqli_fetch_assoc($consulta);

if (isset($_POST['actualizar'])) {
    $nombre      = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio      = $_POST['precio'];
    $stock       = $_POST['stock'];

    mysqli_query($conn, "
        UPDATE productos SET
            nombre = '$nombre',
            descripcion = '$descripcion',
            precio = '$precio',
            stock = '$stock'
        WHERE id = '$id'
    ");

    header("Location: productos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Editar Producto</h1>
    
    <form method="POST">
        
        <input 
            type="text" 
            name="nombre" 
            value="<?php echo $producto['nombre']; ?>" 
            placeholder="Nombre del producto" 
            required>
        
        <textarea 
            name="descripcion" 
            placeholder="Descripción del producto" 
            rows="5"><?php echo $producto['descripcion']; ?></textarea>
        
        <input 
            type="number" 
            step="0.01" 
            name="precio" 
            value="<?php echo $producto['precio']; ?>" 
            placeholder="Precio" 
            required>
        
        <input 
            type="number" 
            name="stock" 
            value="<?php echo $producto['stock']; ?>" 
            placeholder="Stock" 
            required>
        
        <button type="submit" name="actualizar">Actualizar Producto</button>
        
    </form>
</body>
</html>