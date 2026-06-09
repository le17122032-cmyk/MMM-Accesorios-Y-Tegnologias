<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "tienda";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>