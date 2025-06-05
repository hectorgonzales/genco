// JavaScript Document
function php_srv_model_sec(){
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
function php_srv_handler_sec(){
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
function php_srv_view_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'view_sec','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_controller_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'controller_sec','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_controller_js_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'controller_js_sec','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_auth_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'auth','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_conexion_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'conexion','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_response_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'response','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_token_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'token','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_general_sec(){
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
function php_srv_authc_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'authc','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_htaccess_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'htaccess','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_modelfile_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'modelfile','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_endpointfile_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'endpointfile','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
function php_srv_generalwsc_sec(){
		var h=$("#txt_server").val();
		var u=$("#txt_user").val();
		var p=$("#txt_password").val();
		var d=$("#txt_database").val();
		var tb=$("#txt_table").val();
		var port=$("#txt_port").val();

 var parametros = {'op':'generalwsc','h':h,'u':u,'p':p,'d':d,'tb':tb,'port':port}
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
