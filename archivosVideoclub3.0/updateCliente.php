<?php
include_once "Videoclub.php"; // register autoloader before session starts
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
    header("Location: index.php");
    exit;
}
include_once "Cliente.php";

if (isset($_POST['numero']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['usuario']) && isset($_POST['password'])) {
    $vc = $_SESSION['videoclub'];
    $clientes = $vc->getClientes();
    foreach ($clientes as $c) {
        if ($c->getNumero() == $_POST['numero']) {
            $c->nombre = $_POST['nombre'];
            $c->apellidos = $_POST['apellidos'];
            $c->usuario = $_POST['usuario'];
            $c->password = $_POST['password'];
            break;
        }
    }
    if ($_SESSION['usuario'] == 'admin') {
        header("Location: mainAdmin.php");
        exit;
    } else {
        header("Location: mainCliente.php");
        exit;
    }
} else {
    if ($_SESSION['usuario'] == 'admin') {
        header("Location: mainAdmin.php");
        exit;
    } else {
        header("Location: mainCliente.php");
        exit;
    }
}
