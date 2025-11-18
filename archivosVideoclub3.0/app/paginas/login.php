<?php
session_start();

use Dwes\ProyectoVideoclub\Videoclub;

// Recoger datos del formulario
$usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
$pass = isset($_POST['password']) ? trim($_POST['password']) : '';

// -----------------------------
// COOKIES
// -----------------------------
if (isset($_POST["tecnica"])) {
    setcookie("cookie_tecnica", "1", time() + 3600, "/");
} else {
    setcookie("cookie_tecnica", "", time() - 3600, "/");
}

if (isset($_POST["comercial"])) {
    setcookie("cookie_comercial", "1", time() + 3600, "/");
} else {
    setcookie("cookie_comercial", "", time() - 3600, "/");
}

// -----------------------------
// INICIALIZAR VIDEOCLUB
// -----------------------------
$vc = new Videoclub("Severo 8A");
$vc->incluirSocio("Pepe", "Pérez", 3);
$vc->incluirSocio("Juan", "García", 3, "usuario", "usuario");
$vc->incluirCintaVideo("Los Otros", 2.5, 120);
$vc->incluirDvd("El Exorcista", 3, "es,en,fr", "16:9");
$vc->incluirJuego("Mario Kart", 4, "Wii", 1, 4);

// Guardamos videoclub en sesión
$_SESSION['videoclub'] = $vc;

// Guardamos datos simples
$clientesArray = [];
foreach ($vc->getClientes() as $c) {
    $clientesArray[] = [
        'nombre' => $c->nombre,
        'apellidos' => $c->apellidos,
        'numero' => $c->getNumero(),
        'usuario' => $c->getUsuario(),
        'password' => $c->getPassword(),
        'alquileres' => []
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

// ------------------------------------
// LOGIN
// ------------------------------------

/*
 * IMPORTANTE:
 * Usamos rutas relativas sin barra inicial.
 * Esto hace que funcione aunque el proyecto esté dentro de /REPOS/archivosVideoclub3.0/
 */

// ADMIN
if ($usuario === "admin" && $pass === "admin") {
    $_SESSION['usuario'] = 'admin';

    header("Location: mainAdmin.php"); // ruta relativa
    exit;
}

// CLIENTE
$cliente = $vc->buscarSocioPorCredenciales($usuario, $pass);
if ($cliente) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['cliente'] = $cliente;

    header("Location: mainCliente.php"); // ruta relativa
    exit;
}

// ERROR login
header("Location: ../../index.php?error=1"); // subir a raíz del proyecto
exit;

?>
