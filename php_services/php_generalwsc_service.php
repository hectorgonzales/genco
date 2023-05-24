<?php echo '<?php'."\n";?>
require __DIR__.'/../client/vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class General{
	
	//private $url="https://persson.pe/sci_v1/";
	private $url="http://localhost/app_incidentes/sci_v1/";
	
//------------------------------------------------------------------------------	
	public function getLogin($user,$password){
		try {
			$client = new Client(['base_uri' => $this->url]);
			$response = $client->request('POST', 'auth', ['json' => ['usua_login'=>$user,'usua_password'=>$password]]);
			
			if ($response->getStatusCode() == '200') {
   				$body = $response->getBody();	
			}else{
				$body=0;
			}
		
		} catch (RequestException $e) {
			if ($e->getResponse()->getStatusCode() == '400') {
				$body = $e->getResponse()->getBody(true);
			}
		
		} catch (\Exception $e) {
			$body = $e->getMessage();
		}
		return $body;	
	}
	
//------------------------------------------------------------------------------	
	public function listarRegistros($endpoint,$action,$params){
		try {
			$client = new Client(['base_uri' => $this->url]);		
			$response = $client->request('GET', $endpoint, ['query' => [$action => $params]]);	
			
			if ($response->getStatusCode() == '200') {
   				$body = $response->getBody();	
			}else{
				$body=0;
			}
		
		} catch (RequestException $e) {
			if ($e->getResponse()->getStatusCode() == '400') {
				$body = $e->getResponse()->getBody(true);
			}
		
		} catch (\Exception $e) {
			$body = $e->getMessage();
		}
		return $body;	
	}
//------------------------------------------------------------------------------	

	public function valorCampo($endpoint,$params){
		try {
			$client = new Client(['base_uri' => $this->url]);		
			$response = $client->request('GET', $endpoint, ['query' => ['campo' => $params]]);	
			
			if ($response->getStatusCode() == '200') {
   				$body = $response->getBody();	
			}else{
				$body=0;
			}
		
		} catch (RequestException $e) {
			if ($e->getResponse()->getStatusCode() == '400') {
				$body = $e->getResponse()->getBody(true);
			}
		
		} catch (\Exception $e) {
			$body = $e->getMessage();
		}
		return $body;	
	}

//------------------------------------------------------------------------------	
	public function existenRegitros($endpoint,$params){
		try {
			$client = new Client(['base_uri' => $this->url]);		
			$response = $client->request('GET', $endpoint, ['query' => ['existe_registro' => $params]]);	
			
			if ($response->getStatusCode() == '200') {
   				$body = $response->getBody();	
			}else{
				$body=0;
			}
		
		} catch (RequestException $e) {
			if ($e->getResponse()->getStatusCode() == '400') {
				$body = $e->getResponse()->getBody(true);
			}
		
		} catch (\Exception $e) {
			$body = $e->getMessage();
		}
		return $body;	
	}
		
//------------------------------------------------------------------------------	
	
	public function insertarRegistro($endpoint,$params){
		try {
			$client = new Client(['base_uri' => $this->url]);
			$response = $client->request('POST', $endpoint, ['json' => $params]);

			if ($response->getStatusCode() == '200') {
   				$body = $response->getBody();	
			}else{
				$body=0;
			}
		
		} catch (RequestException $e) {
			//if ($e->getResponse()->getStatusCode() == '400') {
				$body = $e->getResponse()->getBody(true);
			//}
		
		} catch (\Exception $e) {
			$body = $e->getMessage();
		}
		return $body;	
	}
	
//------------------------------------------------------------------------------
	public function obtenerRegistro($endpoint,$pk){
		try {
			$client = new Client(['base_uri' => $this->url]);		
			$response = $client->request('GET', $endpoint, ['query' => ['pk' => $pk]]);	
			
			if ($response->getStatusCode() == '200') {
   				$body = $response->getBody();	
			}else{
				$body=0;
			}
		
		} catch (RequestException $e) {
			if ($e->getResponse()->getStatusCode() == '400') {
				$body = $e->getResponse()->getBody(true);
			}
		
		} catch (\Exception $e) {
			$body = $e->getMessage();
		}
		return $body;	
	}	

//------------------------------------------------------------------------------	
	public function actualizarRegistro($endpoint,$params){
		try {
			$client = new Client(['base_uri' => $this->url]);
			$response = $client->request('PUT', $endpoint, ['json' => $params]);

			if ($response->getStatusCode() == '200') {
   				$body = $response->getBody();	
			}else{
				$body=0;
			}
		
		} catch (RequestException $e) {
			//if ($e->getResponse()->getStatusCode() == '400') {
				$body = $e->getResponse()->getBody(true);
			//}
		
		} catch (\Exception $e) {
			$body = $e->getMessage();
		}
		return $body;	
	}
	
//------------------------------------------------------------------------------	
	public function eliminarRegistro($endpoint,$params){
		try {
			$client = new Client(['base_uri' => $this->url]);
			$response = $client->request('DELETE', $endpoint, ['json' => $params]);

			if ($response->getStatusCode() == '200') {
   				$body = $response->getBody();	
			}else{
				$body=0;
			}
		
		} catch (RequestException $e) {
			//if ($e->getResponse()->getStatusCode() == '400') {
				$body = $e->getResponse()->getBody(true);
			//}
		
		} catch (\Exception $e) {
			$body = $e->getMessage();
		}
		return $body;	
	}		

?>

//descargar el CLIENTE DE GUZZLE DE  -->   down/client.rar  colocarlo en ./