<?php echo '<?php'."\n";?>
require_once("class/Auth.php");
require_once("class/Response.php");

$response= new Response;
$auth= new Auth;

if($_SERVER['REQUEST_METHOD']=="POST"){
	$data=file_get_contents("php://input");
	$dataArray=$auth->login($data);
	
	header('Content-type: application/json');
		if(isset($dataArray['result']['error_id'])){
			$responseCode=$dataArray['result']['error_id'];
			http_response_code($responseCode);
		}else{
			http_response_code(200);
		}
		echo json_encode($dataArray);
}else{
	header('Content-type: application/json');
	$dataArray=$response->error_405();
	echo json_encode($dataArray);
	
}
?>