<?php
include "login.php";
include "agente.php";

$tipoProceso = $_POST["proceso"];
$agente = new agente();
$agente->setId($_POST["idpersona"]);
if ($tipoProceso == "Alta") $agente->setNombre($_POST["nombre"]); elseif ($tipoProceso == "Modificacion") $agente->setNombre($_POST["mnombre"]);
if ($tipoProceso == "Alta") $agente->setGerencia($_POST["gerencia"]); elseif ($tipoProceso == "Modificacion") $agente->setGerencia($_POST["mgerencia"]);
if ($tipoProceso == "Alta") $agente->setSector($_POST["sector"]); elseif ($tipoProceso == "Modificacion") $agente->setSector($_POST["msector"]);
if ($tipoProceso == "Alta") $agente->setInterno($_POST["interno"]); elseif ($tipoProceso == "Modificacion") $agente->setInterno($_POST["minterno"]);
if ($tipoProceso == "Alta") $agente->setDirecto($_POST["directo"]); elseif ($tipoProceso == "Modificacion") $agente->setDirecto($_POST["mdirecto"]);
if ($tipoProceso == "Alta") $agente->setFax($_POST["fax"]); elseif ($tipoProceso == "Modificacion") $agente->setFax($_POST["mfax"]);
if ($tipoProceso == "Alta") $agente->setCelular($_POST["celular"]); elseif ($tipoProceso == "Modificacion") $agente->setCelular($_POST["mcelular"]);
if ($tipoProceso == "Alta") $agente->setDomicilioLaboral($_POST["domiciliolaboral"]); elseif ($tipoProceso == "Modificacion") $agente->setDomicilioLaboral($_POST["mdomiciliolaboral"]);
if ($tipoProceso == "Alta") $agente->setObservaciones($_POST["observaciones"]); elseif ($tipoProceso == "Modificacion") $agente->setObservaciones($_POST["mobservaciones"]);
if ($tipoProceso == "Alta") $agente->setOrdenPersona($_POST["ordenPersona"]); elseif ($tipoProceso == "Modificacion") $agente->setOrdenPersona($_POST["mordenPersona"]);

switch ($tipoProceso){
	case "Alta":
		$agente->altaA();
		break;
	case "Modificacion":
		$agente->modificacionA();
		break;
	case "Baja":
		$agente->bajaA();
		break;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="Shortcut Icon" HREF="imagenes/AGP.JPG"> 
<title>Buscador Telef&oacute;nico</title>
<LINK href="EstilosTelefonico.css" rel="stylesheet" type="text/css"/>
<LINK href="pluggins/responsive-tabs.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<form action="<?php echo $_SERVER['HTTP_REFERER'];?>" method="post">
<table class="TablaPrincipal">
	<tr>
		<td align="center"><a href="index.php"><img src="imagenes/logo.png" width="500" height="160" /></a><hr/></td>
	</tr>
	<tr>
		<td align="center">La operaci&oacute;n se ha completado con &eacute;xito<p/></td>
	</tr>
	<tr>
		<td align="center"><button type="submit" name="btnVolver"><img src="imagenes/arrow_undo.png"/><b> Volver</b></button></td>
	</tr>
</table>
</form>
</body>
</html>