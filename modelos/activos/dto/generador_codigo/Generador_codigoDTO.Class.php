<?php
 class Generador_codigoDTO {
    private $nombre_tabla;
    public function getNombre_tabla(){
        return $this->nombre_tabla;
    }
    public function setNombre_tabla($nombre_tabla){
        $this->nombre_tabla=$nombre_tabla;
    }
    public function toString(){
        return array("nombre_tabla"=>$this->nombre_tabla);
    }
}
?>