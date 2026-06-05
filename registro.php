<?php
include("conexion.php");

if (isset($_POST['registrar'])) {
    $nombre    = $_POST['nombre'];
    $apellido  = $_POST['apellido'];
    $correo    = $_POST['correo'];
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn, "
        INSERT INTO usuarios (nombre, apellido, correo, password)
        VALUES ('$nombre', '$apellido', '$correo', '$password')
    ");

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="contenedor">
        <h1>Crear Cuenta</h1>
        
        <form method="POST">
            
            <div class="input-group">
                <label for="nombre">Nombre</label>
                <input 
                    type="text" 
                    id="nombre"
                    name="nombre" 
                    required>
            </div>
            
            <div class="input-group">
                <label for="apellido">Apellido</label>
                <input 
                    type="text" 
                    id="apellido"
                    name="apellido" 
                    required>
            </div>
            
            <div class="input-group">
                <label for="correo">Correo electrónico</label>
                <input 
                    type="email" 
                    id="correo"
                    name="correo" 
                    required>
            </div>
            
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input 
                    type="password" 
                    id="password"
                    name="password" 
                    required>
            </div>
            
            <button type="submit" name="registrar" class="btn">
                Registrarse
            </button>
            
        </form>
        
        <div class="link">
            ¿Ya tienes cuenta? 
            <a href="login.php">Inicia Sesión</a>
        </div>
    </div>
</body>
</html>