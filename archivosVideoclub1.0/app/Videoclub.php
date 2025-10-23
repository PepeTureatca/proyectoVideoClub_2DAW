<?php
namespace Dwes\ProyectoVideoclub;

include_once 'Soporte.php';
include_once 'Cliente.php';
include_once 'Juego.php';
include_once 'Dvd.php';
include_once 'CintaVideo.php';

class Videoclub
{

    private $nombre;
    private $productos = [];
    private $numProductos = 0;
    private $socios = [];
    private $numSocios = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }
    private function incluirProducto(Soporte $producto)
    {
        $this->productos[] = $producto;
        echo "<br>Incluido soporte {$this->numProductos}";
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $numero = count($this->productos) + 1;
        $nuevoCintavideo = new CintaVideo($titulo, $numero, $precio, $duracion);
        $this->incluirProducto(producto: $nuevoCintavideo);
    }

    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        $numero = count($this->productos) + 1;
        $nuevoDvd = new Dvd($titulo, $numero, $precio, $idiomas, $pantalla);
        $this->incluirProducto(producto: $nuevoDvd);
    }

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $numero = count($this->productos) + 1;
        $nuevoJuego = new Juego($titulo, $numero, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($nuevoJuego);
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        $numero = count($this->socios);
        $nuevoCliente = new Cliente($nombre, $numero, $maxAlquileresConcurrentes);
        $this->socios[] = $nuevoCliente;
        $this->numSocios = count($this->socios);
        echo "<br><br>Incluido socio " . $numero;
    }


    public function listarProductos()
    {
        echo "<br><br>Listado de los " . count($this->productos) . " productos disponibles: ";
        foreach ($this->productos as $key => $producto) {
            echo "<br>" . ($key + 1) . ".- ";
            if ($producto instanceof Juego) {
                echo "Juego para: " . $producto->consola;
            } else if ($producto instanceof Dvd) {
                echo "Película en DVD:";
            } else if ($producto instanceof CintaVideo) {
                echo "Película en VHS:";
            }
            echo $producto->muestraResumen() . "<br>";
        }
    }
    public function listarSocios()
    {
        echo "<br><br>Listado de " . count($this->socios) . " socios del videoclub:<br>";
        foreach ($this->socios as $key => $cliente) {
            echo ($key + 1) . ".- Cliente " . $key . ": " . $cliente->nombre . "<br>";
            echo "Alquileres actuales: " . $cliente->getNumSoportesAlquilados() . "<br>";
        }
    }

    public function alquilaSocioProducto($numeroCliente, $numeroSoporte)
    {
        $this->socios[$numeroCliente]->alquilar($this->productos[$numeroSoporte]);
        return $this;
    }
}
