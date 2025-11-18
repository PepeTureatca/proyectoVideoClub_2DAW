<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>
</head>

<body>
    <h1>Videoclub</h1>
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>

        <label>
            <input type="checkbox" name="tecnica" value="1">
            Activar cookie técnica
        </label>
        <br>

        <label>
            <input type="checkbox" name="comercial" value="1">
            Activar cookie comercial
        </label>
        <br><br>

        <input type="submit" value="Entrar">
    </form>

    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red'>Usuario o contraseña incorrectos.</p>";
    }
    ?>
</body>

</html>
