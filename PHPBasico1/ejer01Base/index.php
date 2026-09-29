<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP básico: variables, arreglos y operaciones</title>
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
    <style>
        .variables .variable {
            color: blue;
        }
    </style>
    <script src="../../navegacion/secciones.js" defer></script>
    <script src="../../navegacion/menu.js" defer></script>
</head>

<body>
    <main>
        <h1>PHP básico: variables, arreglos y operaciones</h1>
        <p>Este párrafo está fuera del bloque PHP y se envía directamente al navegador.</p>
        <?php
        // Una línea de comentario.
/* Un comentario que puede ocupar varias líneas. */
        # Otra forma de comentar.
        echo "<p style='color:green'>Este parrafo HTML fue generado con echo.</p>";
        $variableA = 'valor1';
        $variableB = 3;
        $variableC = 3;
        $variableD = $variableB + $variableC;
        $verdadero = true;
        $falso = false;
        define('MICONSTANTE', 'valorConstante');
        ?>
        <h2>Variables y tipos</h2>
        <section class="variables">
            <?php foreach (['variableA' => $variableA, 'variableB' => $variableB, 'variableC' => $variableC, 'variableD' => $variableD, 'verdadero' => $verdadero, 'falso' => $falso] as $nombre => $valor): ?>
                <p><strong>El valor de <span class="variable"><?= htmlspecialchars((string) ('$' . $nombre), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></span> es:</strong>
                    <?= htmlspecialchars((string) (is_bool($valor) ? ($valor ? 'true' : 'false') : $valor), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
                <p><strong>El tipo de <span class="variable"><?= htmlspecialchars((string) ('$' . $nombre), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></span> es:</strong>
                    <?= htmlspecialchars((string) (gettype($valor)), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
            <?php endforeach; ?>
            <p><strong><span class="variable">$variableA</span> =</strong> <?= htmlspecialchars((string) ($variableA), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>. <strong>El punto
                    concatena texto y valores.</strong></p>
            <p><strong>La suma de <span class="variable">$variableB</span> y <span class="variable">$variableC</span>
                    es:</strong> <?= $variableD ?>.</p>
        </section>
        <p>Al imprimir booleanos con echo: true produce «<?= $verdadero ?>» y false produce «<?= $falso ?>».</p>
        <p>MICONSTANTE = <?= htmlspecialchars((string) (MICONSTANTE), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>; tipo: <?= gettype(MICONSTANTE) ?>.</p>
        <h2>Arreglos de índice numérico</h2>
        <?php $saludos = ['hola', 'hello'];
        array_push($saludos, 'bonjour'); ?>
        <p>Primer elemento: <?= htmlspecialchars((string) ($saludos[0]), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>. Segundo: <?= htmlspecialchars((string) ($saludos[1]), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>. Tipo: <?= gettype($saludos) ?>.</p>
        <ul><?php foreach ($saludos as $saludo): ?>
                <li><?= htmlspecialchars((string) ($saludo), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li><?php endforeach; ?>
        </ul>
        <h2>Arreglo de dos dimensiones: diccionario</h2>
        <?php $diccionario = [['hola', 'hello', 'bonjour'], ['adiós', 'good bye', 'au revoir'], ['buen día', 'good morning', 'bonjour']]; ?>
        <table>
            <tr>
                <th>Español</th>
                <th>Inglés</th>
                <th>Francés</th>
            </tr>
            <?php foreach ($diccionario as $fila): ?>
                <tr><?php foreach ($fila as $palabra): ?>
                        <td><?= htmlspecialchars((string) ($palabra), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td><?php endforeach; ?>
                </tr><?php endforeach; ?>
        </table>
        <p>$diccionario[1][2] = <?= htmlspecialchars((string) ($diccionario[1][2]), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>. Cantidad de filas: <?= count($diccionario) ?>.</p>
        <h2>Arreglo asociativo</h2>
        <?php $articulo = ['codArt' => 'cp001', 'descripcion' => 'jaguel', 'precioUnitario' => 20, 'cantidad' => 2]; ?>
        <table>
            <tr>
                <th>Clave</th>
                <th>Valor</th>
                <th>Tipo</th>
            </tr>
            <?php foreach ($articulo as $clave => $valor): ?>
                <tr>
                    <td><?= htmlspecialchars((string) ($clave), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string) ($valor), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                    <td><?= gettype($valor) ?></td>
                </tr><?php endforeach; ?>
        </table>
        <p>Cantidad de elementos: <?= count($articulo) ?>. Tipo del arreglo: <?= gettype($articulo) ?>.</p>
        <h2>Expresiones aritméticas</h2>
        <?php $x = 3;
        $y = 4; ?>
        <p>$x = <?= $x ?> (<?= gettype($x) ?>), $y = <?= $y ?> (<?= gettype($y) ?>).</p>
        <ul>
            <li>Suma: <?= ($x + $y) ?></li>
            <li>Multiplicación: <?= ($x * $y) ?></li>
            <li>División: <?= ($x / $y) ?></li>
        </ul>
        <h2>Alcance de las variables</h2>
        <?php
        $n1 = 40;
        $n2 = 50;
        function mostrarAlcance()
        {
            $n1 = 5; // Esta variable es local; no modifica el $n1 global.
            echo '<p>Dentro de la función, $n1 local = ' . $n1 . '.</p>';
            echo '<p>Suma global mediante $GLOBALS: ' . ($GLOBALS['n1'] + $GLOBALS['n2']) . '.</p>';
        }
        mostrarAlcance();
        ?>
        <p>Fuera de la función, $n1 sigue siendo <?= $n1 ?> y $n2 vale <?= $n2 ?>.</p>
        <footer><a href="../index.php">Volver a PHP · Parte 1</a></footer>
    </main>
</body>

</html>