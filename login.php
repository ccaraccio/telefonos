<?php
session_start();

if (!isset($_SESSION['id']))
{
	if (!isset($_POST['user']))
	{
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="Shortcut Icon" HREF="imagenes/AGP.JPG"> 
<title>&Iacute;ndice Telef&oacute;nico</title>
<LINK href="EstilosTelefonico.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<table class="TablaPrincipal">
	<tr>
		<td align="center"><a href="./index.php"><img src="imagenes/logo.png"></a><hr/></td>
	</tr>
	<tr>
		<td align="center">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<table class="TablaSecundaria">
					<tr>
						<td colspan="2" align="center"><strong>Inicio de Sesi&oacute;n</strong></td>
					</tr>
					<tr>
						<td align="right"><strong>Usuario</strong></td>
						<td><input type="text" name="user" id="user" /></td>
					</tr>
					<tr>
						<td align="right"><strong>Contrase&ntilde;a</strong></td>
						<td><input type="password" name="pass" id="pass" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="enviar" id="enviar" value="Ingresar" /></td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
	<tr>
		<td class="Estilo2"><hr/>Sistemas - Depto Desarrollo</td>
	</tr>
	<tr>
		<td class="Estilo2">Administracion General de Puertos S.E. - AGP <img src="imagenes/AGP.JPG" width="20" height="23" /></td>
	</tr>
</table>
</body>
</html>
<?php
		exit;
	}
	else
	{
		// Conectar con LDAP SERVER
		$ldapconn = ldap_connect('10.10.0.155',389) or die("Could not connect to LDAP server.");
		ldap_set_option($ldapconn,LDAP_OPT_PROTOCOL_VERSION,3) or die("Could not set ldap protocol version");
		$credencial = $_POST['user'] . '@agp.gob.ar';
		if(ldap_bind($ldapconn,$credencial ,$_POST['pass'])==false || $_POST['user'] == "" || $_POST['pass'] == "")
		{
			header("Location: error.php?result=1");
			exit;
		}
		$_SESSION['id']=$_POST['user'];
		$_SESSION['password']=$_POST['pass'];
	}
}
?>
