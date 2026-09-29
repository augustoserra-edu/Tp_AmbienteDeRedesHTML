<?php
// Escapar los valores al incorporarlos a HTML.
function h($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
