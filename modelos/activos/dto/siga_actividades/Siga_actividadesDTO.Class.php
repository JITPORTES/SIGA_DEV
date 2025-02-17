<?php
 class Siga_actividadesDTO {
    private $Id_Actividad;
    private $Id_Area;
    private $Tipo_Actividad;
    private $Id_Activo;
    private $Nombre_Rutina;
    private $Id_Frecuencia;
	  private $Desc_Frec;
    private $Descripcion;
		private $Id_Gestor;
		private $Nombre_Ejecutante;
    private $Realiza;
    private $url_documentos_adjuntos;
    private $vincular_mesa_ayuda;
    private $Usuario_Responsable;
    private $Motivo_Servicio;
    private $Fecha_Programada;
    private $Fecha_Realizada;
    private $Mant_RAC1;
    private $Mant_RAC2;
    private $Mant_RAC3;
    private $Mant_RAC4;
	  private $Cantidad_1;
    private $Cantidad_2;
    private $Cantidad_3;
    private $Cantidad_4;
	  private $Costo_1;
    private $Costo_2;
    private $Costo_3;
    private $Costo_4;
    private $Horas;
    private $Costos_Materiales_CE;
    private $Mano_Obra_CE;
    private $Total_CE;
    private $Costos_Materiales_CI;
    private $Mano_Obra_CI;
    private $Total_CI;
    private $Ahorro;
    private $Comentarios;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
	  private $Id_Motivo_Real;
    private $Gestor_Asignado;
		private $Responsable_Activo;
		private $Campo_1;
    private $Campo_2;
    private $Campo_3;
    private $Campo_4;
    private $Campo_5;
    private $Campo_6;
		
	private $AF_BC;
    public function getId_Actividad(){
        return $this->Id_Actividad;
    }
    public function setId_Actividad($Id_Actividad){
        $this->Id_Actividad=$Id_Actividad;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getTipo_Actividad(){
        return $this->Tipo_Actividad;
    }
    public function setTipo_Actividad($Tipo_Actividad){
        $this->Tipo_Actividad=$Tipo_Actividad;
    }
    public function getId_Activo(){
        return $this->Id_Activo;
    }
    public function setId_Activo($Id_Activo){
        $this->Id_Activo=$Id_Activo;
    }
    public function getNombre_Rutina(){
        return $this->Nombre_Rutina;
    }
    public function setNombre_Rutina($Nombre_Rutina){
        $this->Nombre_Rutina=$Nombre_Rutina;
    }
    public function getId_Frecuencia(){
        return $this->Id_Frecuencia;
    }
    public function setId_Frecuencia($Id_Frecuencia){
        $this->Id_Frecuencia=$Id_Frecuencia;
    }
	public function getDesc_Frec(){
        return $this->Desc_Frec;
    }
    public function setDesc_Frec($Desc_Frec){
        $this->Desc_Frec=$Desc_Frec;
    }
    public function getDescripcion(){
        return $this->Descripcion;
    }
    public function setDescripcion($Descripcion){
        $this->Descripcion=$Descripcion;
    }
		public function getId_Gestor(){
        return $this->Id_Gestor;
    }
    public function setId_Gestor($Id_Gestor){
        $this->Id_Gestor=$Id_Gestor;
    }
		public function getNombre_Ejecutante(){
        return $this->Nombre_Ejecutante;
    }
    public function setNombre_Ejecutante($Nombre_Ejecutante){
        $this->Nombre_Ejecutante=$Nombre_Ejecutante;
    }
    public function getRealiza(){
        return $this->Realiza;
    }
    public function setRealiza($Realiza){
        $this->Realiza=$Realiza;
    }
    public function getUrl_documentos_adjuntos(){
        return $this->url_documentos_adjuntos;
    }
    public function setUrl_documentos_adjuntos($url_documentos_adjuntos){
        $this->url_documentos_adjuntos=$url_documentos_adjuntos;
    }
    public function getVincular_mesa_ayuda(){
        return $this->vincular_mesa_ayuda;
    }
    public function setVincular_mesa_ayuda($vincular_mesa_ayuda){
        $this->vincular_mesa_ayuda=$vincular_mesa_ayuda;
    }
    public function getUsuario_Responsable(){
        return $this->Usuario_Responsable;
    }
    public function setUsuario_Responsable($Usuario_Responsable){
        $this->Usuario_Responsable=$Usuario_Responsable;
    }
    public function getMotivo_Servicio(){
        return $this->Motivo_Servicio;
    }
    public function setMotivo_Servicio($Motivo_Servicio){
        $this->Motivo_Servicio=$Motivo_Servicio;
    }
    public function getFecha_Programada(){
        return $this->Fecha_Programada;
    }
    public function setFecha_Programada($Fecha_Programada){
        $this->Fecha_Programada=$Fecha_Programada;
    }
    public function getFecha_Realizada(){
        return $this->Fecha_Realizada;
    }
    public function setFecha_Realizada($Fecha_Realizada){
        $this->Fecha_Realizada=$Fecha_Realizada;
    }
    public function getMant_RAC1(){
        return $this->Mant_RAC1;
    }
    public function setMant_RAC1($Mant_RAC1){
        $this->Mant_RAC1=$Mant_RAC1;
    }
    public function getMant_RAC2(){
        return $this->Mant_RAC2;
    }
    public function setMant_RAC2($Mant_RAC2){
        $this->Mant_RAC2=$Mant_RAC2;
    }
    public function getMant_RAC3(){
        return $this->Mant_RAC3;
    }
    public function setMant_RAC3($Mant_RAC3){
        $this->Mant_RAC3=$Mant_RAC3;
    }
    public function getMant_RAC4(){
        return $this->Mant_RAC4;
    }
    public function setMant_RAC4($Mant_RAC4){
        $this->Mant_RAC4=$Mant_RAC4;
    }
	public function getCantidad_1(){
        return $this->Cantidad_1;
    }
    public function setCantidad_1($Cantidad_1){
        $this->Cantidad_1=$Cantidad_1;
    }
	public function getCantidad_2(){
        return $this->Cantidad_2;
    }
    public function setCantidad_2($Cantidad_2){
        $this->Cantidad_2=$Cantidad_2;
    }
	public function getCantidad_3(){
        return $this->Cantidad_3;
    }
    public function setCantidad_3($Cantidad_3){
        $this->Cantidad_3=$Cantidad_3;
    }
	public function getCantidad_4(){
        return $this->Cantidad_4;
    }
    public function setCantidad_4($Cantidad_4){
        $this->Cantidad_4=$Cantidad_4;
    }
	public function getCosto_1(){
        return $this->Costo_1;
    }
    public function setCosto_1($Costo_1){
        $this->Costo_1=$Costo_1;
    }
	public function getCosto_2(){
        return $this->Costo_2;
    }
    public function setCosto_2($Costo_2){
        $this->Costo_2=$Costo_2;
    }
	public function getCosto_3(){
        return $this->Costo_3;
    }
    public function setCosto_3($Costo_3){
        $this->Costo_3=$Costo_3;
    }
	public function getCosto_4(){
        return $this->Costo_4;
    }
    public function setCosto_4($Costo_4){
        $this->Costo_4=$Costo_4;
    }
    public function getHoras(){
        return $this->Horas;
    }
    public function setHoras($Horas){
        $this->Horas=$Horas;
    }
    public function getCostos_Materiales_CE(){
        return $this->Costos_Materiales_CE;
    }
    public function setCostos_Materiales_CE($Costos_Materiales_CE){
        $this->Costos_Materiales_CE=$Costos_Materiales_CE;
    }
    public function getMano_Obra_CE(){
        return $this->Mano_Obra_CE;
    }
    public function setMano_Obra_CE($Mano_Obra_CE){
        $this->Mano_Obra_CE=$Mano_Obra_CE;
    }
    public function getTotal_CE(){
        return $this->Total_CE;
    }
    public function setTotal_CE($Total_CE){
        $this->Total_CE=$Total_CE;
    }
    public function getCostos_Materiales_CI(){
        return $this->Costos_Materiales_CI;
    }
    public function setCostos_Materiales_CI($Costos_Materiales_CI){
        $this->Costos_Materiales_CI=$Costos_Materiales_CI;
    }
    public function getMano_Obra_CI(){
        return $this->Mano_Obra_CI;
    }
    public function setMano_Obra_CI($Mano_Obra_CI){
        $this->Mano_Obra_CI=$Mano_Obra_CI;
    }
    public function getTotal_CI(){
        return $this->Total_CI;
    }
    public function setTotal_CI($Total_CI){
        $this->Total_CI=$Total_CI;
    }
    public function getAhorro(){
        return $this->Ahorro;
    }
    public function setAhorro($Ahorro){
        $this->Ahorro=$Ahorro;
    }
    public function getComentarios(){
        return $this->Comentarios;
    }
    public function setComentarios($Comentarios){
        $this->Comentarios=$Comentarios;
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
		public function getId_Motivo_Real(){
        return $this->Id_Motivo_Real;
    }
    public function setId_Motivo_Real($Id_Motivo_Real){
        $this->Id_Motivo_Real=$Id_Motivo_Real;
    }
		public function getResponsable_Activo(){
        return $this->Responsable_Activo;
    }
    public function setResponsable_Activo($Responsable_Activo){
        $this->Responsable_Activo=$Responsable_Activo;
    }
		public function getGestor_Asignado(){
        return $this->Gestor_Asignado;
    }
    public function setGestor_Asignado($Gestor_Asignado){
        $this->Gestor_Asignado=$Gestor_Asignado;
    }
    public function getCampo_1(){
        return $this->Campo_1;
    }
    public function setCampo_1($Campo_1){
        $this->Campo_1=$Campo_1;
    }
    public function getCampo_2(){
        return $this->Campo_2;
    }
    public function setCampo_2($Campo_2){
        $this->Campo_2=$Campo_2;
    }
    public function getCampo_3(){
        return $this->Campo_3;
    }
    public function setCampo_3($Campo_3){
        $this->Campo_3=$Campo_3;
    }
    public function getCampo_4(){
        return $this->Campo_4;
    }
    public function setCampo_4($Campo_4){
        $this->Campo_4=$Campo_4;
    }
    public function getCampo_5(){
        return $this->Campo_5;
    }
    public function setCampo_5($Campo_5){
        $this->Campo_5=$Campo_5;
    }
    public function getCampo_6(){
        return $this->Campo_6;
    }
    public function setCampo_6($Campo_6){
        $this->Campo_6=$Campo_6;
    }
	
	public function getAF_BC(){
        return $this->AF_BC;
    }
    public function setAF_BC($AF_BC){
        $this->AF_BC=$AF_BC;
    }
    public function toString(){
        return array("Id_Actividad"=>$this->Id_Actividad,
"Id_Area"=>$this->Id_Area,
"Tipo_Actividad"=>$this->Tipo_Actividad,
"Id_Activo"=>$this->Id_Activo,
"Nombre_Rutina"=>$this->Nombre_Rutina,
"Id_Frecuencia"=>$this->Id_Frecuencia,
"Desc_Frec"=>$this->Desc_Frec,
"Descripcion"=>$this->Descripcion,
"Id_Gestor"=>$this->Id_Gestor,
"Nombre_Ejecutante"=>$this->Nombre_Ejecutante,
"Realiza"=>$this->Realiza,
"url_documentos_adjuntos"=>$this->url_documentos_adjuntos,
"vincular_mesa_ayuda"=>$this->vincular_mesa_ayuda,
"Usuario_Responsable"=>$this->Usuario_Responsable,
"Motivo_Servicio"=>$this->Motivo_Servicio,
"Fecha_Programada"=>$this->Fecha_Programada,
"Fecha_Realizada"=>$this->Fecha_Realizada,
"Mant_RAC1"=>$this->Mant_RAC1,
"Mant_RAC2"=>$this->Mant_RAC2,
"Mant_RAC3"=>$this->Mant_RAC3,
"Mant_RAC4"=>$this->Mant_RAC4,
"Cantidad_1"=>$this->Cantidad_1,
"Cantidad_2"=>$this->Cantidad_2,
"Cantidad_3"=>$this->Cantidad_3,
"Cantidad_4"=>$this->Cantidad_4,
"Costo_1"=>$this->Costo_1,
"Costo_2"=>$this->Costo_2,
"Costo_3"=>$this->Costo_3,
"Costo_4"=>$this->Costo_4,
"Horas"=>$this->Horas,
"Costos_Materiales_CE"=>$this->Costos_Materiales_CE,
"Mano_Obra_CE"=>$this->Mano_Obra_CE,
"Total_CE"=>$this->Total_CE,
"Costos_Materiales_CI"=>$this->Costos_Materiales_CI,
"Mano_Obra_CI"=>$this->Mano_Obra_CI,
"Total_CI"=>$this->Total_CI,
"Ahorro"=>$this->Ahorro,
"Comentarios"=>$this->Comentarios,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"Id_Motivo_Real"=>$this->Id_Motivo_Real,
"Gestor_Asignado"=>$this->Gestor_Asignado,
"Responsable_Activo"=>$this->Responsable_Activo,
"Campo_1"=>$this->Campo_1,
"Campo_2"=>$this->Campo_2,
"Campo_3"=>$this->Campo_3,
"Campo_4"=>$this->Campo_4,
"Campo_5"=>$this->Campo_5,
"Campo_6"=>$this->Campo_6,
"AF_BC"=>$this->AF_BC);
    }
}
?>