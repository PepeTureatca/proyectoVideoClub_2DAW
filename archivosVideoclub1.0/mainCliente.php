<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once 'Cliente.php';


if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href= 'index.php'>identificarse</a> . <br />");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mainCliente</title>
</head>

<body>
    <div id="head">
        <h1>Panel de Cliente</h1>
        <h2>Bienvenido <?= $_SESSION['usuario'] ?></h2>
    </div>
    <div id="body">
        <div class="contenedor">
            <p>Volver al <a href="main.php">inicio</a></p>

            <div id="listadoSoportesAlquilados">
                <h3>Listado de soportes alquilados</h3>
                <ul>
                    <?php foreach ($cliente->getAlquileres() as $soporte) : ?>
                        <li><?= $soporte->getTitulo(); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>