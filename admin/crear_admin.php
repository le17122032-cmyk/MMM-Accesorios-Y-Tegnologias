<?php
session_start();
include("../conexion.php");

if (
    !isset($_SESSION['rol']) ||
    $_SESSION['rol'] != 'admin'
) {
    die("Acceso denegado");
}

if (isset($_POST['guardar'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    mysqli_query(
        $conn,
        "INSERT INTO usuarios
        (
            nombre,
            apellido,
            correo,
            password,
            rol
        )
        VALUES
        (
            '$nombre',
            '$apellido',
            '$correo',
            '$password',
            'admin'
        )"
    );

    echo "Administrador creado correctamente";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Administrador</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

    <h1>Nuevo Administrador</h1>

    <form method="POST">

        <input 
            type="text" 
            name="nombre" 
            placeholder="Nombre" 
            required
        ><br><br>

        <input 
            type="text" 
            name="apellido" 
            placeholder="Apellido" 
            required
        ><br><br>

        <input 
            type="email" 
            name="correo" 
            placeholder="Correo" 
            required
        ><br><br>

        <input 
            type="password" 
            name="password" 
            placeholder="Contraseña" 
            required
        ><br><br>

        <button type="submit" name="guardar">
            Crear Administrador
        </button>

    </form>

</body>
</html>