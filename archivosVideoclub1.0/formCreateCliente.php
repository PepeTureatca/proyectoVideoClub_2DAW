<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='index.php'>identificarse</a> . <br />");
}

$error = '';
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta Cliente</title>
</head>
<body>
    <h1>Alta de Cliente</h1>

    <p>
    <?php
    if ($error != '') {
        echo htmlspecialchars($error);
    }
    ?>
    </p>

    <form action="createCliente.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required><br>

        <button type="submit">Crear Cliente</button>
    </form>

    <p><a href="mainAdmin.php">Volver al panel</a></p>
</body>
</html>
