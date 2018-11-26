<?php
                    /*Carga las imagenes de LOS USUARIOS*/
function consultar($sentencia){
                     include("../config/conexion2.php");      
                    $query = "SELECT * FROM restaurantes"." " . $sentencia;
                                      
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
                            echo "No hay restaurantes para mostrar";
                        }
                    }else{
                        echo "Conexion con la base de datos fallida";
                    }

return $arrayRestaurantes;
}
?> 