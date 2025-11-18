<?php

namespace Dwes\ProyectoVideoclub;


class CintaVideo extends Soporte
{
    private $duracion;

    public function __construct($titulo, $numero, $precio, $duracion)
    {
        parent::__construct($titulo, $numero, $precio);

        $this->duracion = $duracion;
    }

    public function muestraResumen()
<<<<<<<< HEAD:archivosVideoclub3.0/app/CintaVideo.php
    {
        parent::muestraResumen();
        echo "<br> Duración: " . $this->duracion . " minutos";
    }
}
========
		{
            return parent::muestraResumen() . "<br> Duración: ".$this->duracion." minutos";
		}
	}

>>>>>>>> videoCLub3.0-Pepe:archivosVideoclub3.0/CintaVideo.php
