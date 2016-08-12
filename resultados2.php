<?php
include_once 'validaUsuario.php';

$orden2 = new ordenGerencias();
echo $orden2->generaLista($_REQUEST['valor'],strtoupper($_REQUEST['nombre']),strtoupper($_REQUEST['sector']),$_REQUEST['orden']);
?>