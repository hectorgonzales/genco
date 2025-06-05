<?php echo '<?php'."\n";?>
require_once("class/Response.php");
require_once("class/<?=$objDatos->tbNombreCamello?>.php");
require_once("class/General.php");

$obj_response=new Response;
$obj_<?=$objDatos->tbNombreUnidoCorto?>=new <?=$objDatos->tbNombreCamello?>;
$obj_general=new General;
$tb="<?=$objDatos->tbNombreOriginal;?>";

$metodo=$_SERVER['REQUEST_METHOD'];
if($metodo=="GET"){

	if(isset($_GET['listar'])){
		$listar = $_GET['listar'];	
		$rs=$obj_general->listarRegistros($tb,$listar);
		header("Content-type: application/json");
		echo json_encode($rs);
		http_response_code(200);

	}elseif(isset($_GET['buscar'])){
		$buscar = $_GET['buscar'];	
		$rs=$obj_general->listarBuscar($tb,$buscar);
		header("Content-type: application/json");
		echo json_encode($rs);
		http_response_code(200);
		
	}elseif(isset($_GET['campo'])){
		$campo = $_GET['campo'];	
		$rs=$obj_general->valorCampo($tb,$campo);
		header("Content-type: application/json");
		echo json_encode($rs);
		http_response_code(200);
	/*
	}elseif(isset($_GET['existe_registro'])){
		$existe = $_GET['existe_registro'];	
		$rs=$obj_general->existenRegitros($tb,$existe);
		header("Content-type: application/json");
		echo json_encode($rs);
		http_response_code(200);*/   		
	/*
	}elseif(isset($_GET['pk'])){
		$pk=$_GET['pk'];
		$rs=$obj_general->obtenerRegistro($tb,$pk);
		header("Content-type: application/json");
		echo json_encode($rs);
		http_response_code(200);	
	}*/

	}elseif(isset($_GET['getRow'])){
		$params=$_GET['getRow'];
		$rs=$obj_general->obtenerRegistro($tb,$params);
		header("Content-type: application/json");
		echo json_encode($rs);
		http_response_code(200);	
	}
    
//---------------------------------------------------
}elseif($metodo=="POST"){
	$dataPost=file_get_contents("php://input");
	$dataArray=$obj_<?=$objDatos->tbNombreUnidoCorto?>->validaDataPost($dataPost);
	header('Content-type: application/json');
		if(isset($dataArray['result']['error_id'])){
			$responseCode=$dataArray['result']['error_id'];
			http_response_code($responseCode);
		}else{
			http_response_code(200);
		}
		echo json_encode($dataArray);
        
//---------------------------------------------------		
}elseif($metodo=="PUT"){

	$dataPut=file_get_contents("php://input");
	$a_dataPut=json_decode($dataPut,true);
	
	if(isset($a_dataPut['op'])){ 
		$dataArray=$obj_general->validaDataCamposPut($tb,$dataPut);
		header('Content-type: application/json');
		if(isset($dataArray['result']['error_id'])){
			$responseCode=$dataArray['result']['error_id'];
			http_response_code($responseCode);
		}else{
			http_response_code(200);
		}
		echo json_encode($dataArray);
		
	}else{
		$dataArray=$obj_<?=$objDatos->tbNombreUnidoCorto?>->validaDataPut($dataPut);
		header('Content-type: application/json');
		if(isset($dataArray['result']['error_id'])){
			$responseCode=$dataArray['result']['error_id'];
			http_response_code($responseCode);
		}else{
			http_response_code(200);
		}
		echo json_encode($dataArray);
	}


//---------------------------------------------------
}elseif($metodo=="DELETE"){ 
	$dataDelete=file_get_contents("php://input");
	$dataArray=$obj_general->validaDataDelete($tb,$dataDelete);
	header('Content-type: application/json');
		if(isset($dataArray['result']['error_id'])){
			$responseCode=$dataArray['result']['error_id'];
			http_response_code($responseCode);
		}else{
			http_response_code(200);
		}
		echo json_encode($dataArray);
        
}else{			
	header("Content-type: application/json");
	$dataArray=$response->error_405();
	echo json_encode($dataArray);
}

?>