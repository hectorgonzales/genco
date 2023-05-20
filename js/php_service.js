// JavaScript Document
function php_srv_model(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();
 var parametros = {'op':'model','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}

  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './php_services/php.php',
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
function php_srv_handler(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'handler','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './php_services/php.php',
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
function php_srv_view(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'view','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './php_services/php.php',
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
function php_srv_controller(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'controller','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './php_services/php.php',
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
function php_srv_controller_js(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'controller_js','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   './php_services/php.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_proceso").html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
	  },
	  success: function(response){
		$("#ct_proceso").html(response.trim());
	  }
  });
}

