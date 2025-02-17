<?php
 class Siga_correosDTO {
    private $Cadena_Mail;
    private $Cadena_Mail_Copia;
    private $Cadena_Mail_Copia_Oculta;
    private $Cadena_Archivos;
    private $Subject;
    private $Mensaje;
    private $Correo_Envio;
    private $Pass_Correo_Envio;
    private $Cadena_Archivos_Nombre;
    public function getCadena_Mail(){
        return $this->Cadena_Mail;
    }
    public function setCadena_Mail($Cadena_Mail){
        $this->Cadena_Mail=$Cadena_Mail;
    }
    public function getCadena_Mail_Copia(){
        return $this->Cadena_Mail_Copia;
    }
    public function setCadena_Mail_Copia($Cadena_Mail_Copia){
        $this->Cadena_Mail_Copia=$Cadena_Mail_Copia;
    }
    public function getCadena_Mail_Copia_Oculta(){
        return $this->Cadena_Mail_Copia_Oculta;
    }
    public function setCadena_Mail_Copia_Oculta($Cadena_Mail_Copia_Oculta){
        $this->Cadena_Mail_Copia_Oculta=$Cadena_Mail_Copia_Oculta;
    }
    public function getCadena_Archivos(){
        return $this->Cadena_Archivos;
    }
    public function setCadena_Archivos($Cadena_Archivos){
        $this->Cadena_Archivos=$Cadena_Archivos;
    }
    public function getSubject(){
        return $this->Subject;
    }
    public function setSubject($Subject){
        $this->Subject=$Subject;
    }
    public function getMensaje(){
        return $this->Mensaje;
    }
    public function setMensaje($Mensaje){
        $this->Mensaje=$Mensaje;
    }
    public function getCorreo_Envio(){
        return $this->Correo_Envio;
    }
    public function setCorreo_Envio($Correo_Envio){
        $this->Correo_Envio=$Correo_Envio;
    }
    public function getPass_Correo_Envio(){
        return $this->Pass_Correo_Envio;
    }
    public function setPass_Correo_Envio($Pass_Correo_Envio){
        $this->Pass_Correo_Envio=$Pass_Correo_Envio;
    }
    public function getCadena_Archivos_Nombre(){
        return $this->Cadena_Archivos_Nombre;
    }
    public function setCadena_Archivos_Nombre($Cadena_Archivos_Nombre){
        $this->Cadena_Archivos_Nombre=$Cadena_Archivos_Nombre;
    }
    public function toString(){
        return array("Cadena_Mail"=>$this->Cadena_Mail,
"Cadena_Mail_Copia"=>$this->Cadena_Mail_Copia,
"Cadena_Mail_Copia_Oculta"=>$this->Cadena_Mail_Copia_Oculta,
"Cadena_Archivos"=>$this->Cadena_Archivos,
"Subject"=>$this->Subject,
"Mensaje"=>$this->Mensaje,
"Correo_Envio"=>$this->Correo_Envio,
"Pass_Correo_Envio"=>$this->Pass_Correo_Envio,
"Cadena_Archivos_Nombre"=>$this->Cadena_Archivos_Nombre);
    }
}
?>