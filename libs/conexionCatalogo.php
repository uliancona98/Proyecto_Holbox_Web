<?php
                    /*Carga las imagenes de LOS USUARIOS*/
function consultar($sentencia){
                     include('core/Conexion.php');      
                    $query = "SELECT * FROM restaurantes"." " . $sentencia;
                    $conexion= getConexion();                  
                    if($conexion){
                        $arrayRestaurantes = array();
                        $resultado = $conexion->query($query);
                        if (!empty($resultado)) {
                            while($row = $resultado->fetch_assoc()){                     
                                $bandera = true;
                                $arrayRestaurantes[]=$row;
                            }
                            return $arrayRestaurantes;
                        }else{
                            console.log("No hay restaurantes para mostrar");
                        }
                    }else{
                        console.log( "Conexion con la base de datos fallida");
                    }

return $arrayRestaurantes;
}
?> 