<?php echo '<?php'."\n";?>
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}
date_default_timezone_set('America/Lima');
$op=$_POST['op'];
$prefijo_op="<?=$objDatos->tbNombreUnidoCorto?>";
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
switch($op){
?>
<?php echo '<?php'."\n";?>
case "main":
?>
<div uk-grid>
  
      <div class="uk-width-1-1">
            <div class="uk-card uk-card-default">
                  
                  <div class="uk-card-header uk-padding-small bg-card-header-1">
                        <button type="button" class="uk-button uk-button-small uk-margin-right uk-float-left" onclick="listar_<?=$objDatos->tbNombreUnidoCorto?>();"><i class="icon_circ icon_text"></i> &nbsp; Listar</button>
                        <div id="bts_export"></div>
                        <input type="hidden" id="txt_pk_hidden" /><?php //<-- HID PK?>

                  </div>
            
                  <div id="ct_form_body" class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:true">
                        <!--contents-->
                  </div>
              
                  <div class="uk-card-footer uk-padding-small">
                              <span>:::</span>  
                  </div>
              
            </div>
      </div>
</div>
<?php echo '<?php'."\n";?>
break; /*FIN DE MAIN*/
?>
<?php //=============================================================?>
<?php echo '<?php'."\n";?>
/*NEW*/
case "new":
?>
<div uk-grid>
  
      <div class="uk-width-1-1">
            <div class="uk-card uk-card-default">
            
                  <div class="uk-card-header bg-card-header-1 uk-padding-small">
                        <span class="txt-title ">NUEVO</span>
                  </div>

                  <div class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">
                  
                         <!--form-->
                            <!--grid-->
                             <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
                             	<div class="uk-width-1-2@s">
                                	<div class="uk-card uk-card-default uk-card-body">
                                        <div class="uk-grid-small" uk-grid>
                                        		<!--CAMPOS-->
                                            	<?=trim($objDatos->camposFormNew)."\n";?>
                                                <!--CAMPOS-->
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
                        <button type="button" value="Submit" onclick="validaForm_<?php echo '<?=$prefijo_op;?>';?>(1);" class="uk-button uk-button-primary uk-button-small"><i uk-icon="check"></i> &amp;<?php echo 'nbsp;';?> Guardar</button>
                        <span uk-alert class="uk-alert-danger uk-margin-remove uk-padding-remove fs10" style="display:none" id="frm_msg_error"></span>  
                  </div> 
                  <!--footer-->                 
              
            </div>
      </div>
  
</div>

<?php echo "<!--\n&lt;script type=\"text/javascript\">\n validar_campos();\n</script>\n-->";?>

<?php echo '<?php'."\n";?>
break; //FIN DE NEW
?>
<?php //=============================================================?>
<?php echo '<?php'."\n";?>
} /*FIN SWITCH*/
?>
<?php echo "&lt;script type=\"text/javascript\">\ncampos_enter();\n</script>";?>