<?php
function accion_verPerfil() {
    global $aplicacion, $url_base, $variables_ruta, $controlador, $accion;
    /** @ignore */
    // Incluye el modelo que corresponde
    //include('modelo/proceso_eliminar_imagenModelo.php');
    //include('modelo/bitacoraTablaModelo.php');
	//$titulo = generarTitulo();
	/** @ignore */
    // Pasa a la vista toda la informacion que se desea representar
    //session_start();
    //$_SESSION['eliminarImagen']=false;
    //$_SESSION['url_base']=$url_base;
    //$_SESSION['id_usuario']=1;
    //$_SESSION['tipo_usuario'] ="Usuario";
    echo $_SESSION['tipo_usuario']."OOO";
    global $arrayPublicaciones;
    global $publicacionesCount;
    $arrayPublicaciones = array();
    var_dump($arrayPublicaciones);    
    echo $publicacionesCount."JEJEJE";
    include("modelo/cargarImagenesUsuario.php");
    include("modelo/proceso_guardar_imagenModelo.php");
    include('vista/perfil_usuarioVista.php');
}
?>