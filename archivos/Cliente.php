<?php
class Cliente
{
    public $nombre;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados;
    private $maxAlquilerConcurrente;

    public function __construct($nombre, $numero, $maxAlquilerConcurrente)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->$maxAlquilerConcurrente = 3;
    }


    public function getNumero()
    {
        return $this->numero;
    }
    
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

 
    public function getNumSoportesAlquilados()
    {
        return $this->numSoportesAlquilados;
    }

     public function muestraResumen()
    {
        
    }
}
