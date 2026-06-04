<?php
require_once("auth.php");
include("../conexion.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Eliminar el producto
    mysqli_query($conn, "DELETE FROM productos WHERE id = '$id'");
}

header("Location: productos.php");
exit();
?>