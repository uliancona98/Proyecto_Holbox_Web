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

function accion_iniciarCatalogo() {

	global $aplicacion, $url_base, $variables_ruta, $controlador, $accion;

	/** @ignore */
	// Incluye el modelo que corresponde
	include('modelo/catalogoModelo.php');
	
    $titulo = generarTitulo(); 
    $catalogoPrincipal= cargarPrincipal();
	/** @ignore */
	// Pasa a la vista toda la informacion que se desea representar
	
    include('vista/catalogoVista.php');    
	
}

function accion_buscarRestaurante() {

	global $aplicacion, $url_base, $variables_ruta, $controlador, $accion;

	/** @ignore */
	// Incluye el modelo que corresponde
	include('modelo/catalogoModelo.php');
	
	$titulo = generarTitulo();
	$resultado= realizarBusqueda();
	echo $resultado;
}
?>