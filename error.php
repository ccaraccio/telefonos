<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="Shortcut Icon" HREF="imagenes/group_error.png"> 
<title>Buscador Telef&oacute;nico</title>
<LINK href="EstilosTelefonico.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<form action="<?php echo $_SERVER['HTTP_REFERER'];?>" method="post">
<table class="TablaPrincipal">
	<tr>
		<td align="center">
			<a href="index.php"><img src="imagenes/logoerror.png" width="500" height="160" /></a><hr/>
			<span style = "font-family: verdana; font-weight: bold; float: right;"><a href="logout.php">Cerrar Sesi&oacute;n</a></span>
		</td>
	</tr>
	<?php if (isset($_GET['result']) && $_GET['result'] == '1'): ?>
	<tr>
		<td align="center" class="Estilo1" height="50">
			<h1>Acceso Inv&aacute;lido</h1>
			<p>El usuario o contrase&ntilde;a ingresado son incorrectos. Int&eacute;ntelo nuevamente.</p>  
		</td>
	</tr>
	<?php elseif (isset($_GET['result']) && $_GET['result'] == '2'): ?>
	<tr>
		<td align="center" class="Estilo1" height="50">Debe seleccionar un legajo/usuario.</td>
	</tr>
	<?php elseif (isset($_GET['result']) && $_GET['result'] == '3'): ?>
	<tr>
		<td align="center" class="Estilo1" height="50">No tiene permisos para acceder a esta secci&oacute;n</td>
	</tr>
	<?php elseif (isset($_GET['result']) && $_GET['result'] == '4'): ?>
	<tr>
		<td align="center" class="Estilo1" height="50">La consulta no ha arrojado resultados.</td>
	</tr>
	<?php elseif (isset($_GET['result']) && $_GET['result'] == '5'): ?>
	<tr>
		<td align="center" class="Estilo1" height="50">Debe seleccionar un rango menor o igual a 10 a&ntilde;os</td>
	</tr>
	<?php elseif (isset($_GET['result']) && $_GET['result'] == '6'): ?>
	<tr>
		<td align="center" class="Estilo1" height="50">Se ha producido un error en la actualizaci&oacute;n de los datos.</td>
	</tr>
	<?php elseif (isset($_GET['result']) && $_GET['result'] == '7'): ?>
	<tr>
		<td align="center" class="Estilo1" height="50">La diferencia debe ser menor a 13 meses.</td>
	</tr>
	<?php endif;?>
	<tr>
		<td align="center"><button type="submit" name="btnVolver"><img src="imagenes/arrow_undo.png"/><b> Volver</b></button></td>
	</tr>
	<tr>
		<td class="Estilo2"><hr/>Sistemas - Depto Desarrollo</td>
	</tr>
	<tr>
		<td class="Estilo2">Administracion General de Puertos S.E. - AGP <img src="imagenes/AGP.JPG" width="20" height="23" /></td>
	</tr>
</table>
</form>
</body>
</html>

