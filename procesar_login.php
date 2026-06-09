<?php
session_start();
include("conexion.php");

// Recibir datos del formulario
$correo   = $_POST['correo'] ?? '';
$password = $_POST['password'] ?? '';
$tipo     = $_POST['tipo'] ?? 'cliente';

// Validar que se recibieron los datos
if (empty($correo) || empty($password)) {
    echo "
    <script>
        alert('Por favor completa todos los campos');
        window.location='login.php';
    </script>";
    exit();
}

// Consulta a la base de datos
$sql = mysqli_query(
    $conn, 
    "SELECT * FROM usuarios WHERE correo = '$correo'"
);

if (mysqli_num_rows($sql) == 1) {
    $usuario = mysqli_fetch_assoc($sql);
    
    // Verificar contraseña
    if (password_verify($password, $usuario['password'])) {
        
        // Verificar que el rol coincida con el tipo seleccionado
        if ($usuario['rol'] != $tipo) {
            echo "
            <script>
                alert('El tipo de acceso seleccionado no coincide con tu cuenta');
                window.location='login.php';
            </script>";
            exit();
        }
        
        // Iniciar sesión
        $_SESSION['id']     = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol']    = $usuario['rol'];
        
        // Redireccionar según el rol
        if ($usuario['rol']