<?php
use Dwes\ProyectoVideoclub\Videoclub;

session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
    header("Location: ../../index.php");
    exit;
}
$vc = $_SESSION['videoclub'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>
</head>

<body>
    <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
    <a href="logout.php">Cerrar sesión</a>
    <h2>Clientes</h2>
    <a href="formCreateCliente.php">Nuevo Cliente</a>
    <ul>
        <?php
        $clientes = $vc->getClientes();
        foreach ($clientes as $cliente) {
            echo "<li>" . $cliente->muestraResumen() . " <a href='formUpdateCliente.php?numero=" . $cliente->getNumero() . "'>Editar</a> <a href='removeCliente.php?numero=" . $cliente->getNumero() . "' onclick='return confirm(\"¿Seguro que quieres eliminar este cliente?\")'>Eliminar</a></li>";
        }
        ?>
    </ul>
    <h2>Soportes</h2>
    <ul>
        <?php
        $soportes = $vc->getSoportes();
        foreach ($soportes as $soporte) {
            echo "<li>" . $soporte->muestraResumen() . "</li>";
        }
        ?>
    </ul>
</body>

</html>