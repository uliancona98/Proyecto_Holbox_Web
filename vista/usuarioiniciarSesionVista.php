<?php
/**
* Vista de la pagina de busqueda
*
* Contiene la plantilla para presentar la pagina de busqueda de recursos
*
* @package recurso
* @author Victor Hugo Menendez Dominguez <mdoming@uady.mx>
* @version 1.5
* @date 20/Abril/2009
**/
?>

<html>
<head>
	<title><?php echo $aplicacion; ?></title>
</head>
<body>
	<h1><?=$titulo?></h1>
	<form action= "<?php echo $url_base;?>usuario/validar" method= "post">
    		<p>Usuario: <input type="text" name='user'/></p>
        
		<p>Contrase&ntilde;a: <input type="password" name='password'/></p>
        <p><input type="submit" name="button" value="Enviar"></p>
	</form>
</body>