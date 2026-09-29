<?php
require_once __DIR__ . '/../comun.php';
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectura de formularios</title>
    <link rel="stylesheet" href="../estilo.css">
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