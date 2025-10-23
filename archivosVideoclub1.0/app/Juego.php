<?php
namespace Dwes\ProyectoVideoclub;

include_once 'Soporte.php';

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
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) 
        {
            echo "<br> Para un jugador";
        }else
        {
            echo "<br> Para varios jugadores";
        }
    }

    public function muestraResumen()
    {
        parent::muestraResumen();
        echo $this->muestraJugadoresPosibles();
    }
}
