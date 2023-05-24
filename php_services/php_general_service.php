<?php echo '<?php'."\n";?>
include_once("Conexion.php");
include_once("Response.php");

class General extends Conexion{
	private $token="";
//-----------------GET----------------------------------------------------
  
public function obtenerRegistro($tb,$pk){
	$sql="select * from ".$tb." where pk_".$tb."='$pk'";
	return parent::getData($sql);
}    
//--------------------------------------------------------------------	
public function existenRegitros($tb,$params){
	$a_params=json_decode($params,true);

	$cond=(isset($a_params['cond']))?$a_params['cond']:"0";
	$cond_string=(isset($a_params['cond_string']))?$a_params['cond_string']:"";
	
	if($cond=="0"){
		$sql="select * from ".$tb." limit 1";
	}else{
		$sql="select * from ".$tb." where ".$cond_string." limit 1";
	}
	$rs=parent::getData($sql);
	$tr=count($rs);
	
	$existe=false;
	if ($tr>0){
		$existe=true;
	}
	return $existe;
		
}    
//--------------------------------------------------------------------

public function listarRegistros($tb,$listar){
		$a_listar=json_decode($listar,true);
				
		$relation=(isset($a_listar['relation']))?" ".$a_listar['relation']:"";
		$campo_order=(isset($a_listar['campo_order']))?$a_listar['campo_order']:"";
		$order=(isset($a_listar['order']))?$a_listar['order']:"asc";
		$cond=(isset($a_listar['cond']))?$a_listar['cond']:"0";
		$cond_string=(isset($a_listar['cond_string']))?$a_listar['cond_string']:"";
		$campos=(isset($a_listar['campos']))?$a_listar['campos']:"*";
		$pagina=(isset($a_listar['pagina']))?$a_listar['pagina']:"";
		
		
		if($cond=="0"){
			$sql="select ".$campos." from ".$tb.$relation." ORDER BY ".$campo_order." ".$order;
		}elseif($cond=="1"){
			$sql="select ".$campos." from ".$tb.$relation." WHERE ".$cond_string." ORDER BY ".$campo_order." ".$order;
		
		}elseif($cond=="2"){
			$inicio=0;
			$cantidad=100;
			if($pagina>1){
				$inicio=($cantidad*($pagina-1))+1;
				$cantidad=$cantidad*$pagina;
			}
			$sql="select ".$campos." from ".$tb.$relation." ORDER BY ".$campo_order." ".$order." LIMIT $inicio,$cantidad";
			
		}elseif($cond=="3"){
			$inicio=0;
			$cantidad=100;
			if($pagina>1){
				$inicio=($cantidad*($pagina-1))+1;
				$cantidad=$cantidad*$pagina;
			}
			$sql="select ".$campos." from ".$tb.$relation." WHERE ".$cond_string." ORDER BY ".$campo_order." ".$order." LIMIT $inicio,$cantidad";
		
		}
		$rs=parent::getData($sql);
		return $rs;
	}
	
	
//--------------------------------------------------------------------	
	public function listarBuscar($tb,$buscar){ 
		$a_buscar=json_decode($buscar,true);
		
		$relation=(isset($a_buscar['relation']))?" ".$a_buscar['relation']:"";	
		$campo_buscar=(isset($a_buscar['campo_buscar']))?$a_buscar['campo_buscar']:"";
		$txt=(isset($a_buscar['txt']))?$a_buscar['txt']:"";
		$cond=(isset($a_buscar['cond']))?$a_buscar['cond']:"0";
		$cond_string=(isset($a_buscar['cond_string']))?$a_buscar['cond_string']:"";
		$campos=(isset($a_buscar['campos']))?$a_buscar['campos']:"*";
		$pagina=(isset($a_buscar['pagina']))?$a_buscar['pagina']:"";
		
		
		if($cond=="0"){
			$sql="select ".$campos." from ".$tb.$relation." where ".$campo_buscar." like '%$txt%'";
		}elseif($cond=="1"){
			$sql="select ".$campos." from ".$tb.$relation." where ".$campo_buscar." like '%$txt%' ".$cond_string;
		
		}elseif($cond=="2"){
			$inicio=0;
			$cantidad=100;
			if($pagina>1){
				$inicio=($cantidad*($pagina-1))+1;
				$cantidad=$cantidad*$pagina;
			}
			$sql="select ".$campos." from ".$tb.$relation." where ".$campo_buscar." like '%$txt%'"." LIMIT $inicio,$cantidad";
			
		}elseif($cond=="3"){
			$inicio=0;
			$cantidad=100;
			if($pagina>1){
				$inicio=($cantidad*($pagina-1))+1;
				$cantidad=$cantidad*$pagina;
			}
			$sql="select ".$campos." from ".$tb.$relation." where ".$campo_buscar." like '%$txt%' ".$cond_string." LIMIT $inicio,$cantidad";
		
		}
		$rs=parent::getData($sql);
		return $rs;
	}

