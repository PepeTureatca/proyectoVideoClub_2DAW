<?php
include_once "Videoclub.php"; // register autoloader before session starts
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
    header("Location: index.php");
    exit;
}
include_once "Cliente.php";

if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['usuario']) && isset($_POST['password'])) {
    $vc = $_SESSION['videoclub'];
    $vc->incluirSocio($_POST['nombre'], $_POST['apellidos'], 3, $_POST['usuario'], $_POST['password']);
    $_SESSION['videoclub'] = $vc;
    header("Location: mainAdmin.php");
    exit;
} else {
    header("Location: formCreateCliente.php?error=1");
    exit;
}
