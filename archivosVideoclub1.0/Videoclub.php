<?php
spl_autoload_register(function ($class) {
    $archivo = __DIR__ . '/' . $class . '.php';
    if (file_exists($archivo)) {
        require_once $archivo;
    } else {
        echo "No se encontró la clase $class en $archivo<br>";
    }
});

class Videoclub
{

    private $nombre;
    private $productos = [];
    private $numProductos;
    private $socios = [];
    private $numSocios;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }
    private function incluirProducto(Soporte $producto) {
        
    }

    public function incluirCintaVideo($titulo, $precio, $duracion) {}

    public function Dvd($titulo, $precio, $idiomas, $pantalla) {}

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ) {}

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        $numero = count($this->socios) + 1;
        $nuevoCliente = new Cliente($nombre, $numero, $maxAlquileresConcurrentes);
        $this->socios[] = $nuevoCliente;
        $this->numSocios = count($this->socios);
        echo "Incluido socio " . $numero . "<br>";
    }


    public function listarProductos()
    {
        echo "Listado de los " . count($this->productos) . " productos disponibles: ";
        foreach ($this->productos as $key => $producto) {
            echo ($key + 1) . ".- ";
            if ($producto instanceof Juego) {
                echo "Juego para " . $producto->consola . ": ";
            } else if ($producto instanceof Dvd) {
                echo "DVD: ";
            }
            echo $producto->getTitulo() . "<br>";
        }
    }
    public function listarSocios()
    {
        echo "Listado de " . count($this->socios) . "socios del videoclub:<br>";
        foreach ($this->socios as $key => $cliente) {
            echo ($key + 1) . ".- Cliente " . ($key + 1) . ": " . $cliente->nombre . "<br>";
        }
    }



    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {}
}
