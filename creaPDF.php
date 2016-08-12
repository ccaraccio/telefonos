<?php 
require "pluggins/pdf/fpdf.php";
include "bd.php";

$gerencia = $_REQUEST['gerencia'];
$nombre = utf8_decode($_REQUEST['nombre']);

class PDF extends FPDF
{
	var $anchoFax = 0;
	var $anchoDirecto = 0;
	
	function generaAnchos($gerencia){
		$datos = $this->buscaDatos($gerencia);
		while ($persona = mysql_fetch_assoc($datos)){
			if (strlen($persona['fax']) >= strlen($this->anchoFax)){ $this->anchoFax = $persona['fax']; }
			if (strlen($persona['directos']) >= strlen($this->anchoDirecto)){ $this->anchoDirecto = $persona['directos']; }
		}
		if (strlen($this->anchoFax) < 10){ $this->anchoFax = 0; } else{ $this->anchoFax = 20; }
		if (strlen($this->anchoDirecto) < 10){ $this->anchoDirecto = 0; } else{ $this->anchoDirecto = 20; }
	}
	
	function genera($gerencia,$nombre){
		$this->generaAnchos($gerencia);
		$this->AddPage();
		$this->AddFont('ArialBlack','','arialblack.php');
		$this->SetFont('ArialBlack','',26);
		$this->SetFillColor(7,77,162);
		$this->SetTextColor(255,255,255);
		$this->Cell(210 + $this->anchoFax + $this->anchoDirecto,30,strtoupper($nombre),1,1,'C',true);
		$datos = $this->buscaDatos($gerencia);
		$domicilioAnterior = " ";
		$sectorAnterior = "";
		$directoAnterior = "";
		$this->SetFillColor(204,204,204);
		$this->SetTextColor(0,0,0);
		while ($persona[] = mysql_fetch_assoc($datos));
		array_pop($persona); // Borra ultimo registro vacio
		$countArray = count($persona);
		for ($i=0; $i < $countArray; $i++) {
			if ($domicilioAnterior !== $persona[$i]['domicilio']){
				$this->SetFillColor(50,52,135);
				$this->Cell(210 + $this->anchoFax + $this->anchoDirecto,6,"",1,1,'C',true);
				$this->SetFillColor(204,204,204);
				$this->SetFont('Arial','B',12);
				$this->Cell(135, 6,"Direccion: " . utf8_decode($persona[$i]['domicilio']),1,0,'C',true);
				$this->Cell(25, 6,"Interno",1,0,'C',true);
				$this->Cell(25 + $this->anchoFax, 6,"Fax",1,0,'C',true);
				$this->Cell(25 + $this->anchoDirecto, 6,"Directo",1,1,'C',true);
				$domicilioAnterior = $persona[$i]['domicilio'];
			}
			if ($sectorAnterior !== $persona[$i]['sector']) {
				$this->SetFont('Arial','B',12);
				$this->SetFillColor(204,204,204);
				$this->Cell(135,6,utf8_decode($persona[$i]['sector']),1,0,'C',true);
				$this->Cell(75 + $this->anchoFax + $this->anchoDirecto, 6, "", 1, 1, 'C', true);
				$sectorAnterior = $persona[$i]['sector'];
				$this->SetFont('Arial','',12);
				$this->SetFillColor(255,255,255);
				$this->Cell(135, 6,strtoupper(utf8_decode($persona[$i]['nombre'])),1,0,'L',true);
				$this->Cell(25, 6,$persona[$i]['internos'],1,0,'C',true);
				$this->Cell(25 + $this->anchoFax, 6,$persona[$i]['fax'],1,0,'C',true);
				$anteriorY = $this->GetY();
				$this->MultiCell(25 + $this->anchoDirecto,6 * $this->sacaCuentaYDivision($persona, $i),$persona[$i]['directos'],1,'C',true);
				$directoAnterior = $persona[$i]['directos'];
			}
			else{
				if ($directoAnterior == $persona[$i]['directos'] && $directoAnterior !== ""){
					$this->setY($anteriorY + 6);
					$anteriorY = $this->GetY();
					$this->Cell(135, 6,strtoupper(utf8_decode($persona[$i]['nombre'])),1,0,'L',true);
					$this->Cell(25, 6,$persona[$i]['internos'],1,0,'C',true);
					$this->Cell(25 + $this->anchoFax, 6,$persona[$i]['fax'],1,1,'C',true);
				}
				else{
					$this->Cell(135, 6, strtoupper(utf8_decode($persona[$i]['nombre'])),1,0,'L',true);
					$this->Cell(25, 6, $persona[$i]['internos'],1,0,'C',true);
					$this->Cell(25 + $this->anchoFax, 6,$persona[$i]['fax'],1,0,'C',true);
					$anteriorY = $this->GetY();
					$this->MultiCell(25 + $this->anchoDirecto, 6 * $this->sacaCuentaYDivision($persona, $i),$persona[$i]['directos'],1,'C',true);
					$directoAnterior = $persona[$i]['directos'];
				}
			}
		}
	}
	function cuentaNumeros($tipo,$persona,$clave){
		$i = 1;
		while (($clave + $i) < count($persona) && 
				$persona[$clave][$tipo] !== "" && 
				$persona[$clave][$tipo] == $persona[$clave + $i][$tipo] && 
				$persona[$clave]['sector'] == $persona[$clave + $i]['sector'])
					{ $i++; }
		return ($i);
	}
	function sacaDivision($persona,$clave){
		if (strlen($persona[$clave]['directos']) > 0){ $altoFila = round(strlen($persona[$clave]['directos'])/19); }
		else { $altoFila = 1; }
		return ($altoFila);
	}
	function sacaCuentaYDivision($persona,$clave){
		if ($this->sacaDivision($persona,$clave) == 1 
			|| $this->cuentaNumeros('directos',$persona,$clave) > $this->sacaDivision($persona,$clave))
			return $this->cuentaNumeros('directos',$persona,$clave);
		else
			return 1;
	}

