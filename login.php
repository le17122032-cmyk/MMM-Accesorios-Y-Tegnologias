<?php
session_start();

// Si el usuario ya está logueado, redirigir al inicio
if (isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="contenedor">
        <h1>Iniciar Sesión</h1>
        
        <form action="procesar_login.php" method="POST">
            
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
            
            <button type="submit" class="btn">Ingresar</button>
            
        </form>
        
        <div class="link">
            ¿No tienes cuenta? 
            <a href="registro.php">Regístrate</a>
        </div>
    </div>
</body>
</html>