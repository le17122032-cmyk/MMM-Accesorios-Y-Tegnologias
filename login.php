<?php
session_start();

// Redirigir si ya hay una sesión activa
if (isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/login.css">
    
    <style>
        .tipo-login {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .tipo-login button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            background: #222;
            color: #d4af37;
            transition: all 0.3s ease;
        }
        
        .tipo-login button:hover {
            background: #d4af37;
            color: #111;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Iniciar Sesión</h1>
        
        <form action="procesar_login.php" method="POST">
            <div class="tipo-login">
                <button 
                    type="button" 
                    onclick="seleccionarTipo('cliente')">
                    Cliente
                </button>
                <button 
                    type="button" 
                    onclick="seleccionarTipo('admin')">
                    Administrador
                </button>
            </div>
            
            <input type="hidden" name="tipo" id="tipo" value="cliente">
            
            <div class="input-group">
                <label>Correo</label>
                <input type="email" name="correo" required>
            </div>
            
            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>
            
            <button type="submit" class="btn">
                Ingresar
            </button>
        </form>
        
        <div class="link">
            ¿No tienes cuenta? 
            <a href="registro.php">Regístrate</a>
        </div>
    </div>

    <script>
        function seleccionarTipo(tipo) {
            document.getElementById("tipo").value = tipo;
            
            if (tipo === "admin") {
                alert("Modo Administrador seleccionado");
            } else {
                alert("Modo Cliente seleccionado");
            }
        }
    </script>
</body>
</html>