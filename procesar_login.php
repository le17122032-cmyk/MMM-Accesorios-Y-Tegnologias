<?php

session_start();
include("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $correo = mysqli_real_escape_string(
        $conn,
        $_POST['correo']
    );

    $password = mysqli_real_escape_string(
        $conn,
        $_POST['password']
    );

    $tipo_usuario = mysqli_real_escape_string(
        $conn,
        $_POST['tipo_usuario']
    );

    $sql = "
    SELECT *
    FROM usuarios
    WHERE correo='$correo'
    AND rol='$tipo_usuario'
    LIMIT 1
    ";

    $resultado = mysqli_query(
        $conn,
        $sql
    );

    if(mysqli_num_rows($resultado) == 1){

        $usuario = mysqli_fetch_assoc(
            $resultado
        );

        if($password == $usuario['password']){

            $_SESSION['id'] = $usuario['id'];

            $_SESSION['nombre'] =
            $usuario['nombre'];

            $_SESSION['correo'] =
            $usuario['correo'];

            $_SESSION['rol'] =
            $usuario['rol'];

            if($usuario['rol'] == 'admin'){

                header(
                "Location: admin/dashboard.php"
                );

                exit();

            }else{

                header(
                "Location: index.php"
                );

                exit();

            }

        }else{

            echo "
            <script>
            alert('Contraseña incorrecta');
            window.location='login.php';
            </script>
            ";

        }

    }else{

        echo "
        <script>
        alert('Usuario no encontrado');
        window.location='login.php';
        </script>
        ";

    }

}else{

    header("Location: login.php");
    exit();

}

?>