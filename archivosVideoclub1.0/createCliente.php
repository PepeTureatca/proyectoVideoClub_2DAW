<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='index.php'>identificarse</a> . <br />");
}

if (!isset($_POST['nombre'], $_POST['email'], $_POST['telefono'])) {
    header("Location: formCreateCliente.php?error=Faltan+datos");
    exit;
}

$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$telefono = trim($_POST['telefono']);

if ($nombre === '' || $email === '' || $telefono === '') {
    header("Location: formCreateCliente.php?error=Todos+los+campos+son+obligatorios");
    exit;
}

if (!isset($_SESSION['clientes'])) {
    $_SESSION['clientes'] = [];
}

$cliente = [
    'nombre' => $nombre,
    'email' => $email,
    'telefono' => $telefono
];

$_SESSION['clientes'][] = $cliente;

header("Location: mainAdmin.php");
exit;
