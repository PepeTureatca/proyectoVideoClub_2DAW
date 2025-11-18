<?php
session_start();
include_once "Videoclub.php";

$usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
$pass = isset($_POST['password']) ? trim($_POST['password']) : '';

// Inicializamos el videoclub de pruebas (mismos datos para admin y clientes)
$vc = new Videoclub("Severo 8A");
$vc->incluirSocio("Pepe", "Pérez", 3);
$vc->incluirSocio("Juan", "García", 3, "usuario", "usuario");
$vc->incluirCintaVideo("Los Otros", 2.5, 120);
$vc->incluirDvd("El Exorcista", 3, "es,en,fr", "16:9");
$vc->incluirJuego("Mario Kart", 4, "Wii", 1, 4);

// Siempre guardamos el objeto en sesión para el uso de las vistas actuales
$_SESSION['videoclub'] = $vc;

// También volcamos una estructura asociativa simple con los datos de clientes y soportes
$clientesArray = [];
foreach ($vc->getClientes() as $c) {
    $clientesArray[] = [
        'nombre' => $c->nombre,
        'apellidos' => $c->apellidos,
        'numero' => $c->getNumero(),
        'usuario' => $c->getUsuario(),
        'password' => $c->getPassword(),
        'alquileres' => [] // se podría rellenar si hiciera falta
    ];
}
$soportesArray = [];
foreach ($vc->getSoportes() as $s) {
    $soportesArray[] = [
        'tipo' => get_class($s),
        'titulo' => isset($s->titulo) ? $s->titulo : '',
        'numero' => isset($s->numero) ? $s->numero : null,
        'precio' => isset($s->precio) ? $s->precio : null
    ];
}
$_SESSION['datos_videoclub'] = [
    'clientes' => $clientesArray,
    'soportes' => $soportesArray
];

// Comprobación de credenciales
if ($usuario === "admin" && $pass === "admin") {
    $_SESSION['usuario'] = 'admin';
    header("Location: mainAdmin.php");
    exit;
}

// Si no es admin, buscamos en los clientes cargados
$cliente = $vc->buscarSocioPorCredenciales($usuario, $pass);
if ($cliente) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['cliente'] = $cliente;
    header("Location: mainCliente.php");
    exit;
}

// Si llegamos aquí, credenciales incorrectas
header("Location: index.php?error=1");
exit;
