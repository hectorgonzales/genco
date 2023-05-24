<?php echo '<?php'."\n";?>
date_default_timezone_set('America/Lima');
class Conexion{
	private $server;
	private $user;
	private $password;
	private $database;
	private $port;
	private $con;
	
	function __construct(){
		$dataConection=$this->getDataConection();
		
		foreach($dataConection as $key => $value){
			$this->server=$value['server'];
			$this->user=$value['user'];
			$this->password=$value['password'];
			$this->database=$value['database'];
			$this->port=$value['port'];
		}
		
		$this->con= new mysqli($this->server,
							   $this->user,
							   $this->password,
							   $this->database,
							   $this->port);   
							   
		if($this->con->connect_errno){
			echo "Error Database Conection!";
		}
		
	}
	
	private function getDataConection(){
		$path=dirname(__FILE__);
		$dataConection=file_get_contents($path."/"."config");
		return json_decode($dataConection, true);
	}
	
	
	private function convertUTF8($array){
		array_walk_recursive($array, function(&$item,$key){
			if(!mb_detect_encoding($item,'utf-8',true)){
				$item = utf8_encode($item);
			}
		});
		return $array;
	}
	
	public function getData($sql){
		$rs=$this->con->query($sql);
		$rstArray=array();
		foreach($rs as $key){
			$rstArray[]=$key;
		}
		return $this->convertUTF8($rstArray);
	}
	
	public function nonQuery($sql){
		$rs=$this->con->query($sql);
		return $this->con->affected_rows;
	}
	
	public function nonQueryId($sql){
		$rs=$this->con->query($sql);
		$rows=$this->con->affected_rows;
		if($rows>=1){
			return $this->con->insert_id;
		}else{
			return 0;
		}
	}
	
	protected function encript($str){
		return strtoupper(sha1($str));
	}
	
	public function validaToken($token){
		$sql="select * from usuario_token where usto_token='$token' AND usto_estado='1'";
		$getToken=$this->getData($sql);
		if($getToken){
			return $getToken;
		}else{
			return 0;
		}
	}
	
}
?>

//CREAR UN FILE TXT SIN EXT. - NAME: config
/*
{"conexion":{
"server":"localhost",
"user":"root",
"password":"",
"database":"appsci",
"port":"3306"
}
}
*/