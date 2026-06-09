<?php
session_start();

if(isset($_SESSION['id'])){

    if($_SESSION['rol'] == 'admin'){
        header("Location: admin/dashboard.php");
    }else{
        header("Location: index.php");
    }

    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar Sesión</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0f0f0f,#1a1a1a);
}

.contenedor{
    width:420px;
    background:#181818;
    border:2px solid #d4af37;
    border-radius:20px;
    padding:35px;
    box-shadow:0 0 25px rgba(212,175,55,.3);
}

.logo{
    text-align:center;
    color:#d4af37;
    font-size:32px;
    font-weight:bold;
    margin-bottom:10px;
}

.subtitulo{
    text-align:center;
    color:white;
    margin-bottom:25px;
}

.input-group{
    margin-bottom:15px;
}

.input-group label{
    display:block;
    color:#d4af37;
    margin-bottom:5px;
}

.input-group input{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#2a2a2a;
    color:white;
    font-size:15px;
}

.input-group input:focus{
    outline:none;
    border:1px solid #d4af37;
}

.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-size:16px;
    font-weight:bold;
    margin-top:10px;
}

.btn-login{
    background:#d4af37;
    color:black;
}

.btn-login:hover{
    background:#f1cc5b;
}

.btn-inicio{
    display:block;
    text-align:center;
    text-decoration:none;
    background:#333;
    color:white;
    padding:12px;
    border-radius:10px;
    margin-top:10px;
}

.btn-inicio:hover{
    background:#444;
}

.link{
    text-align:center;
    margin-top:20px;
    color:white;
}

.link a{
    color:#d4af37;
    text-decoration:none;
    font-weight:bold;
}

.link a:hover{
    text-decoration:underline;
}

</style>

</head>
<body>

<div class="contenedor">

    <div class="logo">
        MMM Accesorios
    </div>

    <div class="subtitulo">
        Iniciar Sesión
    </div>

    <form action="procesar_login.php" method="POST">

        <div class="input-group">
            <label>Correo Electrónico</label>
            <input
                type="email"
                name="correo"
                placeholder="Ingresa tu correo"
                required>
        </div>

        <div class="input-group">
            <label>Contraseña</label>
            <input
                type="password"
                name="password"
                placeholder="Ingresa tu contraseña"
                required>
        </div>

        <button
            type="submit"
            class="btn btn-login">
            Iniciar Sesión
        </button>

        <a href="index.php" class="btn-inicio">
            ← Volver al Inicio
        </a>

    </form>

    <div class="link">
        ¿No tienes cuenta?
        <a href="registro.php">
            Regístrate aquí
        </a>
    </div>

</div>

</body>
</html>