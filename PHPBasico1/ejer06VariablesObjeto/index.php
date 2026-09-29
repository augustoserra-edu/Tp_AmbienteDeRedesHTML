<?php
require_once __DIR__ . '/../comun.php';
?><!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Variables tipo objeto y JSON</title><link rel="stylesheet" href="../estilo.css">
<script src="../../navegacion/secciones.js" defer></script><script src="../../navegacion/menu.js" defer></script></head>
<body><main><h1>Variables tipo objeto y JSON</h1>
<?php require __DIR__ . '/datos.php'; ?>
<h2>Objeto $objRenglonPedido</h2>
<ul><?php foreach ($objRenglonPedido as $clave=>$valor): ?><li><?= h($clave) ?>: <?= h($valor) ?></li><?php endforeach; ?></ul>
<p>Tipo: <?= gettype($objRenglonPedido) ?>.</p>
<h2>Arreglo $renglonesPedido</h2><p>Tipo: <?= gettype($renglonesPedido) ?>.</p>
<table><tr><th>Código</th><th>Descripción</th><th>Precio unitario</th><th>Cantidad</th></tr>
<?php foreach ($renglonesPedido as $renglon): ?><tr><td><?= h($renglon->codArt) ?></td><td><?= h($renglon->descripcion) ?></td><td><?= h($renglon->precioUnitario) ?></td><td><?= h($renglon->cantidad) ?></td></tr><?php endforeach; ?></table>
<p>Cantidad de renglones: <?= count($renglonesPedido) ?>.</p>
<h2>Objeto contenedor $objRenglonesPedido</h2>
<p>Contiene el array <code>renglonesPedido</code> y el atributo <code>cantidadDeRenglones</code>, con valor <?= $objRenglonesPedido->cantidadDeRenglones ?>.</p>
<h2>Producción de JSON con json_encode()</h2>
<pre><?= h(json_encode($objRenglonesPedido, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) ?></pre>
<p><a href="json.php">Ver la respuesta JSON sin HTML</a></p>
<footer><a href="../index.php">Volver a PHP · Parte 1</a></footer></main></body></html>
