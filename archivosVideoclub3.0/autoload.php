<?php

use Dwes\ProyectoVideoclub\Cliente;
use Dwes\ProyectoVideoclub\CintaVideo;
use Dwes\ProyectoVideoclub\Dvd;
use Dwes\ProyectoVideoclub\Juego;

include_once "../Soporte.php";
include_once "../CintaVideo.php";
include_once "../Dvd.php";
include_once "../Juego.php";
include_once "../Cliente.php";


spl_autoload_register(function ($clase) {
    if (file_exists(str_replace('\\', '/', $clase) . ".php")) {
        require_once(str_replace('\\', '/', $clase) . ".php");
        return true;
    } else {
        return false;
    }
});