	public function valorCampo($tb,$campo){
		$a_campo=json_decode($campo,true);
				
		$campoReturn=(isset($a_campo['campo']))?$a_campo['campo']:"";
		$cond_string=(isset($a_campo['cond_string']))?$a_campo['cond_string']:"";		
		
		$sql="SELECT ".$campoReturn." FROM  ".$tb."  WHERE ".$cond_string;
		
		$rs=parent::getData($sql);
		return $rs;
	}
	
//------------UPDATE CAMPOS--------------------------------------------------

public function validaDataCamposPut($tb,$json){
    $response= new Response;
    $datosPost=json_decode($json,true);
    if(!isset($datosPost['token'])){
        return $response->error_401();
    }else{
        $this->token=$datosPost['token'];
        $arrayToken=parent::validaToken($this->token);
        if($arrayToken){
            //------------------------
            if(!isset($datosPost['cond_string'])){
                return $response->error_400();
            }else{				
				$rowsUpdate=$this->modificarCampos($tb,$json);
                if($rowsUpdate){
                    $rs=$response->response;
                    $rs['result']=array(
                                "Actualizados"=> $rowsUpdate);
                    return $rs;
                }else{
                    return $response->error_500();
                }
            }					
            //------------------------
        }else{
            return $response->error_401("El token es invalido o ha caducado.");

        }
    }
}


private function modificarCampos($tb,$json){
	$a_dataPut=json_decode($json,true);
	
	$campos_y_valores="";
	foreach($a_dataPut['datos'] as $campo => $valor){
     $campos_y_valores.="$campo='$valor',";
	}
	$campos_y_valores=substr($campos_y_valores,0,-1);

	if(isset($a_dataPut['cond_string'])){
		$cond_string=$a_dataPut['cond_string'];
		$sql="UPDATE ".$tb." SET ".$campos_y_valores." where ".$cond_string;
		
	}else{
		$sql="UPDATE ".$tb." SET ".$campos_y_valores;		
	}
		
    $rowsUpdate=parent::nonQuery($sql);
    if($rowsUpdate>=1){
        return $rowsUpdate;
    }else{
        return 0;
    }
  
}	

//----------DELETE---------------------------------------------------

	public function validaDataDelete($tb,$json){
		$response= new Response;
		$datosPost=json_decode($json,true);
		if(!isset($datosPost['token'])){
			return $response->error_401();
		}else{
			$this->token=$datosPost['token'];
			$arrayToken=parent::validaToken($this->token);
			if($arrayToken){
				//-----------------
				if(!isset($datosPost['campo']) || !isset($datosPost['valor'])){
					return $response->error_400();
				}else{
					$rowsDelete=$this->eliminarRegistro($tb,$json);
					if($rowsDelete){
						$rs=$response->response;
						$rs['result']=array(
									"Eliminados"=> $rowsDelete);
						return $rs;
					}else{
						return $response->error_500();
					}
				}	
				//-----------------
			}else{
				return $response->error_401("El token es invalido o ha caducado.");
	
			}
		}	
	}


	public function eliminarRegistro($tb,$params){
		$a_params=json_decode($params,true);
				
		$campo=(isset($a_params['campo']))?$a_params['campo']:"";
		$valor=(isset($a_params['valor']))?$a_params['valor']:"";
		$cond=(isset($a_params['cond']))?$a_params['cond']:"0";
		$cond_string=(isset($a_params['cond_string']))?$a_params['cond_string']:"";
				
		
		if($cond=="0"){
			$sql="delete from ".$tb." WHERE ".$campo."='$valor'";
		}else{
			$sql="delete from ".$tb." WHERE ".$cond_string;
		}
		
		$rowsDelete=parent::nonQuery($sql);
		if($rowsDelete>=1){
		  return $rowsDelete;
		}else{
		  return 0;
		}
	}

} //end class
?>