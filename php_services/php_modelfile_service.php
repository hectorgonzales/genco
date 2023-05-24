<?php echo '<?php'."\n";?>//EDITADO - UPDATE MANUAL
include_once("Conexion.php");
include_once("Response.php");

class IncidenteArchivo extends Conexion{
private $pk_incidente_archivo;
private $fk_incidente;
private $inar_archivo;
private $inar_descripcion;
//-----------------------------
private $token="";
private $tb="incidente_archivo";
private $tb_pk="pk_incidente_archivo";

//--------------insert-------------------------------------------
public function validaDataPost($json){
    $response= new Response;
    $datosPost=json_decode($json,true);
    
    if(!isset($datosPost['token'])){
        return $response->error_401();
    }else{
        $this->token=$datosPost['token'];
        $arrayToken=parent::validaToken($this->token);
        if($arrayToken){
            //---------------
            if(!isset($datosPost['fk_incidente'])){
                return $response->error_400();
            }else{
                $this->fk_incidente=$datosPost['fk_incidente'];
                if(isset($datosPost['fk_incidente'])){$this->fk_incidente=$datosPost['fk_incidente'];}
				if(isset($datosPost['inar_archivo'])){$this->inar_archivo=$datosPost['inar_archivo'];}
				
				if(isset($datosPost['inar_archivo'])){
					$url=$this->procesarImagen($datosPost['inar_archivo']);
					$this->inar_archivo=$url;
				}else{
					$this->inar_archivo="";
				}
				
				if(isset($datosPost['inar_descripcion'])){$this->inar_descripcion=$datosPost['inar_descripcion'];}
				$pkInsert=$this->insertarIncidenteArchivo();
                if($pkInsert){
                    $rs=$response->response;
                    $rs['result']=array(
                                "pk_incidente_archivo"=> $pkInsert
                                );
                    return $rs;
                }else{
                    return $response->error_500();
                }
            }	
            //--------------				
        }else{
            return $response->error_401("El token es invalido o ha caducado.");

        }
    }//end if
} //end funct
    

private function procesarImagen($img,$nombre=""){
	$path=dirname(__DIR__)."\\resources\imagen\\";
	$a_image=explode(";base64,",$img);
	$ext=explode('/',mime_content_type($img))[1];
	$img64=base64_decode($a_image[1]);
	$nuevo_nombre=uniqid().".".$ext;
	if($nombre!=""){
		$nuevo_nombre=$nombre;
	}
	$file=$path.$nuevo_nombre;
	file_put_contents($file,$img64);
	return $nuevo_nombre;
}


private function insertarIncidenteArchivo(){
    $sql="INSERT INTO ".$this->tb." (fk_incidente,
						inar_archivo,
						inar_descripcion
						) values(
						'$this->fk_incidente',
						'$this->inar_archivo',
						'$this->inar_descripcion')";
    $pkInsert=parent::nonQueryId($sql);
    if($pkInsert){
		$this->actualizarCampoIncidente($this->fk_incidente,1);
        return $pkInsert;
    }else{
        return 0;
    }
}


private function actualizarCampoIncidente($pk_incidente, $valor){
	$sql="UPDATE incidente SET inci_archivo_estado='$valor' where pk_incidente='$pk_incidente'";	
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
				if(!isset($datosPost['pk']) || !isset($datosPost['archivo']) || !isset($datosPost['fk_incidente'])){
					return $response->error_400();
				}else{
					$this->pk_incidente_archivo=$datosPost['pk'];
					$this->inar_archivo=$datosPost['archivo'];
					$this->fk_incidente=$datosPost['fk_incidente'];
					
					$this->eliminarImagen($this->inar_archivo);
					$rowsDelete=$this->eliminarRegistro($this->pk_incidente_archivo);
					
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


	private function eliminarRegistro($pk){
		$sql="delete from incidente_archivo WHERE pk_incidente_archivo='$pk'";
		$rowsDelete=parent::nonQuery($sql);
		if($rowsDelete>=1){
			$existe=$this->existenRegitros();
			if($existe==false){
				$this->actualizarCampoIncidente($this->fk_incidente,"0");
			}
		  return $rowsDelete;
		}else{
		  return 0;
		}
	}
	
	private function eliminarImagen($archivo){
		$path=dirname(__DIR__)."\\resources\imagen\\";	
		unlink($path.$archivo);
	}
	
	//--------------------------------------------------------------------	
	private function existenRegitros(){
		$sql="select * from incidente_archivo WHERE fk_incidente=".$this->fk_incidente." limit 1";
		$rs=parent::getData($sql);
		$tr=count($rs);
		
		$existe=false;
		if ($tr>0){
			$existe=true;
		}
		return $existe;	
	}    


} //end class

?>