	function buscaDatos($gerencia){
		$query = "SELECT tel.id, tel.nombre, ger.nombre gerencia, tel.sector, tel.internos, tel.directos, tel.fax, ";
		$query.= "tel.celulares, tel.domicilio, tel.observaciones, tel.ordengerencia, ger.idgerencia ";
		$query.= "FROM TELEFONOS.telefonos tel INNER JOIN TELEFONOS.gerencias ger ";
		$query.= "ON tel.idgerencia = ger.idgerencia WHERE ger.idgerencia = '" . $gerencia . "' ";
		$query.= "ORDER BY ordengerencia, domicilio, sector, directos, internos, nombre";
		$base = new bd($query);
		
		return $base->datos;
	}
}

function sacaDivision($persona,$clave){
	if (strlen($persona[$clave]['directos']) > 0){ $altoFila = round(strlen($persona[$clave]['directos'])/19); }
	else{ $altoFila = 1; }
	return ($altoFila);
}

function verificaUnicidadSector($persona){
	$query = "SELECT tel.idgerencia, tel.nombre, tel.sector, ger.idgerencia FROM TELEFONOS.telefonos tel ";
	$query.= "INNER JOIN TELEFONOS.gerencias ger ON tel.idgerencia = ger.idgerencia";
	$query.= " WHERE ger.idgerencia = '" . $persona['idgerencia'] . "' and sector = '" . $persona['sector'] . "'";
	$base = new bd($query);
	
	if ($base->cantidad == 1) return true;
	else return false;
}

function cuentaNroDeMas($gerencia){
	$query = "SELECT tel.id, tel.sector, tel.internos, tel.directos, tel.domicilio, tel.ordengerencia, ger.idgerencia ";
	$query.= "FROM TELEFONOS.telefonos tel INNER JOIN TELEFONOS.gerencias ger ON tel.idgerencia = ger.idgerencia ";
	$query.= "WHERE ger.idgerencia = '" . $gerencia . "' ORDER BY ordengerencia, domicilio, sector, internos";
	$base = new bd($query);
	
	while ($persona[] = mysql_fetch_assoc($base->datos));
	array_pop($persona); // Borra ultimo registro vacio
	$contador = 0;
	for ($i=0; $i < count($persona); $i++) {
		if ( ($i + 1) < count($persona) && sacaDivision($persona, $i) > 1 && verificaUnicidadSector($persona[$i]) 
				|| ($i == (count($persona) - 1) && sacaDivision($persona, $i) > 1 && verificaUnicidadSector($persona[$i])) )
			$contador++;
	}
	return $contador;
}

function cuentaX($gerencia,$X){
	$query = "SELECT DISTINCT(". $X .") FROM TELEFONOS.telefonos tel INNER JOIN TELEFONOS.gerencias ger ";
	$query.= "ON tel.idgerencia = ger.idgerencia WHERE ger.idgerencia = '" . $gerencia . "'";
	$base = new bd($query);
	
	return $base->cantidad;
}

function calculaAlto($gerencia){	
	$cantidadPersonas = cuentaX($gerencia,'tel.nombre');
	$cantidadSectores = cuentaX($gerencia,'sector');
	$cantidadDomicilios = cuentaX($gerencia,'domicilio');
	$cantidadSeparadoresDom = cuentaX($gerencia,'domicilio') - 1;
	$cantidadNroDeMas = cuentaNroDeMas($gerencia);

	return (36 + ($cantidadPersonas + $cantidadSectores + $cantidadDomicilios + $cantidadSeparadoresDom + $cantidadNroDeMas) * 6);

}

function calculaAncho($gerencia){
	$nombreEInterno = 210;

	$query = "SELECT tel.id, tel.nombre, ger.nombre gerencia, tel.sector, tel.internos, tel.directos, tel.fax, ";
	$query.= "tel.celulares, tel.domicilio, tel.observaciones, tel.ordengerencia, ger.idgerencia ";
	$query.= "FROM TELEFONOS.telefonos tel INNER JOIN TELEFONOS.gerencias ger ON tel.idgerencia = ger.idgerencia ";
	$query.= "WHERE ger.idgerencia = '" . $gerencia . "' ORDER BY ordengerencia, domicilio, sector, internos";
	
	$base = new bd($query);
	$datos = $base->datos;
	
	$fax = 0;
	$directo = 0;
	while ($persona = mysql_fetch_assoc($datos)){
		if (strlen($persona['fax']) > strlen($fax)){ $fax = $persona['fax']; }
		if (strlen($persona['directos']) > strlen($directo)){ $directo = $persona['directos']; }
	}
	if (strlen($fax) < 10){ $anchoFax = 0; }
	else{ $anchoFax = 20; }
	if (strlen($directo) < 10){ $anchoDirecto = 0; }
	else{ $anchoDirecto = 20; }
	
	return $nombreEInterno + $anchoFax + $anchoDirecto;
}

$pdf=new PDF('P','mm',array(calculaAncho($gerencia), calculaAlto($gerencia)));
$pdf->SetTitle($nombre);
$pdf->SetTopMargin(0);
$pdf->SetLeftMargin(0);
$pdf->SetRightMargin(0);
$pdf->SetAutoPageBreak(0);
$pdf->genera($gerencia,$nombre);

$pdf->Output();

?>