<?php echo '<?php'."\n";?>
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}else{
	header ("Location:index.php");
}
date_default_timezone_set('America/Lima');
$token=$_SESSION['token'];
$endPoint="<?=substr(trim($objDatos->tbNombreConGuion),0,-1);?>";

require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
$tb="<?=$objDatos->tbNombreOriginal?>";
$tb_pk="<?=$objDatos->pkTabla?>";
$prefijo_op="<?=$objDatos->tbNombreUnidoCorto?>";
$op=$_POST['op'];
switch($op){
?>
<?php echo '<?php'."\n";?>
case "list":
?>
<table id="tb_lista" class="tb_lista" width="100%">
     <thead>
            <tr>
             <?="\t\t\t";?><th>N°</th>	
				<?=trim($objDatos->camposGridV3);?>
            <?="\n\t";?></tr>
        </thead>
    <!--Table body-->        
    <tbody>
    	<?php echo '<?php'."\n";?>
		$txt=$_POST['txt'];
        $campo=$_POST['campo'];        
			if(trim($txt)==""){
            	$params=['campo_order' => $tb_pk];
				$ds=json_decode($general->listarRegistros($endPoint,"listar",json_encode($params)),true);
			}else{
            	$params=['campo_buscar' => $campo,'txt' => $txt];
				$ds=json_decode($general->listarRegistros($endPoint,"buscar",json_encode($params)),true);
			}			        	
			$tr=count($ds);
			if ($tr==0){
				echo "<td colspan='<?=$objDatos->totalCampos-1;?>'><div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div></td></tr>";
			}else{
				$n=1;
				foreach($ds as $fila){
				?>
				<tr id="fila<?php echo '<?=$fila[$tb_pk];?>';?>" ondblclick="hacer_clic('#frm_bt_modificar_<?php echo '<?=$prefijo_op;?>';?>');" onclick="pasar_pk_fila_lista('#txt_pk_hidden',<?php echo '<?=$fila[$tb_pk];?>';?>)">
					<td class="tc bgn" width="30"><?php echo '<?=$n;?>';?></td>
					<?=trim($objDatos->camposCeldasV3);?>
				<?="\n\t\t\t\t";?></tr>               
				<?php echo '<?php'."\n";?>
				$n++;
				} //fin while
			} //fin si
			?>
    </tbody>
    <!--Table body-->
</table>
<!--Table-->
<?php echo
"&lt;script> 
pasar_un_valor(<?=&dollar;tr;?>,'#lb_total_registros');
</script>";?>

<?php echo '<?php'."\n";?>
break; /*FIN DE LIST*/
?>


<?php //=============================================================?>
<?php echo '<?php'."\n";?>
/*INSERT*/
case "insert":
?>
<?php echo '<?php'."\n";?>
<?=$objDatos->camposPost;?>

$params=['token' => $token,
		<?=substr(trim($objDatos->camposParams),0,-1);?>];
        
$general->insertarRegistro($endPoint,$params)

?>
<?php echo '<?php'."\n";?>
break; //FIN DE INSERT
?>

<?php //=============================================================?>
<?php echo '<?php'."\n";?>
/*EDIT*/
case "edit":
?>
<?php echo '<?php'."\n";?>
$pk=$_POST['pk'];
$ds=json_decode($general->obtenerRegistro($endPoint,$pk),true);
$fila=$ds[0]; 
?>
<div uk-grid>
  
      <div class="uk-width-1-1">
            <div class="uk-card uk-card-default">

                  <div class="uk-card-header bg-card-header-1 uk-padding-small">
                  		<div class="uk-badge bg-gray p210 uk-text-middle">
                               <span><?php echo '<?=BT_EDIT;?>';?> MODIFICAR</span>
                        </div>
                  </div>

                  <div class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">
                        <!--form-->
                        <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
                        	<?php echo '<?php /*--*/?>'."\n";?>
                            <input type="hidden" name="pk_edit" id="txt_<?=$objDatos->tbNombreUnidoCorto;?>_pk" value="<?php echo '<?=$fila[$tb_pk]?>';?>" />
                           	<?php echo '<?php /*--*/?>'."\n";?>
                                <!--grid-->
                            <div class="uk-width-1-2@s">
                                	<div class="uk-card uk-card-default uk-card-body">
                                        	<div class="uk-grid-small" uk-grid>
                                        	<!--campos-->
                                                <div class="uk-width-1-1">
                                                    <label>label:</label>
                                                    <input type="text" class="uk-input uk-form-small uk-width-1-1 mayus" id="txt_campo" value="" />
                                                </div>
                                            <!--campos--> 
                                         	</div>
                                   	</div>
                               </div>
                            <!--grid-->
                            
                        </form>
                        <!--form-->
                  </div><!--card body-->
                  <!--footer-->
                  <div class="uk-card-footer uk-padding-small">
                        <button type="button" onclick="hacer_clic('#frm_bt_lista_<?php echo '<?=$prefijo_op;?>';?>');" class="uk-button uk-button-default uk-button-small"><i uk-icon="reply"></i> &amp;<?php echo 'nbsp;';?> <span class="uk-visible@s">Cancelar</span></button>        
                        <button type="button" value="Submit" onclick="validaForm_<?php echo '<?=$prefijo_op;?>';?>(2);" class="uk-button uk-button-primary uk-button-small"><i uk-icon="check"></i> &amp;<?php echo 'nbsp;';?> Actualizar</button> 
                        <span uk-alert class="uk-alert-danger uk-margin-remove uk-padding-remove fs10" style="display:none" id="frm_msg_error"></span>
                  </div> 
                  <!--footer-->
                  
            </div>
      </div>
  
</div>

<?php echo "&lt;script type=\"text/javascript\">\ncampos_enter();\n</script>";?>
    
<?php echo '<?php'."\n";?>
break; /*FIN DE EDIT*/
?>


<?php //=============================================================?>
<?php echo '<?php'."\n";?>
/*UPDATE*/
case "update":
?>
<?php echo '<?php'."\n";?>
$pk=$_POST['pk'];
<?=$objDatos->camposPost;?>

$params=['token' => $token,
		<?php echo "&dollar;tb_pk";?>=>$pk,
		<?=substr(trim($objDatos->camposParams),0,-1);?>];
        			
$general->actualizarRegistro($endPoint,$params);
    
?>
<?php echo '<?php'."\n";?>
break; /*FIN DE UPDATE*/
?>
<?php //=============================================================?>
<?php echo '<?php'."\n";?>
case "delete":
?>
<?php echo '<?php'."\n";?>
	$pk=$_POST['pk'];		
	$params=['token' => $token,
		'campo'=><?php echo "&dollar;tb_pk";?>,
		'valor'=>$pk
		];	
	$general->eliminarRegistro($endPoint,$params);
        
?>
<?php echo '<?php'."\n";?>
break; /* END DELETE*/
?>
<?php //=============================================================?>
<?php echo '<?php'."\n";?>
} /*FIN SWITCH*/
?>