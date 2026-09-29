<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectura de formularios</title>
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
        <h1>Lectura de formularios</h1>
        <p>Completá nombre y apellido. El atributo name de cada campo determina la clave que recibe PHP.</p>
        <h2>Envío con GET</h2>
        <form action="respuesta.php" method="get"><label>Nombre: <input name="nombre" maxlength="100"
                    required></label><label>Apellido: <input name="apellido" maxlength="100" required></label><button
                type="submit">Ingresar información por GET</button></form>
        <h2>Envío con POST</h2>
        <form action="respuesta.php" method="post"><label>Nombre: <input name="nombre" maxlength="100"
                    required></label><label>Apellido: <input name="apellido" maxlength="100" required></label><button
                type="submit">Ingresar información por POST</button></form>
        <p>GET envía los datos en la URL. POST los envía en el cuerpo del requerimiento.</p>
        <footer><a href="../index.php">Volver a PHP · Parte 1</a></footer>
    </main>
</body>

</html>