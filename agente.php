<?php 
include "bd.php";

class agente{
	var $id;
	var $nombre;
	var $gerencia;
	var $sector;
	var $interno;
	var $directo;
	var $fax;
	var $celular;
	var $domiciliolaboral;
	var $observaciones;
	var $ordenPersona;
	var $sql				= "";
	var $bd;
	var $mensajeError		= "";

	function agente(){
		$this->bd				= new bd();
		$this->mensajeError		= "";
	}

	function setId($id){
		$this->id		= $id;
	}
	function setNombre($nombre){
		$this->nombre	= strtoupper($nombre);
	}
	
	function setGerencia($gerencia){
		$this->gerencia	= $gerencia;
	}
	
	function setSector($sector){
		$this->sector	= strtoupper($sector);
	}
	
	function setInterno($interno){
		$this->interno	= $interno;
	}
	
	function setDirecto($directo){
		$this->directo	= $directo;
	}
	
	function setFax($fax){
		$this->fax		= $fax;
	}
	
	function setCelular($celular){
		$this->celular	= $celular;
	}
	
	function setDomicilioLaboral($domicilio){
		$this->domiciliolaboral	= strtoupper($domicilio);
	}
	
	function setObservaciones($observaciones){
		$this->observaciones	= $observaciones;
	}
	
	function setOrdenPersona($orden){
		$this->ordenPersona		= $orden;
	}
	
	function altaA(){
		if (!$this->verificaExistencia()){
			$this->sql	= "INSERT INTO TELEFONOS.telefonos (nombre,idgerencia,sector,internos,directos,fax,celulares,domicilio,observaciones,ordengerencia) VALUES ";
			$this->sql	= $this->sql . "('".$this->nombre."','".$this->gerencia."','".$this->sector."','".$this->interno."','".$this->directo."',";
			$this->sql	= $this->sql . "'".$this->fax."','".$this->celular."','".$this->domiciliolaboral."','".$this->observaciones."','".$this->ordenPersona."')";
			
			//$this->bd new bd();
			
			$this->bd->conectar();
			$this->bd->consultar2($this->sql);
			$this->bd->cerrarConexion();
			
			return $this->bd->estado;
		}
		else {
			$this->mensajeError = "El nombre del agente ya existe";
			return false;
		}
	}

	function modificacionA(){
		if ($this->verificaExistencia()){		
			$this->sql = "UPDATE TELEFONOS.telefonos set ";
			$this->sql = $this->sql . "nombre = '" . $this->nombre . "', ";
			$this->sql = $this->sql . "idgerencia = '" . $this->gerencia . "', ";
			$this->sql = $this->sql . "sector = '" . $this->sector . "', ";
			$this->sql = $this->sql . "internos = '" . $this->interno . "', ";
			$this->sql = $this->sql . "directos = '" . $this->directo . "', ";
			$this->sql = $this->sql . "fax = '" . $this->fax . "', ";
			$this->sql = $this->sql . "celulares = '" . $this->celular . "', ";
			$this->sql = $this->sql . "domicilio = '" . $this->domiciliolaboral . "', ";
			$this->sql = $this->sql . "observaciones = '" . $this->observaciones . "', ";
			$this->sql = $this->sql . "ordengerencia = '" . $this->ordenPersona . "' ";
			$this->sql = $this->sql . "WHERE id = " . $this->id;
			
			$this->bd->conectar();
			$this->bd->consultar2($this->sql);
			$this->bd->cerrarConexion();
			
			return $this->bd->estado;
		}
		else {
			$this->mensajeError = "Hubo un problema al seleccionar el nombre";
			return false;
		}
	}

	function bajaA(){
		if ($this->verificaExistencia()){
			$this->sql = "DELETE FROM TELEFONOS.telefonos where id ='" . $this->id ."'";

			$this->bd->conectar();
			$this->bd->consultar2($this->sql);
			$this->bd->cerrarConexion();
			
			return $this->bd->estado;
		}
		else {
			$this->mensajeError = "Hubo un problema al seleccionar el nombre";
		}
	}
	
	function verificaExistencia(){
		$query = "SELECT * FROM TELEFONOS.telefonos WHERE id = ";
		$query = $query . "'" . $this->id . "'";
	
		$this->bd->conectar();
		$this->bd->consultar($query);
	
		if ($this->bd->cantidad == 0) return false; else return true;
	
		$this->bd->cerrarConexion();
	}
}
?>