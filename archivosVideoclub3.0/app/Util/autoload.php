<?php

use Dwes\ProyectoVideoclub\Cliente;
use Dwes\ProyectoVideoclub\CintaVideo;
use Dwes\ProyectoVideoclub\Dvd;
use Dwes\ProyectoVideoclub\Juego;

// Los includes no son necesarios si usas el autoload
//include_once "../Soporte.php";
//include_once "../CintaVideo.php";
//include_once "../Dvd.php";
//include_once "../Juego.php";
//include_once "../Cliente.php";

// Registrar el autoload
spl_autoload_register(function ($clase) {
    // Resolver solo el nombre de la clase (ignorar namespace) porque
    // los archivos de clase están en `app/clases/` sin subcarpetas.
    $parts = explode('\\', $clase);
    $base = end($parts);
    $ruta = __DIR__ . "/../clases/" . $base . ".php";
    
    // Verificar si el archivo existe y cargarlo
    if (file_exists($ruta)) {
        require_once($ruta);
        return true;
    } else {
        // Si no se encuentra el archivo, devolver false
        return false;
    }
});
