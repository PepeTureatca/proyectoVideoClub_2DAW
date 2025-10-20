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
        echo "Incluido socio " . $numero . "<br>";
    }


    public function listarProductos()
    {
        echo "<br>Listado de los " . count($this->productos) . " productos disponibles: ";
        foreach ($this->productos as $key => $producto) {
            echo "<br>". ($key + 1) . ".- ";
            if ($producto instanceof Juego) {
                echo "Juego para: " . $producto->consola;
            } else if ($producto instanceof Dvd) {
                echo "DVD: ";
            }
            echo $producto->muestraResumen() . "<br>";
        }
    }
    public function listarSocios()
    {
        echo "Listado de " . count($this->socios) . " socios del videoclub:<br>";
        foreach ($this->socios as $key => $cliente) {
            echo ($key + 1) . ".- Cliente " . ($key + 1) . ": " . $cliente->muestraResumen() . "<br>";
        }
    }

    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {}
}
