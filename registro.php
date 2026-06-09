<?php
include("conexion.php");

if (isset($_POST['registrar'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $verificar = mysqli_query(
        $conn,
        "SELECT id FROM usuarios WHERE correo='$correo'"
    );

    if (mysqli_num_rows($verificar) > 0) {

        echo "<script>
        alert('Este correo ya está registrado');
        window.location='registro.php';
        </script>";

        exit();
    }

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
            'cliente'
        )"
    );

    echo "<script>
    alert('Registro exitoso');
    window.location='login.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0f0f0f, #1e1e1e);
        }

        .contenedor {
            width: 450px;
            background: #181818;
            border: 2px solid #d4af37;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 0 25px rgba(212, 175, 55, .3);
        }

        .logo {
            text-align: center;
            color: #d4af37;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subtitulo {
            text-align: center;
            color: #fff;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            color: #d4af37;
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #2a2a2a;
            color: white;
        }

        .input-group input:focus {
            outline: none;
            border: 1px solid #d4af37;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-registro {
            background: #d4af37;
            color: black;
        }

        .btn-registro:hover {
            background: #f1cc5b;
        }

        .btn-inicio {
            display: block;
            text-align: center;
            text-decoration: none;
            background: #333;
            color: white;
            padding: 12px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .btn-inicio:hover {
            background: #444;
        }

        .link {
            text-align: center;
            margin-top: 15px;
            color: white;
        }

        .link a {
            color: #d4af37;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="contenedor">

        <div class="logo">
            MMM Accesorios
        </div>

        <div class="subtitulo">
            Crear cuenta de cliente
        </div>

        <form method="POST">

            <div class="input-group">
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="input-group">
                <label>Apellido</label>
                <input type="text" name="apellido" required>
            </div>

            <div class="input-group">
                <label>Correo Electrónico</label>
                <input type="email" name="correo" required>
            </div>

            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" name="registrar" class="btn btn-registro">
                Registrarme
            </button>

            <a href="index.php" class="btn-inicio">
                ← Volver al Inicio
            </a>

        </form>

        <div class="link">
            ¿Ya tienes cuenta? 
            <a href="login.php">Iniciar Sesión</a>
        </div>

    </div>

</body>
</html>