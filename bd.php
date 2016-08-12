<?php
// Base MySQL
include_once 'bdConfig.php';

class bd {
	//Propiedades
	var $servidor  ;
	var $usuario ;
	var $clave ;
	var $base ;	
	var $conexion;
	var $sql;
	var $datos;	
	var $ultimoId;
	var $estado = true;
	var $cantidad;	
	var $mensaje;
	
	//Constructor
	function bd($sql = ''){
		$bdConfig = new bdConfig(); 
		$this->servidor		= $bdConfig->servidor ;
		$this->usuario		= $bdConfig->usuario ;
		$this->clave		= $bdConfig->clave ;
		$this->base			= $bdConfig->base ;
		$this->sql			= $sql;
		if ($sql != '') {
			$this->conectar();
			$this->consultar($this->sql);
			$this->cerrarConexion();
		}
	}

//Metodos ---------------------------------------------------------------
	function conectar(){
		$this->conexion = mysql_connect( $this->servidor, $this->usuario, $this->clave ) ;
		mysql_set_charset('utf8');
		mysql_select_db( $this->base, $this->conexion ) or die( mysql_error( )) ;
		return $this->conexion;			
	}
	//-----------------------------------------------------------------------
	function consultar($sql){
		//asigno variables 
		$this->sql = $sql;		
		
		// si existe la conexion y $sql no esta vacio, ejecuta la consulta
		if( $this->conexion && $this->sql != '' ) {
			$this->datos = mysql_query( $this->sql, $this->conexion ) ;
			
			// si hay un objeto de resultado valido
			if( $this->datos ){						
					$this->cantidad		= mysql_affected_rows( ) ;
					$this->ultimoId		= mysql_insert_id( ) ; 
					$this->estado		= true ;			
					$this->mensaje		= "Ok";
			// si no hay un objeto de resultado valido
			} else {				
				$this->cantidad		= 0;
				$this->estado		= false;
				$this->mensaje		= "Error en la consulta SQL";
			}			
		// sino no ejecuta la consulta
		}else{
			$this->estado		= false ;	
			if (!$this->conexion){
				$this->mensaje		= "Error, no se realizó la conexión a la base de datos";
			}else{
				$this->mensaje		= "Error, la consulta no puede estar vacía";				
			}			
		}		
	}
	//-----------------------------------------------------------------------
	function consultar2($sql){
		// asigno variables **Solo para Inserts o Deletes
		$this->sql = $sql;
		// si existe la conexion y $sql no esta vacio, ejecuta la consulta
		if( $this->conexion && $this->sql != '' ) {
			$this->datos = mysql_query( $this->sql, $this->conexion ) ;
			// si hay un objeto de resultado valido
			if( $this->datos ){
				$this->cantidad		= 1;
				$this->estado		= true ;
				$this->mensaje		= "Ok";
				// si no hay un objeto de resultado valido
			} else {
				$this->cantidad		= 0;
				$this->estado		= false;
				$this->mensaje		= "Error en la consulta SQL";
			}
			// sino no ejecuta la consulta
		}else{
			$this->estado		= false ;
			if (!$this->conexion){
				$this->mensaje		= "Error, no se realizó la conexión a la base de datos";
			}else{
				$this->mensaje		= "Error, la consulta no puede estar vacía";
			}
		}
	}
	//-----------------------------------------------------------------------	
	function cerrarConexion( ) {
		if( $this->conexion ) {
			mysql_close( $this->conexion ) ;
		}
	}
}



?>