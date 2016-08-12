<?php
include "bd.php";

class validaUsuario{
	public $bd;
	public $sql;
	
	function validaUsuario($usuario){
		$this->sql		= "SELECT * FROM TELEFONOS.seguridadusuarios where usuario = '" . $usuario . "'";
		$this->bd		= new bd($this->sql);
		if ($this->bd->cantidad > 0){ return true; } else { header("Location: error.php?result=3"); exit; }
	}	
}

class gerencias{
	public $bd;
	public $sql = "SELECT * FROM TELEFONOS.gerencias";
	private $lista;
	private $listaGerencias;
	private $combo = "";
	
	function gerencias(){
		$this->bd		= new bd($this->sql);		
		if ($this->bd->cantidad > 0) {
			$i = 0;
			while ($this->lista = mysql_fetch_assoc($this->bd->datos)){
				$this->listaGerencias[$i]['id']		= $this->lista['idgerencia'];
				$this->listaGerencias[$i]['nombre']	= $this->lista['nombre'];
				$i++;
			}
			return $this->listaGerencias;
		} 
		else{ header("Location: error.php?result=3"); exit; }
	}
	
	function generaCombo(){
		for( $i=0; $i < count($this->listaGerencias); $i++ ){ 
			$this->combo.= "<option value='" . $this->listaGerencias[$i]['id'] . "'>";
			$this->combo.= $this->listaGerencias[$i]['nombre'] . "</option>";
		}
		return $this->combo;
	}
}

class ordenGerencias{
	var $bd;
	var $sql;
	var $lista;
	var $lista2;
	var $tabla;
	
	function generaLista($gerencia,$nombre,$sector,$orden){
		$this->sql = "SELECT tel.id, tel.nombre, tel.sector, tel.ordengerencia, ger.idgerencia ";
		$this->sql = $this->sql . "FROM TELEFONOS.telefonos tel INNER JOIN TELEFONOS.gerencias ger ";
		$this->sql = $this->sql . "ON tel.idgerencia = ger.idgerencia WHERE ger.idgerencia = '" . $gerencia . "' ";
		$this->sql = $this->sql . "ORDER BY ordengerencia, domicilio, sector, directos, ";
		$this->sql = $this->sql . "internos, nombre";
		$this->bd		= new bd($this->sql);
		
		$this->tabla = "<table id='gerencias' cellspacing='0' border='1' style='width:100%'><tr class='cabeceraTabla'";
		$this->tabla = $this->tabla . " align='center'><td>Orden</td><td>Nombre</td><td>Sector</td></tr>";
		while ($this->lista2[] = mysql_fetch_assoc($this->bd->datos));
		array_pop($this->lista2);
		$listaAux['ordengerencia'] = $orden;
		$listaAux['nombre'] = $nombre;
		$listaAux['sector'] = $sector;
		array_push($this->lista2, $listaAux);
		
		foreach ($this->lista2 as $key => $row) {
			$lorden[$key]  = $row['ordengerencia'];
			$lnombre[$key] = $row['nombre'];
			$lsector[$key] = $row['sector'];
		}
		array_multisort($lorden, SORT_ASC, $lsector, SORT_STRING, $lnombre, SORT_STRING, $this->lista2);

		foreach ($this->lista2 as $valor){
			$this->tabla = $this->tabla . '<tr style="font-size: 13px;"><td>' . $valor['ordengerencia'] . '</td>';
			$this->tabla = $this->tabla . '<td>' . $valor['nombre'] . '</td>';
			$this->tabla = $this->tabla . '<td>' . $valor['sector'] . '</td></tr>';
		}

		$this->tabla = $this->tabla . '</table>';
		return $this->tabla;
	}
}
?>