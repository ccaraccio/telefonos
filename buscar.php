<?php
//include "login.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="Shortcut Icon" HREF="imagenes/AGP.JPG"> 
<title>&Iacute;ndice Telef&oacute;nico</title>
<script type="text/javascript" src="./jquery.js"></script>
<script type="text/javascript" src="./telefonos.js"></script>
<LINK href="EstilosTelefonico.css" rel="stylesheet" type="text/css"/>
<LINK href="pluggins/responsive-tabs.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<form action="<?php echo $_SERVER['HTTP_REFERER'];?>" method="post">
<table class="TablaPrincipal">
	<tr>
		<td align="center">
			<a href="index.php"><img src="imagenes/logo.png" /></a><hr/>
		</td>
	</tr>
	<tr>
		<td align="center">
			Buscar <input type="text" size="50" name="busqueda_todo" class="guardar_datos id_busqueda" value="Ingrese Apellido y Nombre, Gerencia o Sector"/>
			<div class="div_busqueda" id="busqueda_persona" style= "width: 1000px; height: 200px; overflow: auto;"></div>
		</td>
	</tr>
	<tr>
		<td align="center"><button type="submit" name="btnVolver"><img src="imagenes/arrow_undo.png"/><b> Volver</b></button></td>
	</tr>
</table>
</form>
</body>
</html>
