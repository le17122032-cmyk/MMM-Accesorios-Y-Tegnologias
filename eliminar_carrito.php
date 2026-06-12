<?php

session_start();

if(isset($_GET['indice'])){

    unset(
        $_SESSION['carrito'][$_GET['indice']]
    );

    $_SESSION['carrito'] =
    array_values(
        $_SESSION['carrito']
    );
}

header("Location: carrito.php");
exit();

?>