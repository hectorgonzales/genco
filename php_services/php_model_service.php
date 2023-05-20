<?php echo '<?php'."\n";?>
include_once("Conexion.php");
include_once("Response.php");

class <?=$objDatos->tbNombreCamello;?> extends Conexion{
<?php
echo "private $".$objDatos->pkTabla.";\n";
echo $objDatos->camposPrivate;
echo "//-----------------------------\n";
?>
private $token="";
private $tb="<?=$objDatos->tbNombreOriginal;?>";
private $tb_pk="<?=$objDatos->pkTabla?>";

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
            if(!isset($datosPost['<?=$objDatos->primerCampo;?>'])){
                return $response->error_400();
            }else{
                $this-><?=$objDatos->primerCampo;?>=$datosPost['<?=$objDatos->primerCampo;?>'];
                <?=$objDatos->camposIsset;?>
$pkInsert=$this->insertar<?=$objDatos->tbNombreCamello;?>();
                if($pkInsert){
                    $rs=$response->response;
                    $rs['result']=array(
                                "<?=$objDatos->pkTabla?>"=> $pkInsert
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
    

private function insertar<?=$objDatos->tbNombreCamello;?>(){
    $sql="INSERT INTO ".$this->tb." (<?=substr(trim($objDatos->camposLista),0,-1);?><?="\n\t\t\t\t\t\t"?>) values(<?="\n\t\t\t\t\t\t"?><?=substr(trim($objDatos->camposInsert),0,-1);?>)";
    $pkInsert=parent::nonQueryId($sql);
    if($pkInsert){
        return $pkInsert;
    }else{
        return 0;
    }
}

//------------update--------------------------------------------------

public function validaDataPut($json){
    $response= new Response;
    $datosPost=json_decode($json,true);
    if(!isset($datosPost['token'])){
        return $response->error_401();
    }else{
        $this->token=$datosPost['token'];
        $arrayToken=parent::validaToken($this->token);
        if($arrayToken){
            //------------------------
            if(!isset($datosPost['<?=$objDatos->pkTabla?>'])){
                return $response->error_400();
            }else{
                $this-><?=$objDatos->pkTabla?>=$datosPost['<?=$objDatos->pkTabla?>'];
                <?=$objDatos->camposIsset;?>
$rowsUpdate=$this->actualizar<?=$objDatos->tbNombreCamello;?>();
                if($rowsUpdate){
                    $rs=$response->response;
                    $rs['result']=array(
                                "<?=$objDatos->pkTabla?>"=> $this-><?=$objDatos->pkTabla?>

								);
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


private function actualizar<?=$objDatos->tbNombreCamello;?>(){
	$sql="UPDATE ".$this->tb." SET <?=substr(trim($objDatos->camposUpdate),0,-1);?><?="\n\t\t\t\t\t\t"?> WHERE ".$this->tb_pk."='".$this-><?=$objDatos->pkTabla?>."'";
    $rowsUpdate=parent::nonQuery($sql);
    if($rowsUpdate>=1){
        return $rowsUpdate;
    }else{
        return 0;
    }
  
}

} //end class

<?php echo '?>';?>