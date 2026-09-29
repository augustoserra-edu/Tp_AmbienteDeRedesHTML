(() => {
    // Los documentos dentro de un iframe usan la navegación de la página principal.
    if (window.self !== window.top) return;
    let script = document.querySelector('script[src$="navegacion/menu.js"]');
    let raiz = new URL("../", script.src);
    let host = document.createElement("div");
    host.style.cssText = "position:fixed;top:0;left:0;width:100%;height:48px;z-index:10000;";
    let shadow = host.attachShadow({ mode: "open" });
    shadow.innerHTML = `
        <style>
            :host { font: 15px Arial, sans-serif; color: #17213a; }
            * { box-sizing: border-box; }
            nav { height: 48px; display: flex; align-items: center; gap: 16px; padding: 0 16px; background: #17213a; color: white; }
            a { color: inherit; }
            nav a { font-weight: bold; text-decoration: none; white-space: nowrap; }
            #accesos { flex: 1; min-width: 0; display: flex; align-items: center; gap: 6px; overflow-x: auto; height: 100%; }
            #accesos button { padding: 7px 9px; font-size: 14px; flex-shrink: 0; }
            #accesos button:hover, #accesos button[aria-expanded="true"] { background: #435b88; }
            button { font: inherit; padding: 7px 12px; border: 1px solid #8794b5; border-radius: 5px; background: #293958; color: white; cursor: pointer; }
            #panel { position: absolute; top: 48px; left: 0; width: min(400px, 100vw); max-height: calc(100dvh - 48px); overflow: auto; padding: 12px; background: white; border: 1px solid #ccd3e0; box-shadow: 0 12px 24px #0003; }
            [hidden] { display: none !important; }
            #grupos { display: block; }
            h2 { font-size: 16px; margin: 20px 0 8px; }
            ul { padding: 0; margin: 0; list-style: none; }
            li a { display: block; padding: 9px 8px; overflow-wrap: anywhere; text-decoration: none; border-radius: 4px; }
            li a:hover, li a[aria-current="page"] { background: #e5eaff; color: #243ca0; }
            :focus-visible { outline: 3px solid #dc9d00; outline-offset: 2px; }
            @media(max-width: 550px) { #grupos { grid-template-columns: 1fr; } nav { gap: 5px; padding: 0 5px; } #accesos button { padding: 7px 5px; font-size: 12px; } }
        </style>
        <nav aria-label="Navegación del proyecto">
            <a id="inicio">Inicio</a>
            <div id="accesos" aria-label="Accesos directos"></div>
        </nav>
        <section id="panel" aria-label="Secciones y ejercicios" hidden>
            <div id="grupos"></div>
        </section>`;
    let inicio = shadow.getElementById("inicio");
    inicio.href = new URL("index.html", raiz).href;
    let accesos = shadow.getElementById("accesos");
    let carpetas = [
        { nombre: "Html", secciones: [0] },
        { nombre: "Css", secciones: [1, 2] },
        { nombre: "Jscript", secciones: [3, 4] },
        { nombre: "especiales", secciones: [5] },
        { nombre: "PHPBasico1", secciones: [6] }
    ];
    let seleccion = null;
    let botonActivo = null;
    carpetas.forEach(function (carpeta) {
        let boton = document.createElement("button");
        boton.type = "button";
        boton.textContent = carpeta.nombre + " ▾";
        boton.setAttribute("aria-expanded", "false");
        boton.setAttribute("aria-controls", "panel");
        boton.addEventListener("click", function () {
            let estabaAbierto = botonActivo === boton && !panel.hidden;
            cerrar();
            if (estabaAbierto) return;
            seleccion = carpeta.secciones;
            botonActivo = boton;
            grupos.querySelectorAll("section").forEach(function (grupo, indice) {
                grupo.hidden = !seleccion.includes(indice);
            });
            panel.hidden = false;
            panel.style.left = Math.max(0, Math.min(boton.getBoundingClientRect().left, window.innerWidth - panel.offsetWidth)) + "px";
            panel.setAttribute("aria-label", "Ejercicios de " + carpeta.nombre);
            boton.setAttribute("aria-expanded", "true");
        });
        accesos.appendChild(boton);
    });
    let grupos = shadow.getElementById("grupos");
    seccionesNavegacion.forEach(function (seccion) {
        let grupo = document.createElement("section");
        let titulo = document.createElement("h2");
        titulo.textContent = seccion.label;
        grupo.appendChild(titulo);
        let lista = document.createElement("ul");
        seccion.links.forEach(function (item) {
            if (item.path === "index.html") return;
            let fila = document.createElement("li");
            let enlace = document.createElement("a");
            enlace.href = new URL(item.path, raiz).href;
            enlace.textContent = item.label;
            if (new URL(enlace.href).pathname === location.pathname) {
                enlace.setAttribute("aria-current", "page");
            }
            fila.appendChild(enlace);
            lista.appendChild(fila);
        });
        grupo.appendChild(lista);
        grupos.appendChild(grupo);
    });
    let panel = shadow.getElementById("panel");
    function cerrar() {
        accesos.querySelectorAll("button").forEach(function (boton) { boton.setAttribute("aria-expanded", "false"); });
        panel.hidden = true;
    }
    window.addEventListener("resize", cerrar);
    document.addEventListener("click", function (evento) {
        if (!evento.composedPath().includes(host)) cerrar();
    });
    shadow.addEventListener("keydown", function (evento) {
        if (evento.key === "Escape") { cerrar(); if (botonActivo) botonActivo.focus(); }
    });
    // Reservamos la altura de la barra para los ejercicios que llenan el viewport.
    let ajuste = document.createElement("style");
    ajuste.textContent = "body { margin-top: 48px !important; height: calc(100vh - 48px) !important; height: calc(100dvh - 48px) !important; }";
    document.head.appendChild(ajuste);
    document.body.appendChild(host);
})();
