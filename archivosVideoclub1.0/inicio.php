<?php
include "Soporte.php";

use Dwes\ProyectoVideoclub\Soporte;
use Dwes\ProyectoVideoclub\Videoclub;

echo "<h1>VIDEOCLUB</h1>";
echo "<h2>EJERCICIO 1 (320)</h2> ";

$soporte1 = new Soporte("Tenet", 22, 3);
echo "<strong>" . $soporte1->titulo . "</strong>";
echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
$soporte1->muestraResumen();
?>

<?php
include "CintaVideo.php";

use Dwes\ProyectoVideoclub\CintaVideo;

echo "<h2>EJERCICIO 2 (321)</h2> ";

$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
echo "<strong>" . $miCinta->titulo . "</strong>";
echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
$miCinta->muestraResumen();
?>




<?php
echo "<h2>EJERCICIO 3 (322)</h2> ";

include "Dvd.php";

use Dwes\ProyectoVideoclub\Dvd;

$miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
echo "<strong>" . $miDvd->titulo . "</strong>";
echo "<br>Precio: " . $miDvd->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " euros";
$miDvd->muestraResumen();
?>

 <?php
  echo "<h2>EJERCICIO 4 (323)</h2> ";

  include "Juego.php";

  use Dwes\ProyectoVideoclub\Juego;

  $miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
  echo "<strong>" . $miJuego->titulo . "</strong>";
  echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
  echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
  $miJuego->muestraResumen();
  ?>

 <?php
  echo "<h2>INICIO 2</h2> ";
  include_once "CintaVideo.php";
  include_once "Dvd.php";
  include_once "Juego.php";
  include_once "Cliente.php";

  use Dwes\ProyectoVideoclub\Cliente;

  //instanciamos un par de objetos cliente
  $cliente1 = new Cliente("Bruce Wayne", 23);
  $cliente2 = new Cliente("Clark Kent", 33);

  //mostramos el número de cada cliente creado 
  echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
  echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero();

  //instancio algunos soportes 
  $soporte1 = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
  $soporte2 = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
  $soporte3 = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
  $soporte4 = new Dvd("El Imperio Contraataca", 4, 3, "es,en", "16:9");

  //alquilo algunos soportes
  $cliente1->alquilar($soporte1);
  $cliente1->alquilar($soporte2);
  $cliente1->alquilar($soporte3);

  //voy a intentar alquilar de nuevo un soporte que ya tiene alquilado
  $cliente1->alquilar($soporte1);
  //el cliente tiene 3 soportes en alquiler como máximo
  //este soporte no lo va a poder alquilar
  $cliente1->alquilar($soporte4);
  //este soporte no lo tiene alquilado
  $cliente1->devolver(4);
  //devuelvo un soporte que sí que tiene alquilado
  $cliente1->devolver(2);
  //alquilo otro soporte
  $cliente1->alquilar($soporte4);
  //listo los elementos alquilados
  $cliente1->listarAlquileres();
  //este cliente no tiene alquileres
  $cliente2->devolver(2);
  ?>

<?php
include_once "Videoclub.php"; // No incluimos nada más

$vc = new Videoclub("Severo 8A");

//voy a incluir unos cuantos soportes de prueba 
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1);
$vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incluirDvd("Torrente", 4.5, "es", "16:9");
$vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9");
$vc->incluirDvd("El Imperio Contraataca", 3, "es,en", "16:9");
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
$vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);

//listo los productos 
$vc->listarProductos();

//voy a crear algunos socios 
$vc->incluirSocio("Amancio Ortega");
$vc->incluirSocio("Pablo Picasso", 2);

$vc->alquilaSocioProducto(1, 2);
$vc->alquilaSocioProducto(1, 3);
//alquilo otra vez el soporte 2 al socio 1. 
// no debe dejarme porque ya lo tiene alquilado 
$vc->alquilaSocioProducto(1, 2);
//alquilo el soporte 6 al socio 1. 
//no se puede porque el socio 1 tiene 2 alquileres como máximo 
$vc->alquilaSocioProducto(1, 6);

//listo los socios 
$vc->listarSocios();
