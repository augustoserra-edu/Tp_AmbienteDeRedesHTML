<?php
require __DIR__ . '/datos.php';
header('Content-Type: application/json; charset=utf-8');
echo json_encode($objRenglonesPedido, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
