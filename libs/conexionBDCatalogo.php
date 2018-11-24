  <?php
    $conexion = new mysqli("localhost", "wendy", "contraseña", "magic_holbox");
    if(!$conexion){
        echo "Conexion no exitosa";
    }

?>