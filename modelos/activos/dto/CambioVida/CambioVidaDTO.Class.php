<?php
 class CambioVidaDTO {
    private $Id_cambiovida;
    private $fechacambio;
    private $nuevosmeses;
    private $saldoMOI;
    private $saldoDepreciacion;
    private $Id_Activo;
    private $fechaalta;
    private $TipoDepreciacion;
    public function getId_cambiovida(){
        return $this->Id_cambiovida;
    }
    public function setId_cambiovida($Id_cambiovida){
        $this->Id_cambiovida=$Id_cambiovida;
    }
    public function getFechacambio(){
        return $this->fechacambio;
    }
    public function setFechacambio($fechacambio){
        $this->fechacambio=$fechacambio;
    }
    public function getNuevosmeses(){
        return $this->nuevosmeses;
    }
    public function setNuevosmeses($nuevosmeses){
        $this->nuevosmeses=$nuevosmeses;
    }
    public function getSaldoMOI(){
        return $this->saldoMOI;
    }
    public function setSaldoMOI($saldoMOI){
        $this->saldoMOI=$saldoMOI;
    }
    public function getSaldoDepreciacion(){
        return $this->saldoDepreciacion;
    }
    public function setSaldoDepreciacion($saldoDepreciacion){
        $this->saldoDepreciacion=$saldoDepreciacion;
    }
    public function getId_Activo(){
        return $this->Id_Activo;
    }
    public function setId_Activo($Id_Activo){
        $this->Id_Activo=$Id_Activo;
    }
    public function getFechaalta(){
        return $this->fechaalta;
    }
    public function setFechaalta($fechaalta){
        $this->fechaalta=$fechaalta;
    }
    public function getTipoDepreciacion(){
        return $this->TipoDepreciacion;
    }
    public function setTipoDepreciacion($TipoDepreciacion){
        $this->TipoDepreciacion=$TipoDepreciacion;
    }
    public function toString(){
        return array("Id_cambiovida"=>$this->Id_cambiovida,
"fechacambio"=>$this->fechacambio,
"nuevosmeses"=>$this->nuevosmeses,
"saldoMOI"=>$this->saldoMOI,
"saldoDepreciacion"=>$this->saldoDepreciacion,
"Id_Activo"=>$this->Id_Activo,
"fechaalta"=>$this->fechaalta,
"TipoDepreciacion"=>$this->TipoDepreciacion);
    }
}
?>