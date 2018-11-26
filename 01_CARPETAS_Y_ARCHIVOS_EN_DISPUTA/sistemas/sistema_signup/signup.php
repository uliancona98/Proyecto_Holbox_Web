<?php
include ("../../funciones/funciones_comprobacion.php");

//session_start();
$errores = array();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //Obtenemos los datos de interes
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    //Comprobaciones antes de enviarselo a la base de datos.
    if(strlen($nombre) < 6){
        $errores['nombre'] = "El nombre debe de ser de almenos 6 carácteres.";
    }
    if(!comprobarEmail($correo)){
        $errores['correo'] = "El correo debe tener un formato.";
    }
    if(!comprobarContrasena($contrasena)){
        $errores['contrasena'] = "La contraseña debe ser mínimo 6 carácteres y máximo 20";
    }else{
        $contrasena_cifrada = password_hash($contrasena,PASSWORD_DEFAULT);
    }
    if($contrasena != $_POST['repetir_contrasena']){
        $errores['repetir_contrasena'] = "Las contraseñas no coinciden.";
    } 
    //Si todo está correcto, enviarlo a la base de datos
    if(empty($errores)){
        include("../../funciones/base_de_datos/agregar_usuario.php");
        $last_id = agregar($nombre, $correo, $contrasena_cifrada);
        if(!empty($last_id)){
            //Al momento de registrarse. El tipo de usuario será Usuario
            session_start();
            $_SESSION['id_usuario'] = $last_id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['correo'] = $correo;
            $_SESSION['tipo_usuario'] = "usuario";
            header('Location:../../inicio.php');
            //include("../sistema_login/manejador_sesiones.php");
        }else{
            $errores['correoExists'] = "El correo ya se encuentra registrado.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrarse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="../../archivos_necesarios/css/estilos.css">
</head>
<body>
    <!--FORMULARIO-->
<div class="contenedor-formulario">
<h1>Registrarse</h1>
    <form id="formulario" class=" caja-login" method="post" action="">
        <div class="campo">
            <label for="usuario">Nombre: </label>
            <input type="text" name="nombre" id="usuario" placeholder="Usuario" value=<?=isset($_POST['nombre'])?$_POST['nombre']:""; ?>>
            <?=isError($errores,'nombre'); ?>
        </div>
        <div class="campo">
            <label for="correo">Correo: </label>
            <input type="text" name="correo" id="correo" placeholder="example@example.com" value=<?=isset($_POST['correo'])?$_POST['correo']:""; ?>>
            <?=isError($errores,'correo'); ?>
            <?=isError($errores,'correoExists'); ?>
        </div>
        <div class="campo">
            <label for="password">Contraseña: </label>
            <input type="password" name="contrasena" id="password" placeholder="Password">
            <?=isError($errores,'contrasena'); ?>
        </div>
        <div class="campo">
            <label for="password">Repetir contraseña: </label>
            <input type="password" name="repetir_contrasena" id="passwor" placeholder="repetir contraseña">
            <?=isError($errores, 'repetir_contrasena'); ?>
        </div>
        <div class="campo enviar">
            <input type="hidden" id="tipo" value="crear">
            <input type="submit" class="boton" value="Enviar"> <a href="../../inicio.php"><input type="button" value="Cancelar" class="boton"></a>
        </div>
    </form>
</div>
</body>
</html>