<?php
session_start();

if(isset($_GET['indice']) && isset($_GET['accion'])){

    $indice = $_GET['indice'];
    $accion = $_GET['accion'];

    if(isset($_SESSION['carrito'][$indice])){

        if($accion == "sumar"){

            $_SESSION['carrito'][$indice]['cantidad']++;

        }

        if($accion == "restar"){

            $_SESSION['carrito'][$indice]['cantidad']--;

            if($_SESSION['carrito'][$indice]['cantidad'] <= 0){

                unset($_SESSION['carrito'][$indice]);

                $_SESSION['carrito'] =
                array_values($_SESSION['carrito']);

            }

        }

    }

}

header("Location: carrito.php");
exit();
?>