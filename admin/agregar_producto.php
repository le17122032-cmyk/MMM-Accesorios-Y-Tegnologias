<?php
require_once("auth.php");
include("../conexion.php");

if (isset($_POST['guardar'])) {
    $nombre      = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio      = $_POST['precio'];
    $stock       = $_POST['stock'];
    $categoria   = $_POST['categoria'];
    
    $imagen = "img/productos/" . $_FILES['imagen']['name'];
    
    move_uploaded_file(
        $_FILES['imagen']['tmp_name'],
        "../" . $imagen
    );

    mysqli_query($conn, "
        INSERT INTO productos 
        (categoria_id, nombre, descripcion, precio, stock, imagen)
        VALUES 
        ('$categoria', '$nombre', '$descripcion', '$precio', '$stock', '$imagen')
    ");

    header("Location: productos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Nuevo Producto</h1>
    
    <form method="POST" enctype="multipart/form-data">
        
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <textarea name="descripcion" placeholder="Descripción del producto" rows="5"></textarea>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <select name="categoria" required>
            <option value="">Seleccione una categoría</option>
            <?php
            $categorias = mysqli_query($conn, "SELECT * FROM categorias");
            while ($c = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?php echo $c['id']; ?>">
                    <?php echo $c['nombre']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        
        <input type="file" name="imagen" accept="image/*" required>
        
        <button type="submit" name="guardar">Guardar Producto</button>
        
    </form>
</body>
</html>