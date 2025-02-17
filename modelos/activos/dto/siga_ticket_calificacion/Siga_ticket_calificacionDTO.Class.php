<?php
 class Siga_ticket_calificacionDTO {
    private $Id_CalificaTicket;
    private $Id_Solicitud;
    private $Id_Pregunta1;
    private $Id_Respuesta1;
    private $Desc_Comentario1;
    private $Id_Pregunta2;
    private $Id_Respuesta2;
    private $Desc_Comentario2;
    private $Id_Pregunta3;
    private $Id_Respuesta3;
    private $Desc_Comentario3;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
	private $Archivo_Binario;
    public function getId_CalificaTicket(){
        return $this->Id_CalificaTicket;
    }
    public function setId_CalificaTicket($Id_CalificaTicket){
        $this->Id_CalificaTicket=$Id_CalificaTicket;
    }
    public function getId_Solicitud(){
        return $this->Id_Solicitud;
    }
    public function setId_Solicitud($Id_Solicitud){
        $this->Id_Solicitud=$Id_Solicitud;
    }
    public function getId_Pregunta1(){
        return $this->Id_Pregunta1;
    }
    public function setId_Pregunta1($Id_Pregunta1){
        $this->Id_Pregunta1=$Id_Pregunta1;
    }
    public function getId_Respuesta1(){
        return $this->Id_Respuesta1;
    }
    public function setId_Respuesta1($Id_Respuesta1){
        $this->Id_Respuesta1=$Id_Respuesta1;
    }
    public function getDesc_Comentario1(){
        return $this->Desc_Comentario1;
    }
    public function setDesc_Comentario1($Desc_Comentario1){
        $this->Desc_Comentario1=$Desc_Comentario1;
    }
    public function getId_Pregunta2(){
        return $this->Id_Pregunta2;
    }
    public function setId_Pregunta2($Id_Pregunta2){
        $this->Id_Pregunta2=$Id_Pregunta2;
    }
    public function getId_Respuesta2(){
        return $this->Id_Respuesta2;
    }
    public function setId_Respuesta2($Id_Respuesta2){
        $this->Id_Respuesta2=$Id_Respuesta2;
    }
    public function getDesc_Comentario2(){
        return $this->Desc_Comentario2;
    }
    public function setDesc_Comentario2($Desc_Comentario2){
        $this->Desc_Comentario2=$Desc_Comentario2;
    }
    public function getId_Pregunta3(){
        return $this->Id_Pregunta3;
    }
    public function setId_Pregunta3($Id_Pregunta3){
        $this->Id_Pregunta3=$Id_Pregunta3;
    }
    public function getId_Respuesta3(){
        return $this->Id_Respuesta3;
    }
    public function setId_Respuesta3($Id_Respuesta3){
        $this->Id_Respuesta3=$Id_Respuesta3;
    }
    public function getDesc_Comentario3(){
        return $this->Desc_Comentario3;
    }
    public function setDesc_Comentario3($Desc_Comentario3){
        $this->Desc_Comentario3=$Desc_Comentario3;
    }
    public function getFech_Inser(){
        return $this->Fech_Inser;
    }
    public function setFech_Inser($Fech_Inser){
        $this->Fech_Inser=$Fech_Inser;
    }
    public function getUsr_Inser(){
        return $this->Usr_Inser;
    }
    public function setUsr_Inser($Usr_Inser){
        $this->Usr_Inser=$Usr_Inser;
    }
    public function getFech_Mod(){
        return $this->Fech_Mod;
    }
    public function setFech_Mod($Fech_Mod){
        $this->Fech_Mod=$Fech_Mod;
    }
    public function getUsr_Mod(){
        return $this->Usr_Mod;
    }
    public function setUsr_Mod($Usr_Mod){
        $this->Usr_Mod=$Usr_Mod;
    }
    public function getEstatus_Reg(){
        return $this->Estatus_Reg;
    }
    public function setEstatus_Reg($Estatus_Reg){
        $this->Estatus_Reg=$Estatus_Reg;
    }
		public function getArchivo_Binario(){
        return $this->Archivo_Binario;
    }
    public function setArchivo_Binario($Archivo_Binario){
        $this->Archivo_Binario=$Archivo_Binario;
    }
    public function toString(){
        return array("Id_CalificaTicket"=>$this->Id_CalificaTicket,
"Id_Solicitud"=>$this->Id_Solicitud,
"Id_Pregunta1"=>$this->Id_Pregunta1,
"Id_Respuesta1"=>$this->Id_Respuesta1,
"Desc_Comentario1"=>$this->Desc_Comentario1,
"Id_Pregunta2"=>$this->Id_Pregunta2,
"Id_Respuesta2"=>$this->Id_Respuesta2,
"Desc_Comentario2"=>$this->Desc_Comentario2,
"Id_Pregunta3"=>$this->Id_Pregunta3,
"Id_Respuesta3"=>$this->Id_Respuesta3,
"Desc_Comentario3"=>$this->Desc_Comentario3,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"Archivo_Binario"=>$this->Archivo_Binario
);
    }
}
?>