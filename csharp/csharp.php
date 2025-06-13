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
?>
<?php
$objDatos->prepararNombreTablas($tb);
$da=$objDatos->prepararCamposTablas($tb);
?>

<?php
switch($op){ 	
	case 'model':
		$totalCampos=$_POST['tn'];
		$campos=json_decode(stripslashes($_POST['ca']));
		$tipos=json_decode(stripslashes($_POST['tp']));
		
		$objDatos->prepararCamposTablaCsharp($campos,$tipos,$totalCampos);
		
		include('csharp_model.php');
	break; 

	?>
	<!-- rdlc -->
	<?php
	case 'c_ver_tipo_rdlc': ?>
		<?=$objDatos->verCamposTipoCsharpRdlc($tb);?>
	<?php
    break;
	?>
	<?php
	case 'rdlc':
		$totalCampos=$_POST['tn'];
		$campos=json_decode(stripslashes($_POST['ca']));
		$tipos=json_decode(stripslashes($_POST['tp']));
		
		$objDatos->prepararCamposTablaCsharp($campos,$tipos,$totalCampos);
		include('csharp_rdlc.php');
	break;
	?>	
	<?php
	case 'controller':
		$totalCampos=$_POST['tn'];
		$campos=json_decode(stripslashes($_POST['ca']));
		$tipos=json_decode(stripslashes($_POST['tp']));
		
		$objDatos->prepararCamposTablaCsharp($campos,$tipos,$totalCampos);
		
		include('csharp_controller.php');
	break; 
	?>
	
	<?php
	case 'connection':
		include('csharp_connection.php');
	break;
	?>
    
    <?php
	case 'general':
		include('csharp_general.php');
	break;
	?>
    
    <?php
	case 'c_ver_tipo':?>
		<?=$objDatos->verCamposTipoCsharp($tb);?>
	<?php
    break;
	?>
    <?php
	case 'c_ver_tipo_controller':?>
		<?=$objDatos->verCamposTipoCsharpController($tb);?>
	<?php
    break;
	?>
	
<?php
} //end switch ============================================
?>