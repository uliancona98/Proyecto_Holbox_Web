<?php
    session_start();
    $id = $_SESSION['id_usuario'];

    require_once("core/Conexion.php");
    session_start();
    $con = new Conexion();
    $conexion = $con->get_conexion();
	$query = "UPDATE usuarios SET disponibilidad=false WHERE id_usuario='$id'";

    //$query1 = "UPDATE  publicaciones WHERE id_usuario='$id'";
    $resultado1 = $conexion->query($query1);
    
    if(!$resultado1){
        header("Location: informacion_perfil.php");
    }
    
    $query2 = "UPDATE usuarios SET disponibilidad=false WHERE id_usuario='$id'";
    $resultado2 = $conexion->query($query2);
    if($resultado2){
        header("Location:../../sistemas/sistema_login/logout.php");
        echo "Si se elimino";
    }else{
        header("Location:../../paginas/paginas_usuarios/informacion_perfil.php");
        echo "No se elimino";
    }

?>
