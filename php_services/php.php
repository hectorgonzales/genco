<?php
include_once("../Datos.php");
$op=$_POST['op'];
	$h=$_POST['h'];
	$u=$_POST['u'];
	$p=$_POST['p'];
	$d=$_POST['d'];
	$port=$_POST['port'];
	$tb=$_POST['tb'];
	$objDatos=new Datos($h,$u,$p,$d,$port);
	//$objDatos=new Datos("localhost","root","usbw","alma_tdm");
	if(isset($_POST['version'])){
		$version=$_POST['version'];
	}else{
		$version="";
	}
?>
<?php
$objDatos->prepararNombreTablas($tb);
$da=$objDatos->prepararCamposTablaPHP($tb);
?>

<?php
switch($op){ 	
	case 'model':
		include('php_model_service.php');
	break; 
	?>
	<?php
	case 'handler':
		include('php_handler_service.php');
	break;
	?>
    <?php
	case 'view':
		include('php_view_service.php');
	break;
	?>
	<?php
	case 'view_sec': //secure
		include('php_view_service_sec.php');
	break;
	?>
    <?php
	case 'controller':
		include('php_controller_service.php');
	break;
	?>
	<?php
	case 'controller_sec':
		include('php_controller_service_sec.php');
	break;
	?>
    <?php
	case 'controller_js':
		include('php_controller_js_service.php');
	break;
	?>
	<?php
	case 'controller_js_sec':
		include('php_controller_js_service_sec.php');
	break;
	?>
    <?php
	case 'auth':
		include('php_auth_service.php');
	break;
	?>
    <?php
	case 'conexion':
		include('php_conexion_service.php');
	break;
	?>   
    <?php
	case 'response':
		include('php_response_service.php');
	break;
	?>
    <?php
	case 'token':
		include('php_token_service.php');
	break;
	?>  
    <?php
	case 'general':
		include('php_general_service.php');
	break;
	?> 
    <?php
	case 'authc':
		include('php_authc_service.php');
	break;
	?>    
	<?php
	case 'htaccess':
		include('php_htaccess_service.php');
	break;
	?> 
	<?php
	case 'modelfile':
		include('php_modelfile_service.php');
	break;
	?>   
	<?php
	case 'endpointfile':
		include('php_endpointfile_service.php');
	break;
	?> 
	<?php
	case 'generalwsc':
		include('php_generalwsc_service.php');
	break;
	?>     
<?php
} //end switch ============================================
?>