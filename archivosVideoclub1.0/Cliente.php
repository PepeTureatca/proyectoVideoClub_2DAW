<?php
namespace Dwes\ProyectoVideoclub;

include_once 'Soporte.php';

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
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte === $s) {
                echo "<br>El cliente ya tiene alquilado el soporte {$s->titulo}<br>";
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s)
    {
        if ($this->tieneAlquilado($s)) {
            return $this;
        }

        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            echo "<br>Este cliente tiene " . count($this->soportesAlquilados) . " elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo<br>";
            return $this;
        }

        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        echo "<br><br>** Alquilado soporte a**: {$this->nombre}<br><br>";
        echo $s->muestraResumen() . "<br>";

        return $this;
    }

    public function devolver(int $numSoporte)
    {
        $encontrado = false;
        $nuevoAlquileres = [];

        foreach ($this->soportesAlquilados as $indice => $soporte) {
            if ($indice === $numSoporte) {
                echo "<br>El soporte {$soporte->titulo} ha sido devuelto por {$this->nombre}<br>";
                $encontrado = true;
                continue;
            }
            $nuevoAlquileres[] = $soporte;
        }

        $this->soportesAlquilados = $nuevoAlquileres;

        if (!$encontrado) {
            echo "<br>No se ha podido encontrar el soporte en los alquileres de este cliente<br>";
            return $this;
        }

        return $this;
    }

    public function listarAlquileres(): void
    {
        $num = count($this->soportesAlquilados);
        if ($num === 0) {
            echo "<br>Este cliente no tiene alquilado ningún elemento<br>";
            return;
        }

        echo "<br><b>El cliente tiene {$num} soportes alquilados</b><br><br>";
        foreach ($this->soportesAlquilados as $soporte) {
            echo $soporte->muestraResumen() . "<br>";
        }
    }


    public function muestraResumen()
    {
        echo "Nombre: {$this->nombre}<br>";
        echo "Total de alquileres realizados: {$this->numSoportesAlquilados}<br>";
    }
}
