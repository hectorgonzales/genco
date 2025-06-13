// JavaScript Document
function c_model(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();
		
		var tn=$("#total_n").val();
		var ca = new Array();
		var tp = new Array();
		for(x=0;x<tn;x++){
			ca[x]=$("#c"+x).val();
			tp[x]=document.getElementById("t"+x).value;
		}//aqui
		var caj = JSON.stringify(ca);	
		var tpj = JSON.stringify(tp);	
		
		
 var parametros = {'op':'model','h':h,'u':u,'p':p,'d':d,'tb':tb,'tn':tn,'ca':caj,'tp':tpj,'port':port}

  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './csharp/csharp.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_proceso").html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
	  },
	  success: function(response){
		$("#ct_proceso").html(response.trim());
	  }
  });
}
//=======================================================================================================
function c_ver_tipo(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();
		
 var parametros = {'op':'c_ver_tipo','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}

  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './csharp/csharp.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_campos").html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
	  },
	  success: function(response){
		$("#ct_campos").html(response.trim());
		$("#ct_proceso").html("");
	  }
  });
}
//============================RDLC===========================================================================
function c_rdlc(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();
		
		var tn=$("#total_n").val();
		var ca = new Array();
		var tp = new Array();
		for(x=0;x<tn;x++){
			ca[x]=$("#c"+x).val();
			tp[x]=document.getElementById("t"+x).value;
		}//aqui
		var caj = JSON.stringify(ca);	
		var tpj = JSON.stringify(tp);	
		
		
 var parametros = {'op':'rdlc','h':h,'u':u,'p':p,'d':d,'tb':tb,'tn':tn,'ca':caj,'tp':tpj,'port':port}

  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './csharp/csharp.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_proceso").html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
	  },
	  success: function(response){
		$("#ct_proceso").html(response.trim());
	  }
  });
}
//=======================================================================================================
function c_ver_tipo_rdlc(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();
		
 var parametros = {'op':'c_ver_tipo_rdlc','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}

  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './csharp/csharp.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_campos").html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
	  },
	  success: function(response){
		$("#ct_campos").html(response.trim());
		$("#ct_proceso").html("");
	  }
  });
}
//========================================END RDLC===============================================================

function c_controller(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();
		
		var tn=$("#total_n").val();
		var ca = new Array();
		var tp = new Array();
		for(x=0;x<tn;x++){
			ca[x]=$("#c"+x).val();
			tp[x]=document.getElementById("t"+x).value;
		}//aqui
		var caj = JSON.stringify(ca);	
		var tpj = JSON.stringify(tp);	
		
		
 var parametros = {'op':'controller','h':h,'u':u,'p':p,'d':d,'tb':tb,'tn':tn,'ca':caj,'tp':tpj,'port':port}

  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './csharp/csharp.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_proceso").html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
	  },
	  success: function(response){
		$("#ct_proceso").html(response.trim());
	  }
  });
}
//=======================================================================================================
function c_ver_tipo_controller(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();
		
 var parametros = {'op':'c_ver_tipo_controller','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}

  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './csharp/csharp.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_campos").html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
	  },
	  success: function(response){
		$("#ct_campos").html(response.trim());
		$("#ct_proceso").html("");
	  }
  });
}


//===========================================================================================================
function c_connection(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();
		
 var parametros = {'op':'connection','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}

  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './csharp/csharp.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_proceso").html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
	  },
	  success: function(response){
		$("#ct_proceso").html(response.trim());
	  }
  });
}

function c_general(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();
	
 var parametros = {'op':'general','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}

  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './csharp/csharp.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_proceso").html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
	  },
	  success: function(response){
		$("#ct_proceso").html(response.trim());
	  }
  });
}


