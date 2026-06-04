<?php

session_start();

// Validar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

// Validar si el usuario tiene el rol de administrador
if ($_SESSION['rol'] != 'admin') {
    header("Location: ../index.php");
    exit();
}