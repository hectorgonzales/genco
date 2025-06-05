<?php
	//$msg_procesando="<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>";
	$msg_procesando="msgLoader";
	$msg_msg="<i uk-icon='warning'></i> Debe ingresar datos.";
?>
//-------------------------------------------------------------------------------------------------------	
function main_<?=$objDatos->tbNombreUnidoCorto?>(){
 var parametros = {'op':'main'}
  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   'view/view_<?=$objDatos->tbNombreOriginal?>.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_form").html(<?=$msg_procesando?>);
	  },
	  success: function(response){
		$("#ct_form").html(response);
		listar_<?=$objDatos->tbNombreUnidoCorto?>();  
	  }
  });
}
//--------------------------------------------------------------------------------------------------------
function listar_<?=$objDatos->tbNombreUnidoCorto?>(){
  	var parametros = {'op':'list'}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_<?=$objDatos->tbNombreOriginal?>.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form_body").html(<?=$msg_procesando?>);
		  },
		  success:  function (response) {
				  $("#ct_form_body").html(response);
                  tb_seleccionar_fila_lista('#tb_lista',1);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_nuevo_<?=$objDatos->tbNombreUnidoCorto?>(){
  	var parametros = {'op':'new'}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'view/view_<?=$objDatos->tbNombreOriginal?>.php',
		  type:  'post',
		  beforeSend: function () {
				  $("#ct_form").html(<?=$msg_procesando?>);
		  },
		  success:  function (response) {
				  $("#ct_form").html(response);
				  //$("#campo").focus();				  
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function validaForm_<?=$objDatos->tbNombreUnidoCorto?>(op_frm) {  //1 ADD 2 EDIT
	var a=DOMPurify.sanitize($("#txt_campo").val());
	if(a=="" || a==null){	
		$("#txt_campo").focus();	
		msg_popup("<?=$msg_msg?>");			
		return false;
	}
		
	if(op_frm==1){
		form_insertar_<?=$objDatos->tbNombreUnidoCorto?>();
	}else if(op_frm==2){
		form_actualizar_<?=$objDatos->tbNombreUnidoCorto?>()
	}
	return true;
}

//--------------------------------------------------------------------------------------------------------
function form_insertar_<?=$objDatos->tbNombreUnidoCorto?>(){	
<?="\t\t";?><?=$objDatos->camposInsertJs?>
var parametros = {'op':'insert',<?=substr(trim($objDatos->camposInsertPostJs),0,-1);?>}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_<?=$objDatos->tbNombreOriginal?>.php',
		  type: 'post',
		  beforeSend: function () {
				 $("#ct_form_body").html(<?=$msg_procesando?>);
		  },
		  success:  function (response) {
				 main_<?=$objDatos->tbNombreUnidoCorto?>();
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_modificar_<?=$objDatos->tbNombreUnidoCorto?>(){
	var pk=$("#txt_pk_hidden").val();
  	var parametros = {'op':'edit','pk':pk}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_<?=$objDatos->tbNombreOriginal?>.php',
		  type:  'post',
		  beforeSend: function () {
				  $("#ct_form").html(<?=$msg_procesando?>);
		  },
		  success:  function (response) {
				  $("#ct_form").html(response);
				  //$("#campo").focus();	
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_actualizar_<?=$objDatos->tbNombreUnidoCorto?>(){
	var pk=DOMPurify.sanitize($("#txt_<?=$objDatos->tbNombreUnidoCorto?>_pk").val());
	
<?="\t\t";?><?=$objDatos->camposInsertJs?>
var parametros =  {'op':'update','pk':pk,<?=substr(trim($objDatos->camposInsertPostJs),0,-1);?>}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:   'controller/ctrl_<?=$objDatos->tbNombreOriginal?>.php',
		  type:  'post',
		  beforeSend: function () {
				$("#ct_form_body").html(<?=$msg_procesando?>);
		  },
		  success:  function (response) {
				  main_<?=$objDatos->tbNombreUnidoCorto?>();
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_eliminar_<?=$objDatos->tbNombreUnidoCorto?>(){
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
    	var pk=DOMPurify.sanitize($("#txt_pk_hidden").val());
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_<?=$objDatos->tbNombreOriginal?>.php',
			  type:  'post',
			  beforeSend: function () {
			  },
			  success:  function (response) {
					msg_popup("<i uk-icon='check'></i> Registro eliminado.");
					quitar_fila_lista(pk);
			  }
	  	});	
		
	}, function () {
		console.log('no.')
	});
	
}
