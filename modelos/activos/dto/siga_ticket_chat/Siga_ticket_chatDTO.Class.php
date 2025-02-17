<?php
 class Siga_ticket_chatDTO {
    private $Id_Chat;
    private $Id_Solicitud;
    private $Id_UsuarioGestor;
    private $Id_Usuario;
    private $Nombre_Gestor;
    private $Nombre_Usuario;
    private $Fecha_Alta;
    private $Mensaje;
		private $Id_Estatus_Proceso;
		private $Url_Adjunto;
		private $No_Empl_Gestor;
		private $No_Empl_Solicitante;
		private $Id_Cirugia;
		private $Gestor_Assist;
		private $Usuario_Assist;
		private $Iniciar_SLA_Juridico;
		private $Adjuntos;
		
    public function getId_Chat(){
        return $this->Id_Chat;
    }
    public function setId_Chat($Id_Chat){
        $this->Id_Chat=$Id_Chat;
    }
    public function getId_Solicitud(){
        return $this->Id_Solicitud;
    }
    public function setId_Solicitud($Id_Solicitud){
        $this->Id_Solicitud=$Id_Solicitud;
    }
    public function getId_UsuarioGestor(){
        return $this->Id_UsuarioGestor;
    }
    public function setId_UsuarioGestor($Id_UsuarioGestor){
        $this->Id_UsuarioGestor=$Id_UsuarioGestor;
    }
    public function getId_Usuario(){
        return $this->Id_Usuario;
    }
    public function setId_Usuario($Id_Usuario){
        $this->Id_Usuario=$Id_Usuario;
    }
    public function getNombre_Gestor(){
        return $this->Nombre_Gestor;
    }
    public function setNombre_Gestor($Nombre_Gestor){
        $this->Nombre_Gestor=$Nombre_Gestor;
    }
    public function getNombre_Usuario(){
        return $this->Nombre_Usuario;
    }
    public function setNombre_Usuario($Nombre_Usuario){
        $this->Nombre_Usuario=$Nombre_Usuario;
    }
    public function getFecha_Alta(){
        return $this->Fecha_Alta;
    }
    public function setFecha_Alta($Fecha_Alta){
        $this->Fecha_Alta=$Fecha_Alta;
    }
    public function getMensaje(){
        return $this->Mensaje;
    }
    public function setMensaje($Mensaje){
        $this->Mensaje=$Mensaje;
    }
	
	public function getId_Estatus_Proceso(){
        return $this->Id_Estatus_Proceso;
    }
    public function setId_Estatus_Proceso($Id_Estatus_Proceso){
        $this->Id_Estatus_Proceso=$Id_Estatus_Proceso;
    }
	
	public function getUrl_Adjunto(){
        return $this->Url_Adjunto;
    }
    public function setUrl_Adjunto($Url_Adjunto){
        $this->Url_Adjunto=$Url_Adjunto;
    }
	
	public function getNo_Empl_Gestor(){
        return $this->No_Empl_Gestor;
    }
    public function setNo_Empl_Gestor($No_Empl_Gestor){
        $this->No_Empl_Gestor=$No_Empl_Gestor;
    }
	
		public function getNo_Empl_Solicitante(){
        return $this->No_Empl_Solicitante;
    }
    public function setNo_Empl_Solicitante($No_Empl_Solicitante){
        $this->No_Empl_Solicitante=$No_Empl_Solicitante;
    }
		
		public function getId_Cirugia(){
        return $this->Id_Cirugia;
    }
    public function setId_Cirugia($Id_Cirugia){
        $this->Id_Cirugia=$Id_Cirugia;
    }
		
		public function getGestor_Assist(){
        return $this->Gestor_Assist;
    }
    public function setGestor_Assist($Gestor_Assist){
        $this->Gestor_Assist=$Gestor_Assist;
    }
		
		public function getUsuario_Assist(){
        return $this->Usuario_Assist;
    }
		
    public function setUsuario_Assist($Usuario_Assist){
        $this->Usuario_Assist=$Usuario_Assist;
    }
		
    public function getIniciar_SLA_Juridico(){
        return $this->Iniciar_SLA_Juridico;
    }
    
    public function setIniciar_SLA_Juridico($Iniciar_SLA_Juridico){
        $this->Iniciar_SLA_Juridico=$Iniciar_SLA_Juridico;
    }
		
		public function getAdjuntos(){
        return $this->Adjuntos;
    }
    
    public function setAdjuntos($Adjuntos){
        $this->Adjuntos=$Adjuntos;
    }
    public function toString(){
        return array("Id_Chat"=>$this->Id_Chat,
"Id_Solicitud"=>$this->Id_Solicitud,
"Gestor_Assist"=>$this->Gestor_Assist,
"Usuario_Assist"=>$this->Usuario_Assist,
"Id_UsuarioGestor"=>$this->Id_UsuarioGestor,
"Id_Usuario"=>$this->Id_Usuario,
"Id_Cirugia"=>$this->Id_Cirugia,
"Nombre_Gestor"=>$this->Nombre_Gestor,
"Nombre_Usuario"=>$this->Nombre_Usuario,
"Fecha_Alta"=>$this->Fecha_Alta,
"Mensaje"=>$this->Mensaje,
"Id_Estatus_Proceso"=>$this->Id_Estatus_Proceso, 
"Url_Adjunto"=>$this->Url_Adjunto,
"No_Empl_Gestor"=>$this->No_Empl_Gestor,
"No_Empl_Solicitante"=>$this->No_Empl_Solicitante,
"Iniciar_SLA_Juridico"=>$this->Iniciar_SLA_Juridico,
"Adjuntos"=>$this->Adjuntos
);
	}
}
?>