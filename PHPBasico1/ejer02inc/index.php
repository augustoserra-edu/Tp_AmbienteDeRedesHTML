<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusión de archivos</title>
    <style>
body { font-family: Arial, sans-serif; color: #17213a; background: #f5f6fa; margin: 0; }
main { max-width: 1000px; margin: auto; padding: 24px; }
h1 { font-size: 1.8rem; } h2 { margin-top: 32px; }
table { border-collapse: collapse; background: white; margin: 16px 0; width: 100%; }
th, td { border: 1px solid #ccd3e0; padding: 10px; text-align: left; overflow-wrap: anywhere; }
th { background: #e5eaff; } pre { white-space: pre-wrap; overflow-wrap: anywhere; background: white; padding: 16px; }
a { color: #243ca0; } label { display: block; margin: 12px 0; } input, button { font: inherit; padding: 8px; max-width: 100%; box-sizing: border-box; }
footer { margin-top: 32px; } .aviso { padding: 12px; background: #fff0ce; } li { margin: 12px 0; }

    </style>
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
        echo '<p>Intento de leer $arreglo1: ' . htmlspecialchars((string) ($arreglo1['nombre']), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
        restore_error_handler();
        foreach ($avisos as $aviso)
            echo '<p class="aviso">Aviso: ' . htmlspecialchars((string) ($aviso), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
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
                        <td><?= htmlspecialchars((string) ($valor), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td><?php endforeach; ?>
                </tr><?php endforeach; ?>
        </table>
        <p>Longitud de $arreglo1: <?= count($arreglo1) ?>. Longitud de $arreglo2: <?= count($arreglo2) ?>.</p>
        <p>Si el archivo falta, <code>include</code> emite un aviso y continúa. <code>require</code> detiene la
            ejecución si el error no se captura.</p>
        <footer><a href="../index.php">Volver a PHP · Parte 1</a></footer>
    </main>
</body>

</html>