<?php
include("conexionCatalogo.php");

if($_SERVER['REQUEST_METHOD']==="POST"){

    if(isset($_POST["buscar"])){
        if(empty($_POST)){
            echo ("Selecciona algo porfavor");
        }
        else{
            realizarBusqueda();
        }
    }
}

function presentarFormData(){
   print_r($_POST); 
}

function realizarBusqueda(){
    $parametros= array();

    $cadenaInicial= "WHERE";
    
    //SELECT * FROM `restaurantes` WHERE `precio`= "Costoso" AND `tipo` = "Restaurantes"
       
       if(isset($_POST["tipoRest"])) {
            $inicial= array(); 
            for($i=0 ; $i<count($_POST["tipoRest"]);$i++){
                $temp= "tipo = '" . $_POST["tipoRest"][$i] . " ' ";
                array_push($inicial, $temp);
            }
           
            $contenido = implode(" OR ", $inicial); 
            array_push($parametros, $contenido);           
       }

       if(isset($_POST["precioRest"])) {
           $inicial= array(); 
            for($i=0 ; $i<count($_POST["precioRest"]);$i++){
                $temp= "precio = '" . $_POST["precioRest"][$i] . " ' ";
                array_push($inicial, $temp);
            }
           
            $contenido = implode(" OR ", $inicial); 
            array_push($parametros, $contenido);  
       }

        $finales= implode(" AND ", $parametros);
        $cadenaConsulta= $cadenaInicial ." ". $finales;

       $resultados= consultar($cadenaConsulta);
       for($i=0; $i< count($resultados); $i++){
            presentarResuldatos($resultados[$i]);
       }

}

function presentarResuldatos($rest){
    switch ($rest['precio']) {
        case 'Costoso':
            $precio= "$$$";
            break;
        case 'Medio':
            $precio= "$$";
            break;
        case 'Economico':
            $precio= "$";
            break;
        default:
            break;
    }
    //<img src="data:image/jpg;base64,<?php echo base64_encode($arrayPublicaciones[$i]['imagen']);" alt="mangle" style="width:90%"/>
     //<img src="data:image/jpg;base64,".{$rest['imagen']} alt="{$rest['nombre']}" style="width:100%">
 $columnas= <<<XYZ
            <div class="contenedor-restaurante">
               
                <div class="descripcion" >
                    <div class="item name" > {$rest['nombre']} </div>
                    <div class="item price">{$precio}</div>
                    <div class="item horario">{$rest['horarioAbierto']}-{$rest['horarioCerrado']} </div>
                    <div class="item telefono">{$rest['direccion']} </div>
                </div>

                <span class="infoAdicional">
                 {$rest['direccion']}
                </span>
            </div>
XYZ;
echo $columnas;
}

?>