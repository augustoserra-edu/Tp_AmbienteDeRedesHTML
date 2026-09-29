<?php
require_once __DIR__ . '/../comun.php';
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valores recibidos</title>
    <link rel="stylesheet" href="../estilo.css">
    <script src="../../navegacion/secciones.js" defer></script>
    <script src="../../navegacion/menu.js" defer></script>
</head>

<body>
    <main>
        <h1>Valores recibidos</h1>
        <?php
        $metodo = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $datos = $metodo === 'POST' ? $_POST : $_GET;
        $nombre = $datos['nombre'] ?? '';
        $apellido = $datos['apellido'] ?? '';
        $valido = is_string($nombre) && is_string($apellido) && trim($nombre) !== '' && trim($apellido) !== '' && strlen($nombre) <= 400 && strlen($apellido) <= 400;
        ?>
        <p>Método: <?= h($metodo) ?>.</p>
        <?php if ($valido): ?>
            <p>Nombre = <?= h(trim($nombre)) ?></p>
            <p>Apellido = <?= h(trim($apellido)) ?></p>
        <?php else: ?>
            <p class="aviso">Ingresá un nombre y un apellido válidos desde el formulario.</p>
        <?php endif; ?>
        <p><a href="index.php">Volver al formulario</a></p>
        <footer><a href="../index.php">Volver a PHP · Parte 1</a></footer>
    </main>
</body>

</html>