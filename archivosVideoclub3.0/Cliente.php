<?php

namespace Dwes\ProyectoVideoclub;


class Cliente
{
    public $nombre;
    public $apellidos;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados = 0;
    private $maxAlquilerConcurrente;

    public $usuario;
    public $password;

    public function __construct($nombre, $apellidos, $numero, $maxAlquilerConcurrente = 3, $usuario = "", $password = "")
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        $this->usuario = $usuario;
        $this->password = $password;
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
                // Silenciamos la salida para no interferir con las vistas
                // echo "<br>El cliente ya tiene alquilado el soporte {$s->titulo}<br>";
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s)
    {
        if ($this->tieneAlquilado($s)) {
            throw new Util\SoporteYaAlquiladoException;
            return $this;
        }

        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
<<<<<<<< HEAD:archivosVideoclub3.0/app/Cliente.php
            echo "<br>Este cliente tiene " . count($this->soportesAlquilados) . " elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo<br>";
            return $this;
========
            // echo "<br>Este cliente tiene " . count($this->soportesAlquilados) . " elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo<br>";
            return false;
>>>>>>>> videoCLub3.0-Pepe:archivosVideoclub3.0/Cliente.php
        }

        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        // echo "<br><br>** Alquilado soporte a**: {$this->nombre}<br><br>";
        // echo $s->muestraResumen() . "<br>";

        return $this;
    }

    public function devolver(int $numSoporte)
    {
        $encontrado = false;
        $nuevoAlquileres = [];

        foreach ($this->soportesAlquilados as $indice => $soporte) {
            if ($indice === $numSoporte) {
                // echo "<br>El soporte {$soporte->titulo} ha sido devuelto por {$this->nombre}<br>";
                $encontrado = true;
                continue;
            }
            $nuevoAlquileres[] = $soporte;
        }

        $this->soportesAlquilados = $nuevoAlquileres;

        if (!$encontrado) {
<<<<<<<< HEAD:archivosVideoclub3.0/app/Cliente.php
            throw new Util\SoporteNoEncontradoException;
            return $this;
========
            // echo "<br>No se ha podido encontrar el soporte en los alquileres de este cliente<br>";
            return false;
>>>>>>>> videoCLub3.0-Pepe:archivosVideoclub3.0/Cliente.php
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


    // GET ALQUILERES PARA MAINCLIENTE
    public function getAlquileres(): array
    {
        return $this->soportesAlquilados;
    }

    public function muestraResumen()
    {
        return "<strong>Nombre:</strong> " . $this->nombre . " " . $this->apellidos . " | <strong>Usuario:</strong> " . $this->usuario . " | <strong>Alquileres:</strong> " . $this->numSoportesAlquilados;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
