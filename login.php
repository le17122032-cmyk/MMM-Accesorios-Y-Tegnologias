<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar Sesión | MMM Accesorios y Tecnología</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#0f0f0f;
    color:white;
}

/* HEADER */

.header{
    background:#181818;
    border-bottom:2px solid #d4af37;
}

.top-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 50px;
}

.logo{
    color:#d4af37;
    font-size:28px;
    font-weight:bold;
}

.menu{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}

.menu a{
    color:white;
    text-decoration:none;
    font-weight:bold;
}

.menu a:hover{
    color:#d4af37;
}

.busqueda{
    text-align:center;
    padding:15px;
}

.busqueda input{
    width:400px;
    max-width:90%;
    padding:12px;
    border:none;
    border-radius:10px;
}

.busqueda button{
    padding:12px 20px;
    border:none;
    border-radius:10px;
    background:#d4af37;
    cursor:pointer;
    font-weight:bold;
}

/* LOGIN */

.contenedor{
    max-width:550px;
    margin:60px auto;
    background:#181818;
    border:1px solid #d4af37;
    border-radius:20px;
    padding:40px;
}

.titulo{
    text-align:center;
    margin-bottom:30px;
}

.titulo h1{
    color:#d4af37;
    margin-bottom:10px;
}

.titulo p{
    color:#ccc;
}

.roles{
    display:flex;
    gap:15px;
    margin-bottom:25px;
}

.rol{
    flex:1;
    background:#2a2a2a;
    border:2px solid #444;
    border-radius:15px;
    padding:20px;
    text-align:center;
    cursor:pointer;
    font-weight:bold;
    transition:.3s;
}

.rol:hover{
    border-color:#d4af37;
}

.rol input{
    margin-bottom:10px;
}

label{
    display:block;
    margin-bottom:8px;
}

input[type="email"],
input[type="password"]{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:none;
    border-radius:10px;
    background:#2a2a2a;
    color:white;
}

.btn{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    background:#d4af37;
    color:black;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
}

.btn:hover{
    background:#f1c84a;
}

.registro{
    text-align:center;
    margin-top:20px;
}

.registro a{
    color:#d4af37;
    text-decoration:none;
}

.registro a:hover{
    text-decoration:underline;
}

@media(max-width:700px){

.top-header{
    flex-direction:column;
    gap:15px;
}

.roles{
    flex-direction:column;
}

}

</style>

</head>
<body>

<header class="header">

    <div class="top-header">

        <div class="logo">
            MMM Accesorios y Tecnología
        </div>

        <nav class="menu">

            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="carrito.php">Carrito</a>
            <a href="pedidos.php">Mis Pedidos</a>
            <a href="perfil.php">Mi Perfil</a>
            <a href="login.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>

        </nav>

    </div>



</header>

<div class="contenedor">

    <div class="titulo">

        <h1>🔐 Iniciar Sesión</h1>

        <p>
            Selecciona tu tipo de acceso
        </p>

    </div>

    <form action="procesar_login.php" method="POST">

        <div class="roles">

            <label class="rol">

                <input
                type="radio"
                name="tipo_usuario"
                value="cliente"
                required>

                <br>

                👤 Cliente

            </label>

            <label class="rol">

                <input
                type="radio"
                name="tipo_usuario"
                value="admin"
                required>

                <br>

                ⚙️ Administrador

            </label>

        </div>

        <label>Correo Electrónico</label>

        <input
        type="email"
        name="correo"
        required>

        <label>Contraseña</label>

        <input
        type="password"
        name="password"
        required>

        <button
        type="submit"
        class="btn">

            Iniciar Sesión

        </button>

    </form>

    <div class="registro">

        <p>
            ¿No tienes cuenta?
        </p>

        <br>

        <a href="registro.php">
            Registrarse como Cliente
        </a>

    </div>

</div>

</body>
</html>