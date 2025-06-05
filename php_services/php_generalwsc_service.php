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

	function crypter($action, $string) 
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'a veces no siempre se gana';
        $secret_iv = 'estare esperandote en el valhalla';
        $key = hash('sha256', $secret_key);    
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
	
	public function filterXSS($val) {
		$val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);
		$search = 'abcdefghijklmnopqrstuvwxyz';
		$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$search .= '1234567890!@#$%^&*()';
		$search .= '~`";:?+/={}[]-_|\'\\';
		for ($i = 0; $i < strlen($search); $i++) {
		   $val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); 
		   $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); 
		}
		$ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
		$ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
		$ra = array_merge($ra1, $ra2);
		$found = true; 
		while ($found == true) {
		   $val_before = $val;
		   for ($i = 0; $i < sizeof($ra); $i++) {
			  $pattern = '/';
			  for ($j = 0; $j < strlen($ra[$i]); $j++) {
				 if ($j > 0) {
					$pattern .= '(';
					$pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
					$pattern .= '|(&#0{0,8}([9][10][13]);?)?';
					$pattern .= ')?';
				 }
				 $pattern .= $ra[$i][$j];
			  }
			  $pattern .= '/i';
			  $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
			  $val = preg_replace($pattern, $replacement, $val);
			  if ($val_before == $val) {
				 $found = false;
			  }
		   }
		}
	   return $val;
	 } 
 
	public function antisql($value){
			$patrones = array();
			$patrones[0] = '/from/';
			$patrones[1] = '/shutdown/';
			$patrones[2] = '/select/';
			$patrones[3] = '/update/';
			$patrones[4] = '/account/';
			$patrones[5] = '/set/';
			$patrones[6] = '/insert/';
			$patrones[7] = '/delete/';
			$patrones[8] = '/where/';
			$patrones[9] = '/drop table/';
			$patrones[10] = '/show tables/';
			$patrones[11] = '/#/';
			$patrones[12] = '/clan/';
			$patrones[13] = '/character/';
			$patrones[14] = '/indexcontent/';
			$value = preg_replace($patrones,"",$value);
			$value = trim($value);
			$value = strip_tags($value);
			$value = addslashes($value);
			$value = str_replace("'", "''", $value);
			return $value;
	}
		 

//------------------------------------------------------------------------------
	public function valida($data) {
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = $this->filterXSS($data);
		$data = $this->antisql($data);
		return $data;
	}

	function isText($text){
		$pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
		return preg_match($pattern, trim($text));
	}

?>

//descargar el CLIENTE DE GUZZLE DE  -->   down/client.rar  colocarlo en ./