<?php
$codigoRespuesta = -1;
if(!isset($_POST["paramCantidad"])){
	$codigoRespuesta = 1;
	echo $codigoRespuesta;
}else{
	if(!isset($_POST["paramUnidadOrigen"]) || $_POST["paramUnidadOrigen"] == ""){
		$codigoRespuesta = 2;
		echo $codigoRespuesta;
	}else{
		if(!isset($_POST["paramUnidadDestino"]) || $_POST["paramUnidadDestino"] == ""){
			$codigoRespuesta = 3;
			echo $codigoRespuesta;
		}else{
			//$LengthValue = $_POST["paramCantidad"];			
			$CookingValue = $_POST["paramCantidad"];			
			//$fromLengthUnit = $_POST["paramUnidadOrigen"];
			$fromCookingUnit = $_POST["paramUnidadOrigen"];
			//$toLengthUnit = $_POST["paramUnidadDestino"];
			$toCookingUnit = $_POST["paramUnidadDestino"];
			
			//invoco al webservice
			try {
				$client = new SoapClient("http://www.webservicex.net/ConvertCooking.asmx?WSDL");
				$resultadoLlamadoWS = $client->ChangeCookingUnit(array('CookingValue' => $CookingValue,				
																	'fromCookingUnit'=>$fromCookingUnit,
																	'toCookingUnit'=>$toCookingUnit));
				echo $resultadoLlamadoWS->ChangeCookingUnitResult;
			} catch (SoapFault $fault) {
				$codigoRespuesta = 4;
				echo $codigoRespuesta;
				//trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
			}
																	
			
		}
	}
}
 
?>