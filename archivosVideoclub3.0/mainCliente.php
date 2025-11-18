<?php
include_once "Videoclub.php"; // register autoloader before session starts
session_start();
if (!isset($_SESSION['usuario']) || isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'admin') {
    header("Location: index.php");
    exit;
}
$cliente = $_SESSION['cliente'];
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
    <h2>Mis Alquileres</h2>
    <ul>
        <?php
        $alquileres = $cliente->getAlquileres();
        if (empty($alquileres)) {
            echo "<li>No tienes alquileres</li>";
        } else {
            foreach ($alquileres as $alquiler) {
                echo "<li>" . $alquiler->muestraResumen() . "</li>";
            }
        }
        ?>
    </ul>
</body>

</html>