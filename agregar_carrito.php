<?php

session_start();
include("conexion.php");

/* =====================================
   VERIFICAR QUE EXISTA EL ID
===================================== */

if(!isset($_GET['id'])){

    header("Location: productos.php");
    exit();

}

$id = intval($_GET['id']);

/* =====================================
   BUSCAR PRODUCTO
===================================== */

$sql = mysqli_query(
    $conn,
    "SELECT * FROM productos WHERE id = '$id'"
);

if(mysqli_num_rows($sql) == 0){

    echo "
    <script>
        alert('Producto no encontrado');
        window.location='productos.php';
    </script>
    ";

    exit();
}

$producto = mysqli_fetch_assoc($sql);

/* =====================================
   CREAR CARRITO SI NO EXISTE
===================================== */

if(!isset($_SESSION['carrito'])){

    $_SESSION['carrito'] = [];

}

/* =====================================
   VERIFICAR SI YA EXISTE EN CARRITO
===================================== */

$existe = false;

foreach($_SESSION['carrito'] as $indice => $item){

    if($item['id'] == $producto['id']){

        $_SESSION['carrito'][$indice]['cantidad']++;

        $existe = true;

        break;
    }
}

/* =====================================
   AGREGAR PRODUCTO NUEVO
===================================== */

if(!$existe){

    $_SESSION['carrito'][] = [

        'id' => $producto['id'],
        'nombre' => $producto['nombre'],
        'precio' => $producto['precio'],
        'imagen' => $producto['imagen'],
        'cantidad' => 1

    ];

}

/* =====================================
   REDIRECCIONAR AL CARRITO
===================================== */

header("Location: carrito.php");
exit();

?>