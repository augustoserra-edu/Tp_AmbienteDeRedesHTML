<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba de PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../navegacion/secciones.js" defer></script>
    <script src="../navegacion/menu.js" defer></script>
</head>
<body>
    <h1>Trabajo práctico de PHP</h1>

    <?php
    $nombre = "Augusto";

    echo "<p>Hola, " . $nombre . "</p>";
    echo "<p>PHP está funcionando en el servidor.</p>";
    echo "<p>Resultado de 4 + 3: " . (4 + 3) . "</p>";
    ?>
</body>
</html>
