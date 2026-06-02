<?php
session_start();
include("productos.php");

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Carrito</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>Carrito de Compras</h1>

<a href="index.php">← Seguir comprando</a>

<table>
<tr>
    <th>Producto</th>
    <th>Precio</th>
</tr>

<?php

if(isset($_SESSION['carrito'])){

    foreach($_SESSION['carrito'] as $id){

        $producto = $productos[$id];
        $total += $producto['precio'];

        echo "<tr>
                <td>{$producto['nombre']}</td>
                <td>$ {$producto['precio']}</td>
              </tr>";
    }
}
?>

<tr>
    <td><strong>Total</strong></td>
    <td><strong>$ <?= $total ?></strong></td>
</tr>

</table>

</body>
</html>