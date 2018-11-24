<?php
/**
* Modelo de recurso
*
* Contiene todas las funciones para el procesamientos de datos para un recurso
*
* @package recurso
* @author Victor Hugo Menendez Dominguez <mdoming@uady.mx>
* @version 1.5
* @date 18/Abril/2009
**/

/** Carga las funciones para la gestion de bases de datos*/
// include('libs/basedatos.php');

/**
* Elimina la informacion de un recurso
*
* @param int $recurso Id del recurso
* @return integer Numero de registros eliminados
*
* @uses ejecutarSQL
*/
function eliminarRecurso($recurso) {

	$SQL = 'DELETE FROM recursos WHERE id_recurso = ' . $usuario['id_recurso'];
	$resultado = ejecutarSQL($SQL);

	return $resultado;
}

/**
* Genera el titulo de un formulario
*
* @return text Titulo del formulario
*
*/
function generarTitulo() {

	return "Inicio de sesi&oacute;n";
}

function validarUsuario($usuario,$contrasenia,$archivo){
	$usuarios = leerUsuarios($archivo);
	
	if(isset($usuarios[$usuario])){
		if ($usuarios[$usuario] == $contrasenia) {
			return true;
		}else{
			return false;
		}

	}else{	
		return false;
	}
    
}

function leerUsuarios($archivo){
	$usuarios= array();
	$registros= file($archivo);

	foreach ($registros as $registro) {
		$usuario = explode(':' , $registro);

		$nombre = trim($usuario[0]);
		$contrasena = trim($usuario[1]);
		$usuarios[$nombre] =  $contrasena;
	}
	return $usuarios;
}

?>