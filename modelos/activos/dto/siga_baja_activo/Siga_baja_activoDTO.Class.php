<?php
 class Siga_baja_activoDTO {
    private $Id_Activo;
	private $Id_baja;
    private $Id_ActSeg_Dir_Adminisivo;
    private $Motivo_Baja;
    private $Comentarios;
    private $Destino;
    private $Fecha_Baja;
    private $Usuario;
	
	private $Seg_Sol_Baja;
    private $Seg_Resp_Area_Ges;
    private $Seg_Dir_Adminis;
	private $Cuenta_baja;
	private $Jefe_Area;
	private $Seg_Usuario_Resp;
	
    public function getId_baja(){
        return $this->Id_baja;
    }
    public function setId_baja($Id_baja){
        $this->Id_baja=$Id_baja;
    }
    public function getId_Activo(){
        return $this->Id_Activo;
    }
    public function setId_Activo($Id_Activo){
        $this->Id_Activo=$Id_Activo;
    }
    public function getMotivo_Baja(){
        return $this->Motivo_Baja;
    }
    public function setMotivo_Baja($Motivo_Baja){
        $this->Motivo_Baja=$Motivo_Baja;
    }
    public function getComentarios(){
        return $this->Comentarios;
    }
    public function setComentarios($Comentarios){
        $this->Comentarios=$Comentarios;
    }
    public function getDestino(){
        return $this->Destino;
    }
    public function setDestino($Destino){
        $this->Destino=$Destino;
    }
    public function getFecha_Baja(){
        return $this->Fecha_Baja;
    }
    public function setFecha_Baja($Fecha_Baja){
        $this->Fecha_Baja=$Fecha_Baja;
    }
    public function getUsuario(){
        return $this->Usuario;
    }
    public function setUsuario($Usuario){
        $this->Usuario=$Usuario;
    }
	public function getSeg_Sol_Baja(){
        return $this->Seg_Sol_Baja;
    }
    public function setSeg_Sol_Baja($Seg_Sol_Baja){
        $this->Seg_Sol_Baja=$Seg_Sol_Baja;
    }
	public function getSeg_Resp_Area_Ges(){
        return $this->Seg_Resp_Area_Ges;
    }
    public function setSeg_Resp_Area_Ges($Seg_Resp_Area_Ges){
        $this->Seg_Resp_Area_Ges=$Seg_Resp_Area_Ges;
    }
	public function getSeg_Dir_Adminis(){
        return $this->Seg_Dir_Adminis;
    }
    public function setSeg_Dir_Adminis($Seg_Dir_Adminis){
        $this->Seg_Dir_Adminis=$Seg_Dir_Adminis;
    }
	public function getCuenta_baja(){
        return $this->Cuenta_baja;
    }
    public function setCuenta_baja($Cuenta_baja){
        $this->Cuenta_baja=$Cuenta_baja;
    }
	public function getJefe_Area(){
        return $this->Jefe_Area;
    }
    public function setJefe_Area($Jefe_Area){
        $this->Jefe_Area=$Jefe_Area;
    }
	public function getSeg_Usuario_Resp(){
        return $this->Seg_Usuario_Resp;
    }
    public function setSeg_Usuario_Resp($Seg_Usuario_Resp){
        $this->Seg_Usuario_Resp=$Seg_Usuario_Resp;
    }	
    public function toString(){
        return array("Id_baja"=>$this->Id_baja,
"Id_Activo"=>$this->Id_Activo,
"Motivo_Baja"=>$this->Motivo_Baja,
"Comentarios"=>$this->Comentarios,
"Destino"=>$this->Destino,
"Fecha_Baja"=>$this->Fecha_Baja,
"Usuario"=>$this->Usuario,
"Seg_Sol_Baja"=>$this->Seg_Sol_Baja,
"Seg_Resp_Area_Ges"=>$this->Seg_Resp_Area_Ges,
"Seg_Dir_Adminis"=>$this->Seg_Dir_Adminis,
"Cuenta_baja"=>$this->Cuenta_baja,
"Jefe_Area"=>$this->Jefe_Area,
"Seg_Usuario_Resp"=>$this->Seg_Usuario_Resp
);
    }
}
?>