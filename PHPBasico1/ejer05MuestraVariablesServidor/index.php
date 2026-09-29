<?php
require_once __DIR__ . '/../comun.php';
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables de servidor, cliente y requerimiento</title>
    <link rel="stylesheet" href="../estilo.css">
    <script src="../../navegacion/secciones.js" defer></script>
    <script src="../../navegacion/menu.js" defer></script>
</head>

<body>
    <main>
        <h1>Variables de servidor, cliente y requerimiento</h1>
        <?php
        $grupos = [
            'Variables de servidor' => ['SERVER_ADDR', 'SERVER_PORT', 'SERVER_NAME', 'HTTP_HOST', 'DOCUMENT_ROOT'],
            'Variables de cliente' => ['REMOTE_ADDR', 'REMOTE_PORT'],
            'Variables de requerimiento' => ['SCRIPT_NAME', 'REQUEST_METHOD', 'REQUEST_URI', 'QUERY_STRING']
        ];
        foreach ($grupos as $titulo => $claves): ?>
            <h2><?= h($titulo) ?></h2>
            <table>
                <tr>
                    <th>Variable</th>
                    <th>Valor</th>
                </tr>
                <?php foreach ($claves as $clave): ?>
                    <tr>
                        <td><?= h($clave) ?></td>
                        <td><?= h($_SERVER[$clave] ?? 'No disponible en este servidor') ?></td>
                    </tr><?php endforeach; ?>
            </table>
        <?php endforeach; ?>
        <h2>Todas las variables de $_SERVER</h2>
        <table>
            <tr>
                <th>Variable</th>
                <th>Valor</th>
            </tr>
            <?php foreach ($_SERVER as $clave => $valor):
                // No publicar credenciales, cookies o tokens que el entorno pueda incluir.
                $privada = preg_match('/AUTH|COOKIE|PASS|SECRET|TOKEN|API_KEY|PRIVATE_KEY/i', $clave);
                ?>
                <tr>
                    <td><?= h($clave) ?></td>
                    <td><?= $privada ? '[dato reservado]' : h(is_scalar($valor) ? $valor : json_encode($valor)) ?></td>
                </tr><?php endforeach; ?>
        </table>
        <footer><a href="../index.php">Volver a PHP · Parte 1</a></footer>
    </main>
</body>

</html>