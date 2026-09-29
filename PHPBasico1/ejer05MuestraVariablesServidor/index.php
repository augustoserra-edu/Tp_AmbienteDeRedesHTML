<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables de servidor, cliente y requerimiento</title>
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
        <h1>Variables de servidor, cliente y requerimiento</h1>
        <?php
        $grupos = [
            'Variables de servidor' => ['SERVER_ADDR', 'SERVER_PORT', 'SERVER_NAME', 'HTTP_HOST', 'DOCUMENT_ROOT'],
            'Variables de cliente' => ['REMOTE_ADDR', 'REMOTE_PORT'],
            'Variables de requerimiento' => ['SCRIPT_NAME', 'REQUEST_METHOD', 'REQUEST_URI', 'QUERY_STRING']
        ];
        foreach ($grupos as $titulo => $claves): ?>
            <h2><?= htmlspecialchars((string) ($titulo), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></h2>
            <table>
                <tr>
                    <th>Variable</th>
                    <th>Valor</th>
                </tr>
                <?php foreach ($claves as $clave): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) ($clave), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string) ($_SERVER[$clave] ?? 'No disponible en este servidor'), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
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
                    <td><?= htmlspecialchars((string) ($clave), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                    <td><?= $privada ? '[dato reservado]' : htmlspecialchars((string) (is_scalar($valor) ? $valor : json_encode($valor)), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                </tr><?php endforeach; ?>
        </table>
        <footer><a href="../index.php">Volver a PHP · Parte 1</a></footer>
    </main>
</body>

</html>