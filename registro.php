<?php
include("conexion.php");

if(isset($_POST['registrar'])){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios(nombre, correo, password)
            VALUES('$nombre','$correo','$password')";

    if(mysqli_query($conn,$sql)){
        echo "Usuario registrado correctamente";
    }else{
        echo "Error al registrar";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registro</title>
<link rel="stylesheet" href="login.css">
</head>
<body>

<div class="formulario">

<h2>Crear Cuenta</h2>

<form method="POST">

<input type="text" name="nombre" placeholder="Nombre completo" required>

<input type="email" name="correo" placeholder="Correo electrónico" required>

<input type="password" name="password" placeholder="Contraseña" required>

<button type="submit" name="registrar">
Registrarse
</button>

</form>

<a href="login.php">Ya tengo cuenta</a>

</div>

</body>
</html>