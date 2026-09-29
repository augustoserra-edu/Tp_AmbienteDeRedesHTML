<?php
require_once __DIR__ . '/../comun.php';
?><!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP básico: variables, arreglos y operaciones</title><link rel="stylesheet" href="../estilo.css">
<script src="../../navegacion/secciones.js" defer></script><script src="../../navegacion/menu.js" defer></script></head>
<body><main><h1>PHP básico: variables, arreglos y operaciones</h1>
<p>Este párrafo está fuera del bloque PHP y se envía directamente al navegador.</p>
<?php
// Una línea de comentario.
/* Un comentario que puede ocupar varias líneas. */
# Otra forma de comentar.
echo "<p style='color:green'>Este párrafo HTML fue generado con echo.</p>";
$variableA = 'valor1'; $variableB = 3; $variableC = 3;
$variableD = $variableB + $variableC;
$verdadero = true; $falso = false;
define('MICONSTANTE', 'valorConstante');
?>
<h2>Variables y tipos</h2>
<table><tr><th>Variable</th><th>Valor</th><th>Tipo</th></tr>
<?php foreach (['variableA'=>$variableA, 'variableB'=>$variableB, 'variableC'=>$variableC, 'variableD'=>$variableD, 'verdadero'=>$verdadero, 'falso'=>$falso] as $nombre=>$valor): ?>
<tr><td><?= h('$' . $nombre) ?></td><td><?= h(is_bool($valor) ? ($valor ? 'true' : 'false') : $valor) ?></td><td><?= h(gettype($valor)) ?></td></tr>
<?php endforeach; ?></table>
<p><?php echo "\$variableA = " . $variableA; ?>. El punto concatena texto y valores.</p>
<p>La suma de $variableB y $variableC es <?= $variableD ?>.</p>
<p>Al imprimir booleanos con echo: true produce «<?= $verdadero ?>» y false produce «<?= $falso ?>».</p>
<p>MICONSTANTE = <?= h(MICONSTANTE) ?>; tipo: <?= gettype(MICONSTANTE) ?>.</p>
<h2>Arreglos de índice numérico</h2>
<?php $saludos = ['hola', 'hello']; array_push($saludos, 'bonjour'); ?>
<p>Primer elemento: <?= h($saludos[0]) ?>. Segundo: <?= h($saludos[1]) ?>. Tipo: <?= gettype($saludos) ?>.</p>
<ul><?php foreach ($saludos as $saludo): ?><li><?= h($saludo) ?></li><?php endforeach; ?></ul>
<h2>Arreglo de dos dimensiones: diccionario</h2>
<?php $diccionario = [['hola','hello','bonjour'], ['adiós','good bye','au revoir'], ['buen día','good morning','bonjour']]; ?>
<table><tr><th>Español</th><th>Inglés</th><th>Francés</th></tr>
<?php foreach ($diccionario as $fila): ?><tr><?php foreach ($fila as $palabra): ?><td><?= h($palabra) ?></td><?php endforeach; ?></tr><?php endforeach; ?></table>
<p>$diccionario[1][2] = <?= h($diccionario[1][2]) ?>. Cantidad de filas: <?= count($diccionario) ?>.</p>
<h2>Arreglo asociativo</h2>
<?php $articulo = ['codArt'=>'cp001', 'descripcion'=>'jaguel', 'precioUnitario'=>20, 'cantidad'=>2]; ?>
<table><tr><th>Clave</th><th>Valor</th><th>Tipo</th></tr>
<?php foreach ($articulo as $clave=>$valor): ?><tr><td><?= h($clave) ?></td><td><?= h($valor) ?></td><td><?= gettype($valor) ?></td></tr><?php endforeach; ?></table>
<p>Cantidad de elementos: <?= count($articulo) ?>. Tipo del arreglo: <?= gettype($articulo) ?>.</p>
<h2>Expresiones aritméticas</h2>
<?php $x=3; $y=4; ?>
<p>$x = <?= $x ?> (<?= gettype($x) ?>), $y = <?= $y ?> (<?= gettype($y) ?>).</p>
<ul><li>Suma: <?= ($x+$y) ?></li><li>Multiplicación: <?= ($x*$y) ?></li><li>División: <?= ($x/$y) ?></li></ul>
<h2>Alcance de las variables</h2>
<?php
$n1=40; $n2=50;
function mostrarAlcance() {
    $n1=5; // Esta variable es local; no modifica el $n1 global.
    echo '<p>Dentro de la función, $n1 local = ' . $n1 . '.</p>';
    echo '<p>Suma global mediante $GLOBALS: ' . ($GLOBALS['n1']+$GLOBALS['n2']) . '.</p>';
}
mostrarAlcance();
?>
<p>Fuera de la función, $n1 sigue siendo <?= $n1 ?> y $n2 vale <?= $n2 ?>.</p>
<footer><a href="../index.php">Volver a PHP · Parte 1</a></footer></main></body></html>
