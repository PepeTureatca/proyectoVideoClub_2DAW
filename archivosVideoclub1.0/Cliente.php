<?php
class Cliente 
{
    public $nombre;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados = 0;
    private $maxAlquilerConcurrente;

    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados()
    {
        return $this->numSoportesAlquilados;
    }


    public function tieneAlquilado(Soporte $s): bool
    {
        foreach ($this->soportesAlquilados as $soporte) 
            {
            if ($soporte === $s) {
               return  true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s): bool
    {
        
            if ($this->tieneAlquilado($s) >= $this->maxAlquilerConcurrente) 
            {
                echo "Está alquilado o Ha superado el cupo de alquileres";
               return  false;
            }
            else
            {
                $this->numSoportesAlquilados++;
                $this->soportesAlquilados[]= $s;
            }
            echo "<br> <b>Alquilado soporte a:</b> ".$this->nombre;
        return true;
    }

    public function muestraResumen()
    {
        echo "Nombre: {$this->nombre}<br>";
        echo "Total de alquileres: " . count($this->soportesAlquilados) . "<br>";
    }
   
}
