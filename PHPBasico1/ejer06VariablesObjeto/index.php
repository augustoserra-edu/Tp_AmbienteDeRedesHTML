<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables tipo objeto y JSON</title>
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
        <h1>Variables tipo objeto y JSON</h1>
        <?php
$objRenglonPedido = new stdClass();
$objRenglonPedido->codArt = 'cp001';
$objRenglonPedido->descripcion = 'jaguel 800 gr';
$objRenglonPedido->precioUnitario = 30;
$objRenglonPedido->cantidad = 2;
$renglonesPedido = [];
array_push($renglonesPedido, $objRenglonPedido);
$otroRenglon = new stdClass();
$otroRenglon->codArt = 'cp002';
$otroRenglon->descripcion = 'atun 800 gr';
$otroRenglon->precioUnitario = 24;
$otroRenglon->cantidad = 3;
array_push($renglonesPedido, $otroRenglon);
$objRenglonesPedido = new stdClass();
$objRenglonesPedido->renglonesPedido = $renglonesPedido;
$objRenglonesPedido->cantidadDeRenglones = count($renglonesPedido);
        ?>
        <h2>Objeto $objRenglonPedido</h2>
        <ul><?php foreach ($objRenglonPedido as $clave => $valor): ?>
                <li><?= htmlspecialchars((string) ($clave), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>: <?= htmlspecialchars((string) ($valor), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li><?php endforeach; ?>
        </ul>
        <p>Tipo: <?= gettype($objRenglonPedido) ?>.</p>
        <h2>Arreglo $renglonesPedido</h2>
        <p>Tipo: <?= gettype($renglonesPedido) ?>.</p>
        <table>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio unitario</th>
                <th>Cantidad</th>
            </tr>
            <?php foreach ($renglonesPedido as $renglon): ?>
                <tr>
                    <td><?= htmlspecialchars((string) ($renglon->codArt), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string) ($renglon->descripcion), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string) ($renglon->precioUnitario), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string) ($renglon->cantidad), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                </tr><?php endforeach; ?>
        </table>
        <p>Cantidad de renglones: <?= count($renglonesPedido) ?>.</p>
        <h2>Objeto contenedor $objRenglonesPedido</h2>
        <p>Contiene el array <code>renglonesPedido</code> y el atributo <code>cantidadDeRenglones</code>, con valor
            <?= $objRenglonesPedido->cantidadDeRenglones ?>.</p>
        <h2>Producción de JSON con json_encode()</h2>
        <pre><?= htmlspecialchars((string) (json_encode($objRenglonesPedido, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></pre>
        <footer><a href="../index.php">Volver a PHP · Parte 1</a></footer>
    </main>
</body>

</html>