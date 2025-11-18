<?php
include_once "Videoclub.php"; // register autoloader before session starts
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
    header("Location: index.php");
    exit;
}

if (isset($_GET['numero'])) {
    $vc = $_SESSION['videoclub'];
    $clientes = $vc->getClientes();
    $nuevosClientes = [];
    foreach ($clientes as $c) {
        if ($c->getNumero() != $_GET['numero']) {
            $nuevosClientes[] = $c;
        }
    }
    $vc->setClientes($nuevosClientes);
    $_SESSION['videoclub'] = $vc;
}

header("Location: mainAdmin.php");
exit;
