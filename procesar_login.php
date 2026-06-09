<?php
session_start();
include("conexion.php");

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = mysqli_query(
    $conn,
    "SELECT * FROM usuarios WHERE correo='$correo'"
);

if (mysqli_num_rows($sql) == 1) {

    $usuario = mysqli_fetch_assoc($sql);

    if (password_verify(
        $password,
        $usuario['password']
    )) {

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] == 'admin') {

            header("Location: admin/dashboard.php");

        } else {

            header("Location: index.php");

        }

        exit();
    }
}

echo "Correo o contraseña incorrectos";
?>