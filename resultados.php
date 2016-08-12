<?php
include_once 'busquedas.php';

if (isset($_REQUEST['par'])) { $tipobusqueda = $_REQUEST['par']; } else { $tipobusqueda = ""; } ;
$limite = 150;

$persona = new buscarPersona();
if ($tipobusqueda == "busqueda_todo")
	echo $persona->traerResultados2(strtoupper($_REQUEST['valor']));
else 
	echo $persona->traerResultados(strtoupper($_REQUEST['valor']));
?>