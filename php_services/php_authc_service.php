<?php echo '<?php'."\n";?>
require_once("Conexion.php");
require_once("Response.php");

class Auth extends Conexion{

	public function login($json){
		$response=new Response;
		$datos=json_decode($json,true);
		if(!isset($datos['usua_login']) || !isset($datos['usua_password'])){
			return $response->error_400();
			
		}else{
			$login=$datos['usua_login'];
			$password=$datos['usua_password'];
			$password=parent::encript($password);
			
			$datosDb=$this->getDataUser($login);
			if($datosDb){
				if($password==$datosDb[0]['usua_password']){
					if($datosDb[0]['usua_estado']==1){
						$token=$this->createToken($datosDb[0]['pk_usuario']);
						if($token){
							$rs=$response->response;
							$rs['result']=array("token"=> $token,
												'pk_usuario'=>$datosDb[0]['pk_usuario'],
												'usua_usuario'=>$datosDb[0]['usua_usuario'],
												'usua_estado'=>$datosDb[0]['usua_estado'],
												'usua_privilegios'=>$datosDb[0]['usua_privilegios'],
												
												);
							return $rs;
							
						}else{
							return $response->error_500("Error interno, no se pudo guardar.");
						}
					}else{
						return $response->error_200("Usuario esta inactivo");
					}
				}else{
					return $response->error_200("Password incorrecto");
				}
			}else{
				return $response->error_200("No existe el usuario $login");
			}
		}
	}

	private function getDataUser($login){
		$sql="select * from usuario where usua_login='$login'";
		$datos=parent::getData($sql);
		if(isset($datos[0]['pk_usuario'])){
			return $datos;
		}else{
			return 0;
		}
	}
	
	private function createToken($pk_usuario){
		$val=true;
		$token=bin2hex(openssl_random_pseudo_bytes(16,$val));
		$fecha=date("Y-m-d H:i");
		$estado=1;
		$sql="insert into usuario_token (fk_usuario,usto_token,usto_estado,usto_fecha) values ('$pk_usuario','$token','$estado','$fecha');";
		$rs=parent::nonQuery($sql);
		if($rs){
			return $token;
		}else{
			return 0;
		}
	}

}
?>