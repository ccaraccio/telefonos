<?php 
include "login.php";
include "validaUsuario.php";

$validacion = new validaUsuario($_SESSION['id']);
$gerencias = new gerencias();
$orden = new ordenGerencias();
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
<table class="TablaPrincipal">
	<tr>
		<td align="center">
			<a href="index.php"><img src="imagenes/logo.png" width="500" height="160" /></a><hr/>
			<span style = "font-family: verdana; font-weight: bold; float: right;"><a href="logout.php">Cerrar Sesi&oacute;n</a></span>
		</td>
	</tr>
	<tr>
		<td align="center">
			<form method="post" action="abmpersonasp.php">
			<div class="responsive-tabs">
				<h2><img src="./imagenes/group_add.png">Nuevo</h2>
					<div><p/>
						<table class="cnuevo">
							<tr>
								<td>Apellido y Nombre</td>
								<td><input name="nombre" class="nombre" id="nombre" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Gerencia</td>
								<td><select name="gerencia" class="gerencia" id="gerencia"><?php echo $gerencias->generaCombo(); ?></select></td>
							</tr>
							<tr>
								<td>Sector</td>
								<td><input name="sector" class="sector" id="sector" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Interno</td>
								<td><input name="interno" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Directo</td>
								<td><input name="directo" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Fax</td>
								<td><input name="fax" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Celular</td>
								<td><input name="celular" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Domicilio Laboral</td>
								<td><input name="domiciliolaboral" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Observaciones</td>
								<td><input name="observaciones" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Orden de Persona</td>
								<td><input name="ordenPersona" id="orden" class="ordenPersona" type="text" size="50"/><div></div></td>
							</tr>
						</table>
						<p/><button name="proceso" value="Alta"><img src="./imagenes/cog_edit.png" /> Guardar</button>
					</div>
				<h2><img src="./imagenes/group_edit.png">Modificaci&oacute;n</h2>
					<div>
						Buscar <input type="text" size="50" name="busqueda_comun" class="guardar_datos id_busqueda" value="Ingrese Apellido y Nombre, Gerencia o Sector"/>
						<div class="div_busqueda" id="busqueda_persona" style= "width: 100%; height: 200px; overflow: auto;"></div>
						<table id="cmodificacion" class="tablacontenidos" style="display:none">
							<tr>
								<td>Apellido y Nombre</td>
								<td><input name="mnombre" class="nombre" id="mnombre" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Gerencia</td>
								<td><select name="mgerencia" class="gerencia" id="mgerencia"><?php echo $gerencias->generaCombo(); ?></select></td>
							</tr>
							<tr>
								<td>Sector</td>
								<td><input name="msector" class="sector" id="msector" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Interno</td>
								<td><input name="minterno" id="minterno" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Directo</td>
								<td><input name="mdirecto" id="mdirecto" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Fax</td>
								<td><input name="mfax" id="mfax" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Celular</td>
								<td><input name="mcelular" id="mcelular" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Domicilio Laboral</td>
								<td><input name="mdomiciliolaboral" id="mdomiciliolaboral" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Observaciones</td>
								<td><input name="mobservaciones" id="mobservaciones" type="text" size="50"/></td>
							</tr>
							<tr>
								<td>Orden de Persona</td>
								<td><input name="mordenPersona" id="morden" class="ordenPersona" type="text" size="50"/><div></div></td>
							</tr>
						</table>
						<p/><button name="proceso" value="Modificacion"><img src="./imagenes/cog_edit.png" /> Guardar</button>
					</div>
				<h2><img src="./imagenes/group_delete.png">Eliminar</h2>
					<div>
						Buscar <input type="text" size="50" name="busqueda_comun" class="guardar_datos id_busqueda" value="Ingrese Apellido y Nombre, Gerencia o Sector"/>
						<div class="div_busqueda" id="bbusqueda_persona" style= "width: 100%; height: 200px; overflow: auto;"></div>
						<table id="cbaja" class="tablacontenidos" style="display:none">
							<tr>
								<td>Apellido y Nombre</td>
								<td><input name="bnombre" class="nombre" id="bnombre" type="text" size="50" disabled/></td>
							</tr>
							<tr>
								<td>Gerencia</td>
								<td><select name="bgerencia" class="gerencia" id="bgerencia"><?php echo $gerencias->generaCombo(); ?></select></td>
							</tr>
							<tr>
								<td>Sector</td>
								<td><input name="bsector" class="sector" id="bsector" type="text" size="50" disabled/></td>
							</tr>
							<tr>
								<td>Interno</td>
								<td><input name="binterno" id="binterno" type="text" size="50" disabled/></td>
							</tr>
							<tr>
								<td>Directo</td>
								<td><input name="bdirecto" id="bdirecto" type="text" size="50" disabled/></td>
							</tr>
							<tr>
								<td>Fax</td>
								<td><input name="bfax" id="bfax" type="text" size="50" disabled/></td>
							</tr>
							<tr>
								<td>Celular</td>
								<td><input name="bcelular" id="bcelular" type="text" size="50" disabled/></td>
							</tr>
							<tr>
								<td>Domicilio Laboral</td>
								<td><input name="bdomiciliolaboral" id="bdomiciliolaboral" type="text" size="50" disabled/></td>
							</tr>
							<tr>
								<td>Observaciones</td>
								<td><input name="bobservaciones" id="bobservaciones" type="text" size="50" disabled/></td>
							</tr>
						</table>
						<p/><button name="proceso" value="Baja"><img src="./imagenes/group_delete.png" /> Eliminar</button>
					</div>
			</div>
			<input type="hidden" id="idpersona" name="idpersona"  value=""/>
			</form>
		</td>
	</tr>
</table>
<script type="text/javascript" src="./jquery.js"></script>
<script type="text/javascript" src="./telefonos.js"></script>
<script type="text/javascript" src="./pluggins/responsive-tabs.js"></script>
<script>
$(document).ready(function() {
RESPONSIVEUI.responsiveTabs();
})
</script> 
</body>
</html>