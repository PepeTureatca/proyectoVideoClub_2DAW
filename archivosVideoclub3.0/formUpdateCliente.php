<?php
include_once "Videoclub.php"; // register autoloader before session starts
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
    header("Location: index.php");
    exit;
}
$vc = $_SESSION['videoclub'];
$cliente = null;
if (isset($_GET['numero'])) {
    $clientes = $vc->getClientes();
    foreach ($clientes as $c) {
        if ($c->getNumero() == $_GET['numero']) {
            $cliente = $c;
            break;
        }
    }
}
if ($cliente == null) {
    header("Location: mainAdmin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>
</head>

<body>
    <h1>Editar Cliente</h1>
    <form action="updateCliente.php" method="post">
        <input type="hidden" name="numero" value="<?php echo $cliente->getNumero(); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $cliente->nombre; ?>" required>
        <br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="<?php echo $cliente->apellidos; ?>" required>
        <br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" value="<?php echo $cliente->usuario; ?>" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" value="<?php echo $cliente->password; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>

</html>