<?php

include_once 'bd.php';

abstract class busquedas {
	var $bd;
	var $query;
	var $datos;

	function busquedas(){
		$this->bd = new bd();
	}

	abstract protected function armarTabla($datos);
}

class buscarPersona extends busquedas {
	function buscarPersona(){
		$this->query = "SELECT tel.id, tel.nombre, ger.nombre gerencia, tel.sector, ";
		$this->query.= "tel.internos, tel.directos, tel.fax, tel.celulares, tel.domicilio, tel.observaciones, ger.idgerencia, tel.ordengerencia ";
		$this->query.= "FROM TELEFONOS.telefonos tel inner join TELEFONOS.gerencias ger on tel.idgerencia = ger.idgerencia";
		parent::busquedas();
	}

	function traerResultados($unParam){
		$resultado = "No se han encontrado registros";
		
		$this->query.=	" WHERE tel.nombre like '%" . strtoupper($unParam) . "%' ";
		$this->query.=	"OR ger.nombre like '%" . strtoupper($unParam) . "%' ";
		$this->query.=	"OR tel.sector like '%" . strtoupper($unParam) . "%' ";
		$this->query.=	"order by gerencia, sector, nombre limit 50";
			
		$this->bd->conectar();
		$this->bd->consultar($this->query);
		$this->bd->cerrarConexion();
		
		if ($this->bd->cantidad > 0){ $resultado = $this->armarTabla($this->bd->datos); }

		return $resultado;
	}
	
	function traerResultados2($unParam){
		$resultado = "No se han encontrado registros";
	
		$this->query.=	" WHERE tel.nombre like '%" . strtoupper($unParam) . "%' ";
		$this->query.=	"OR ger.nombre like '%" . strtoupper($unParam) . "%' ";
		$this->query.=	"OR tel.sector like '%" . strtoupper($unParam) . "%' ";
		$this->query.=	"order by gerencia, sector, nombre limit 50";
			
		$this->bd->conectar();
		$this->bd->consultar($this->query);
		$this->bd->cerrarConexion();
	
		if ($this->bd->cantidad > 0){ $resultado = $this->armarTabla2($this->bd->datos); }
	
		return $resultado;
	}

	protected function armarTabla($datos){
		$resultado = '<table id="personas" cellspacing="0" border="1" style="width:100%">
			<tr class="cabeceraTabla" align="center">
				<td>Nombre</td>
				<td>Gerencia</td>
				<td>Sector</td>
				<td>Seleccion</td>
			</tr>';

		while ($persona = mysql_fetch_assoc($datos)){
			$resultado .= '<tr style="font-size: 13px;">';
			$resultado .= "<td>" . $persona['nombre'] . "</td>";
			$resultado .= "<td>" . $persona['gerencia'] . "</td>";
			$resultado .= "<td>" . $persona['sector'] . "</td>";
			$resultado .= '<td align="center" class="botonSeleccion"><a href="#">';
			$resultado .= '<img src="imagenes/edit.gif" class="botonSeleccion" value="seleccionar" onclick="seleccionarPersona';
			$resultado .= '(\'' . $persona['id'] . '\',\'' . $persona['nombre'] . '\',\'' . $persona['idgerencia'] . '\',\'' . $persona['sector'] . '\',';
			$resultado .= '\'' . $persona['internos'] . '\',\'' . $persona['directos'] . '\',\'' . $persona['fax'] . '\',\'' . $persona['celulares'] . '\',';
			$resultado .= '\'' . $persona['domicilio'] . '\',\'' . $persona['observaciones'] . '\',\'' . $persona['ordengerencia'] . '\')" /></a></td>';
			$resultado .= "</tr>";
		}

		return $resultado .= '</table>';
	}
	
	protected function armarTabla2($datos){
		$resultado = '<table id="personas" cellspacing="0" border="1" style="width:100%">
			<tr class="cabeceraTabla" align="center">
				<td>Nombre</td>
				<td>Gerencia</td>
				<td>Sector</td>
				<td>Interno</td>
				<td>Directo</td>
				<td>Fax</td>
				<td>Celular</td>
				<td>Domicilio Laboral</td>
				<td>Observaciones</td>
			</tr>';
	
		while ($persona = mysql_fetch_assoc($datos)){
			$resultado .= '<tr style="font-size: 13px;">';
			$resultado .= "<td>" . $persona['nombre'] . "</td>";
			$resultado .= "<td>" . $persona['gerencia'] . "</td>";
			$resultado .= "<td>" . $persona['sector'] . "</td>";
			$resultado .= "<td>" . $persona['internos'] . "</td>";
			$resultado .= "<td>" . $persona['directos'] . "</td>";
			$resultado .= "<td>" . $persona['fax'] . "</td>";
			$resultado .= "<td>" . $persona['celulares'] . "</td>";
			$resultado .= "<td>" . $persona['domicilio'] . "</td>";
			$resultado .= "<td>" . $persona['observaciones'] . "</td>";
			$resultado .= "</tr>";
		}
	
		return $resultado .= '</table>';
	}

}
?>