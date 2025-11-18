<?php

namespace Dwes\ProyectoVideoclub;


class Juego extends Soporte
{
    public $consola;
    private $minNumJugadores = 0;
    private $maxNumJugadores = 0;

    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores)
    {
        parent::__construct($titulo, $numero, $precio);

        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosibles()
    {
<<<<<<<< HEAD:archivosVideoclub3.0/app/Juego.php
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) {
            echo "<br> Para un jugador";
        } else {
            echo "<br> Para varios jugadores";
========
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) 
        {
            return "<br> Para un jugador";
        }else
        {
            return "<br> Para varios jugadores";
>>>>>>>> videoCLub3.0-Pepe:archivosVideoclub3.0/Juego.php
        }
    }

    public function muestraResumen()
    {
        return parent::muestraResumen() . $this->muestraJugadoresPosibles();
    }
}
