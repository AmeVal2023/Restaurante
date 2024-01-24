<?php

class panel{



    

    public function ObtenerArticulo($categoriaid){
        global $wpdb;
        $tabla = "{$wpdb->prefix}app_articulos";
        $query = "SELECT * FROM $tabla WHERE categoriaid = '$categoriaid'";
        $datos = $wpdb->get_results($query,ARRAY_A);
        if(empty($datos)){
            $datos = array();
        }
        return $datos;
    }


    public function formOpen($titulo){
        $html = "
            <div class='wrap'>
                <h4> $titulo</h4>
                <br>
                <form method='POST'>

        ";

        return $html;
    }


    public function formClose(){
        $html = "
              <br>
                 <input type='submit' id='btnguardar' name='btnguardar' class='page-title-action' value='enviar'>
            </form>
          </div>  
        ";

        return $html;
    }


    function fromInput($detalleid,$pregunta,$tipo){
        $html="";
        if($tipo == 1){
            $html="
                <diV class='from-group'>
                    <p><b>$pregunta</b></p>
                  <div class='col-sm-8'>  
                        <select class='from-control' id='$detalleid' name='$detalleid'>
                                <option value='SI'>SI</option>
                                <option value='No'>NO</option>
                        </select>
                  </div>
            
            ";
        }elseif ($tipo == 2) {
            
        }else{

        }
        return $html;
    }


    function Armador($categoriaid){
        $enc = $this->ObtenerEncuesta($categoriaid);
         $nombre = $enc['Nombre'];
        //obtener todas las preguntas
        $preguntas = "";
        $listapregutas = $this->ObtenerEncuestaDetalle($categoriaid);
        foreach ($listapregutas as $key => $value) {
            $detalleid = $value['DetalleId'];
            $pregunta = $value['Pregunta'];
            $tipo =$value['Tipo'];
            $encid = $value['categoriaid'];

            if($encid == $categoriaid){
                $preguntas .= $this->fromInput($detalleid,$pregunta,$tipo);
            }
        }

        $html = $this->formOpen($nombre);
        $html .= $preguntas;
        $html .= $this->formClose();

        return $html;

    }


    function GuardarDetalle($datos){
        global $wpdb;
        $tabla = "{$wpdb->prefix}encuestas_respuesta"; 
        return  $wpdb->insert($tabla,$datos);
    }

    


}

?>