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
                          <!--grid-->
                            <div uk-grid class="uk-grid-small uk-text-center">
                            
                                <div class="uk-width-1-2@s p-t4 uk-text-left@s uk-visible@s">
                                     <div class="uk-badge bg-gray p210 uk-text-middle">
                                     		 <span><?php echo"<?=BT_LIST;?> LISTA"?></span>
                                      </div>
                                </div>
                         
                                <div class="uk-width-1-2@s">
                                    <div>      
                                        <input type="hidden" id="txt_pk_hidden" placeholder="pk_tb" /><?php //<-- HID PK?>                                  
                                        <input type="hidden" id="box_txt_buscar_campo" value="campo_default" /><?php //<-- HID CAMPO BUSCAR?> 
                                        <!--grid form-->
                                       
                                        <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: search"></span>
                                            <input class="uk-input uk-form-small" placeholder="Buscar" name="box_txt_buscar" id="box_txt_buscar"  />
                                        </div>
                                               
                                    </div>
                                </div>
                                
                            </div>
                          <!--grid-->                                          
                   </div>
            
              <div id="ct_form_body" class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">
                    <!--contents-->
              </div>
              
              <div class="uk-card-footer uk-padding-small">
              		<span class="uk-badge bg-gray p210 uk-text-middle">Total Registros <?php echo "&amp;nbsp;";?> <i uk-icon="icon: fa-solid-chevron-right; ratio: 0.6"></i> <?php echo "&amp;nbsp;";?> <span id="lb_total_registros">0</span></span>
              		<button type="button" onclick="" class="uk-button uk-button-primary uk-button-small uk-align-right"><i uk-icon="print"></i> &nbsp; <span class="uk-visible@s">Imprimir</span></button>  
              </div>
              
            </div>
      </div>
</div>
<?php echo
"&lt;script> 
$('#box_txt_buscar').on('keydown', function(e) {
    if (e.which == 13) {
	listar_$objDatos->tbNombreUnidoCorto();
    }
});
</script>";?>

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
                  		<div class="uk-badge bg-gray p210 uk-text-middle">
                               <span><?php echo '<?=BT_NEW;?>';?> NUEVO</span>
                        </div>
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