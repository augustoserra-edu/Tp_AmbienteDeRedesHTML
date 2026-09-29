<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valores recibidos</title>
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
        <h1>Valores recibidos</h1>
        <?php
        $metodo = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $datos = $metodo === 'POST' ? $_POST : $_GET;
        $nombre = $datos['nombre'] ?? '';
        $apellido = $datos['apellido'] ?? '';
        $valido = is_string($nombre) && is_string($apellido) && trim($nombre) !== '' && trim($apellido) !== '' && strlen($nombre) <= 400 && strlen($apellido) <= 400;
        ?>
        <p>Método: <?= htmlspecialchars((string) ($metodo), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>.</p>
        <?php if ($valido): ?>
            <p>Nombre = <?= htmlspecialchars((string) (trim($nombre)), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
            <p>Apellido = <?= htmlspecialchars((string) (trim($apellido)), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
        <?php else: ?>
            <p class="aviso">Ingresá un nombre y un apellido válidos desde el formulario.</p>
        <?php endif; ?>
        <p><a href="index.php">Volver al formulario</a></p>
        <footer><a href="../index.php">Volver a PHP · Parte 1</a></footer>
    </main>
</body>

</html>