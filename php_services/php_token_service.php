<?php echo '<?php'."\n";?>
require_once("Conexion.php");

class Token extends Conexion{
	
	public function updateToken($fecha){
		$sql="UPDATE usuario_token SET usto_estado='0' WHERE usto_fecha < '$fecha' AND usto_estado='1'";
		$sql2="DELETE FROM usuario_token where usto_estado='0' AND DAY(usto_fecha)<DAY(NOW())";
		$update=parent::nonQuery($sql);
		$delete=parent::nonQuery($sql2);
		if($update>0){
			return 1;
		}else{
			return 0;
		}
	}
	
}
?>

//En el HOSTING - crear CRON JOB para inactivar los tokens
//https://www.youtube.com/watch?v=NIkfSFB3q1g&list=PLIbWwxXce3VpvBT_O977da8XECEp-JTJt&index=16
//Crear una carpeta CRON en ./ con un file "actualizar_token.php"

<?php echo '<?php'."\n";?>
date_default_timezone_set('America/Lima');
include_once("../class/Token.php");
$token = new Token;
$fechaActual=date("Y-m-d H:i");

echo $token->updateToken($fechaActual);
?>

//ACTIVAR EN HOSTING
1.- Buscar "tareas programadas Cron Job"
2.- Tipo "personalizado"
3.- Comando a ejecutar: wget -O/dev/null" http://persson.pe/scv_1/cron/actualizar_token.php
4.- Opciones comunes: cada minuto
//activar todas las opciones *
5.- cada minuto - cada hora - cada dia - cada mes - todos los dias de la semana

//TAMBIEN IMPLEMENTAR
1. UN cronjob cada dia podria ser que borre de la db todos los tokens que esten inactivos