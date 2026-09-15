const formulario = document.querySelector('#formulario');
const resultado = document.querySelector('#resultado');
// Demostración local: no hay un servidor ni se guardan los datos ingresados.
formulario.addEventListener('submit', (event) => {
    event.preventDefault();
    resultado.textContent = 'Formulario validado correctamente. Esta demostración no envía ni guarda los datos.';
    resultado.hidden = false;
    resultado.scrollIntoView({ block: 'nearest' });
});
formulario.addEventListener('reset', () => {
    resultado.hidden = true;
    resultado.textContent = '';
});
