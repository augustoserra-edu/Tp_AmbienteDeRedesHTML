
let idioma = window.navigator.languages[0].substr(0, 2);

if (idioma == "en") {
    document.documentElement.lang = "en";
    document.title = "Translation";
    document.getElementById("titulo-inicio").innerHTML = "Learn to";
    document.getElementById("titulo-fin").innerHTML = "study seriously";
    document.getElementById("ayuda").innerHTML = "Change your browser's preferred language between Spanish and English and reload the page.";
    document.getElementById("volver").innerHTML = "Back to JavaScript · Part 2";
}
