<?php
/**
* Controlador de recurso
*
* Contiene todas las funciones para el control de recursos,
* desde validaciones hasta ejecuciones. Llama al modelo y la vista necesaria
*
* @package recurso
* @author Victor Hugo Menendez Dominguez <mdoming@uady.mx>
* @version 1.5
* @date 20/Abril/2009
*
**/

/**
* Presenta la pagina de busqueda de recursos.
* Carga el archivo modelo/recursoModelo.php.
* Carga el archivo vista/recursoBuscarVista.php
*
* @uses $aplicacion
* @uses $url_base
* @uses $variables_ruta
* @uses $controlador
* @uses $accion
*
* * @uses generarTitulo
*/
function accion_iniciarSesion() {

	global $aplicacion, $url_base, $variables_ruta, $controlador, $accion;

	/** @ignore */
	// Incluye el modelo que corresponde
	include('modelo/usuarioModelo.php');
	
    $titulo = generarTitulo();  

	/** @ignore */
	// Pasa a la vista toda la informacion que se desea representar
	include('vista/usuarioiniciarSesionVista.php');
	
}


function accion_validar() {
	
	global $aplicacion, $url_base, $variables_ruta, $controlador, $accion,$directorio_base;

	/** @ignore */
	// Incluye el modelo que corresponde
	include('modelo/usuarioModelo.php');
	
    $titulo = generarTitulo();  
    $usuarioValido= validarUsuario($_POST['user'],$_POST['password'], $directorio_base . "config/usuarios.txt");

	if($usuarioValido){
		header("location:" . $url_base . "recurso/buscar");		
	}else{
		header("location:" . $url_base);
	}

}

?>