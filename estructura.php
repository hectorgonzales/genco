<?php
$op=$_POST['op'];
?>
<?php
switch($op){
?>
<?php
case "lenguajes":
?>
<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" onclick="ver_php();" type="button">PHP</button>
<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" onclick="ver_php_services();" type="button">PHP SERVICES</button>
<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" onclick="ver_php_services_sec();" type="button">PHP SERV. DATA</button>
<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" onclick="ver_vb();" type="button">BASIC</button>
<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" onclick="ver_csharp();" type="button">C#</button>
<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" onclick="" type="button">JAVA</button>
<button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" onclick="" type="button">JS</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1" onclick="seleccionar();" type="button">SELECCIONAR</button>
<?php
break;
?>

<?php
case 'php':
?>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_model();" type="button">Model PHP</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_controller_php(2);" type="button">Controller PHP uikit v2</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_controller_php(3);" type="button">Controller PHP uikit v3</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_controller_js(2);" type="button">Controller JS uikit v2</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_controller_js(3);" type="button">Controller JS uikit v3</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_view(3);" type="button">View v3</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_varios();" type="button">Varios</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_alert_js();" type="button">Alert JS</button>
<?php
break;
?>

<?php
case 'php_services':
?>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_model();" type="button">Model Service (class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_authc();" type="button">Auth (Class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_token();" type="button">Token (class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_general();" type="button">General (class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_conexion();" type="button">Conexión (class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_response();" type="button">Response (class)</button>

<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_handler();" type="button">handler Service - (endpoint)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_auth();" type="button">Auth (endpoint)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_htaccess();" type="button">htaccess (endpoint)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_modelfile();" type="button">Model with File</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_endpointfile();" type="button">Endpoint with File</button>

<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_view();" type="button">View Service (wsc)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_controller();" type="button">Controller Service (wsc)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_controller_js();" type="button">Controller_js Service (wsc)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_generalwsc();" type="button">General (wsc)</button>
<?php
break;
?>

<?php
case 'php_services_sec':
?>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_view_sec();" type="button">View Service (wsc)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_controller_sec();" type="button">Controller Service (wsc)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_controller_js_sec();" type="button">Controller_js Service (wsc)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_generalwsc_sec();" type="button">General (wsc)</button>

<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_model_sec();" type="button">Model Service (class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_authc_sec();" type="button">Auth (Class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_token_sec();" type="button">Token (class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_general_sec();" type="button">General (class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_conexion_sec();" type="button">Conexión (class)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_response_sec();" type="button">Response (class)</button>

<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_handler_sec();" type="button">handler Service - (endpoint)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_auth_sec();" type="button">Auth (endpoint)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_htaccess_sec();" type="button">htaccess (endpoint)</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_modelfile_sec();" type="button">Model with File</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="php_srv_endpointfile_sec();" type="button">Endpoint with File</button>
<?php
break;
?>

<?php
case 'vb':
?>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="vb_ver_tipo();" type="button">Model VB</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="vb_controller();" type="button">Controller VB</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="vb_connection();" type="button">Connection VB</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="vb_general();" type="button">General Model VB</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="vb_general_view();" type="button">General View VB</button>
<?php
break;
?>
<?php
case 'csharp':
?>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="c_ver_tipo();" type="button">Model C#</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="c_ver_tipo_controller();" type="button">Controller C#</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="c_connection();" type="button">Connection C#</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="c_general();" type="button">General Model C#</button>
<button class="uk-button uk-button-mini uk-button-success uk-width-1-1 uk-margin-small-bottom" onclick="c_ver_tipo_rdlc();" type="button">Campos RDLC</button>
<?php
break;
?>

<?php
}/*END SWITCH*/
?>