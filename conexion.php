<?php

$host = "localhost";
$usuario = "root";
$password = "";
$bd = "tienda";

$conn = mysqli_connect($host, $usuario, $password, $bd);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>