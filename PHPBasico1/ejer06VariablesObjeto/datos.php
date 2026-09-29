<?php
$objRenglonPedido = new stdClass();
$objRenglonPedido->codArt = 'cp001';
$objRenglonPedido->descripcion = 'jaguel 800 gr';
$objRenglonPedido->precioUnitario = 30;
$objRenglonPedido->cantidad = 2;
$renglonesPedido = [];
array_push($renglonesPedido, $objRenglonPedido);
$otroRenglon = new stdClass();
$otroRenglon->codArt = 'cp002';
$otroRenglon->descripcion = 'atun 800 gr';
$otroRenglon->precioUnitario = 24;
$otroRenglon->cantidad = 3;
array_push($renglonesPedido, $otroRenglon);
$objRenglonesPedido = new stdClass();
$objRenglonesPedido->renglonesPedido = $renglonesPedido;
$objRenglonesPedido->cantidadDeRenglones = count($renglonesPedido);
