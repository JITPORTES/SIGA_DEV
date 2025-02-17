<?php
 class Siga_cat_ticket_adjuntosDTO {
    private $Id_Adjunto;
    private $Id_Chat;
    private $Url_Adjunto;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Adjunto(){
        return $this->Id_Adjunto;
    }
    public function setId_Adjunto($Id_Adjunto){
        $this->Id_Adjunto=$Id_Adjunto;
    }
    public function getId_Chat(){
        return $this->Id_Chat;
    }
    public function setId_Chat($Id_Chat){
        $this->Id_Chat=$Id_Chat;
    }
    public function getUrl_Adjunto(){
        return $this->Url_Adjunto;
    }
    public function setUrl_Adjunto($Url_Adjunto){
        $this->Url_Adjunto=$Url_Adjunto;
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
    public function toString(){
        return array("Id_Adjunto"=>$this->Id_Adjunto,
"Id_Chat"=>$this->Id_Chat,
"Url_Adjunto"=>$this->Url_Adjunto,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>