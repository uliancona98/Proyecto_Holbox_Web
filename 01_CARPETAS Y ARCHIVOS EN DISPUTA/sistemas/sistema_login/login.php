<?php
include("../../funciones/funciones_comprobacion.php");
$errores = array();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    include("../../funciones/base_de_datos/comprobar_usuario.php");
    $datos = comprobar_ingreso($correo, $contrasena);
    if(!empty($datos)){
        session_start();
        $_SESSION['id_usuario'] = $datos['id_usuario'];
        $_SESSION['nombre'] = $datos['nombre'];
        $_SESSION['correo'] = $datos['nombre'];
        $_SESSION['tipo_usuario'] = $datos['tipo_usuario'];
        header("Location:../../inicio.php");
    }else{
        $errores['no_login'] = "Comprueba tu correo y contraseña.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../archivos_necesarios/css/estilos.css">
</head>
<body>
<div class="contenedor-formulario">
<h1>Iniciar de sesion</h1>
<form id="formulario"  class="caja-login" method="post" action="">
    <div class="campo">
        <label for="correo">Correo: </label>
        <input type="text" name="correo" id="correo" placeholder="Correo">
    </div>
    <div class="campo">
        <label for="password">Contraseña: </label>
        <input type="password" name="contrasena" id="password" placeholder="Password">
    </div>
    <?=isError($errores,'no_login');?>
    <div class="campo enviar">
        <input type="hidden" id="tipo" value="login">
        <input type="submit" class="boton" value="Iniciar Sesión"><a href="../../inicio.php">
        <input type="button" value="Cancelar" class="boton"></a>
    </div>
</form>
</div>
</body>
</html>