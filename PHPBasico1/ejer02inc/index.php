<?php
require_once __DIR__ . '/../comun.php';
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusión de archivos</title>
    <link rel="stylesheet" href="../estilo.css">
    <script src="../../navegacion/secciones.js" defer></script>
    <script src="../../navegacion/menu.js" defer></script>
</head>

<body>
    <main>
        <h1>Inclusión de archivos</h1>
        <p>Las variables se definen en el archivo separado <code>asignaciones.php</code>.</p>
        <h2>Antes del include</h2>
        <p>¿Existe $arreglo1? <?= isset($arreglo1) ? 'Sí' : 'No' ?>.</p>
        <?php
        // Capturamos los avisos del ejercicio para mostrarlos sin rutas del servidor.
        $avisos = [];
        set_error_handler(function ($nivel, $mensaje) use (&$avisos) {
            $avisos[] = $mensaje;
            return true;
        });
        echo '<p>Intento de leer $arreglo1: ' . h($arreglo1['nombre']) . '</p>';
        restore_error_handler();
        foreach ($avisos as $aviso)
            echo '<p class="aviso">Aviso: ' . h($aviso) . '</p>';
        ?>
        <p>La ejecución continúa a pesar de los avisos.</p>
        <h2>Después del include</h2>
        <?php include __DIR__ . '/asignaciones.php'; ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Año</th>
            </tr>
            <?php foreach ([$arreglo1, $arreglo2] as $persona): ?>
                <tr><?php foreach ($persona as $valor): ?>
                        <td><?= h($valor) ?></td><?php endforeach; ?>
                </tr><?php endforeach; ?>
        </table>
        <p>Longitud de $arreglo1: <?= count($arreglo1) ?>. Longitud de $arreglo2: <?= count($arreglo2) ?>.</p>
        <p>Si el archivo falta, <code>include</code> emite un aviso y continúa. <code>require</code> detiene la
            ejecución si el error no se captura.</p>
        <footer><a href="../index.php">Volver a PHP · Parte 1</a></footer>
    </main>
</body>

</html>