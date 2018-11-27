<?php
function accion_iniciar(){
	global $aplicacion, $url_base, $variables_ruta, $controlador, $accion;
	include ("vista/adminUsuariosVista.php");	
}

function accion_usuarios($accion,$id){
	global $aplicacion, $url_base, $variables_ruta, $controlador, $accion;
	include ("modelo/adminUsuariosModelo.php");
	accionUsuarios($accion,$id);
}
?>