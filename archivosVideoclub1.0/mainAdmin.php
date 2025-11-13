<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href= 'index.php'>identificarse</a> . <br />");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mainAdmin</title>
</head>

<body>
    <div id="head">
        <h1>Panel de Administrador</h1>
        <h2>Bienvenido <?= $_SESSION['usuario'] ?></h2>
    </div>
    <div id="body">
        <div class="contenedor">
            <p>Volver al <a href="main.php">inicio</a></p>
            <div id="listadoClientes">
                <h3>Listado de clientes</h3>
                <ul>
                    <li>Cliente 1</li>
                    <li>Cliente 2</li>
                    <li>Cliente 3</li>
                </ul>
            </div>
            <div id="listadoSoportes">
                <h3>Listado de soportes</h3>
                <ul>
                    <li>Soporte 1</li>
                    <li>Soporte 2</li>
                    <li>Soporte 3</li>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>