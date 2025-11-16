<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='index.php'>identificarse</a> . <br />");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
</head>
<body>
    <div id="head">
        <h1>Panel de Administrador</h1>
        <h2>Bienvenido <?= htmlspecialchars($_SESSION['usuario']) ?></h2>
    </div>
    <div id="body">
        <div class="contenedor">
            <p>Volver al <a href="main.php">inicio</a></p>

            <div id="listadoClientes">
                <h3>Listado de clientes</h3>
                <ul>
                    <?php
                    if (isset($_SESSION['clientes']) && count($_SESSION['clientes']) > 0) {
                        foreach ($_SESSION['clientes'] as $c) {
                            echo "<li>" . htmlspecialchars($c['nombre']) . " (" .
                                 htmlspecialchars($c['email']) . ", " .
                                 htmlspecialchars($c['telefono']) . ")</li>";
                        }
                    } else {
                        echo "<li>No hay clientes registrados</li>";
                    }
                    ?>
                </ul>
                <p><a href="formCreateCliente.php">Dar de alta un nuevo cliente</a></p>
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
