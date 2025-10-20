<?php
spl_autoload(Juego.php, );
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
        $this->productos = $producto;
        echo "Incluido soporte {$this->numProductos}";
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        CintaVideo
    }

    public function Dvd ($titulo, $precio, $idiomas, $pantalla)
    {

    }

    public function incluirJuego($titulo, $precio, $consola , $minJ, $maxJ)
    {
        
    }
    
    public function incluirSocio($nombre, $maxAlquieresConcurrentes = 3){

    }    
    public function listarProductos(){

    }    
    public function listarSocios(){

    }    
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte){

    }
}
