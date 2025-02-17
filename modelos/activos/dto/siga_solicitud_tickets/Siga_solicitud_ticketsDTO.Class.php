<?php
 class Siga_solicitud_ticketsDTO {
  private $Id_Solicitud;
	private $Id_Solicitud_Anterior;
	private $Asist_Especial;
  private $Id_Activo;
	private $AF_BC;
	private $Nombre_Activo;
	private $Foto;
	private $Desc_Lar_Activo;
	private $AF_BC_Activo;
	private $Id_Usuario;
	private $No_Usuario;
	private $Existe_Imagen;
  private $Id_Area;
	private $Id_Categoria;
	private $Id_Subcategoria;
  private $Id_Medio;
	private $Desc_Medio;
	private $Seccion;
  private $Titulo;
  private $Id_Actividad;
	private $Id_Det_Actividad;
  private $Desc_Motivo_Reporte;
  private $Prioridad;
  private $Url_archivo;
	private $Archivo_Binario;
	private $Archivo_Binario2;
	private $Archivo_Binario3;
	private $Archivo_Binario4;
  private $Fech_Inser;
  private $Usr_Inser;
  private $Fech_Mod;
  private $Usr_Mod;
  private $Estatus_Reg;
	private $Estatus_Proceso;
	private $Lo_Realiza;
	private $Id_Estatus_Proceso;
	private $Area;
	private $NombreSeccion;
	private $Categoria;
	private $Subcategoria;
	private $Motivo;
	private $Usuario;
  private $Id_Gestor;
	private $Nombre_Ejecutante;
	private $Id_Gestor_Reasignado;
	private $No_Gestor;
	private $Existe_Imagen_Gestor;
  private $Gestor;
	private $TituloCierre;	
	private $ComentarioCierre;
	private $ComentarioCierreGestor;
	private $Id_Motivo_Aparente;
	private $Desc_Motivo_Aparente;
	private $Id_Motivo_Real;	
	private $Desc_Motivo_Real;
	private $Id_Est_Equipo;
	private $Desc_Est_Equipo;
	private $Marca;
	private $Modelo;	
	private $No_Serie;
	private $Ubic_Prim;
	private $Ubic_Sec;
	private $Ubic_Esp;
	private $Fech_Solicitud;
	private $Fech_Seguimiento;
	private $Fech_Espera_Cierre;
	private $Fech_Cierre;
	private $Gestor_Finaliza;
	private $Nombre_Gestor;
	private $Direccion_Ip_Sol;
	private $No_Usuario_Inicial;
	private $Nombre_Usuario_Inicial;
	private $Activo_Externo;
	private $AF_BC_Ext;
	private $Nombre_Act_Ext;
	private $Marca_Act_Ext;
	private $Modelo_Act_Ext;
	private $No_Serie_Act_Ext;
	private $Id_Ubic_Prim;
	private $Desc_Ubic_Prim_Act_Ext;
	private $Id_Ubic_Sec;
	private $Desc_Ubic_Sec_Act_Ext;
	private $Cantidad_Equ_Ext;
	private $Pre_Re_Procedimiento;
	private $Pre_Re_Fecha_Hora_Cirugia;
	private $Pre_Re_Quirofano;
	private $Pre_Re_Paciente;
	private $Pre_Re_Cirujano;
	private $Empresa_Ext;
	private $Nombre_Completo_Ext;
	private $Telefono_Ext;
	private $Correo_Ext;
	private $Pre_Registro_Ext;
	private $Observ_Pre_Reg_Ext;
	private $Estatus_Recepcion;
	private $Comentarios_Recepcion;
	private $Id_Motivo_Rechazo;
	
    private $Nombre_usuario_resguardo;
	
	private $EsApp;
	private $Id_Cirugia;
	
	private $Usuario_Gestor;
	private $Usuario_Assist;
	private $Gestor_Assist;

    public function getNombre_usuario_resguardo(){
        return $this->Nombre_usuario_resguardo;
  }
  public function setNombre_usuario_resguardo($Nombre_usuario_resguardo){
     $this->Nombre_usuario_resguardo=$Nombre_usuario_resguardo;
  }
	
	public function getNo_Usuario_Inicial(){
		return $this->No_Usuario_Inicial;
  }
  public function setNo_Usuario_Inicial($No_Usuario_Inicial){
     $this->No_Usuario_Inicial=$No_Usuario_Inicial;
  }
	
	public function getNombre_Usuario_Inicial(){
		return $this->Nombre_Usuario_Inicial;
  }
  public function setNombre_Usuario_Inicial($Nombre_Usuario_Inicial){
     $this->Nombre_Usuario_Inicial=$Nombre_Usuario_Inicial;
  }
    
	public function getId_Solicitud(){
		return $this->Id_Solicitud;
  }
  public function setId_Solicitud($Id_Solicitud){
     $this->Id_Solicitud=$Id_Solicitud;
  }
	
	public function getId_Solicitud_Anterior(){
        return $this->Id_Solicitud_Anterior;
    }
    public function setId_Solicitud_Anterior($Id_Solicitud_Anterior){
        $this->Id_Solicitud_Anterior=$Id_Solicitud_Anterior;
    }
	
	public function getAsist_Especial(){
        return $this->Asist_Especial;
    }
    public function setAsist_Especial($Asist_Especial){
        $this->Asist_Especial=$Asist_Especial;
    }
	
	public function getId_Activo(){
        return $this->Id_Activo;
    }
    public function setId_Activo($Id_Activo){
        $this->Id_Activo=$Id_Activo;
    }
	
	
	public function getAF_BC(){
        return $this->AF_BC;
    }
    public function setAF_BC($AF_BC){
        $this->AF_BC=$AF_BC;
    }
	
	public function getNombre_Activo(){
        return $this->Nombre_Activo;
    }
    public function setNombre_Activo($Nombre_Activo){
        $this->Nombre_Activo=$Nombre_Activo;
    }
	
	public function getFoto(){
        return $this->Foto;
    }
    public function setFoto($Foto){
        $this->Foto=$Foto;
    }
	
	public function getDesc_Lar_Activo(){
        return $this->Desc_Lar_Activo;
    }
    public function setDesc_Lar_Activo($Desc_Lar_Activo){
        $this->Desc_Lar_Activo=$Desc_Lar_Activo;
    }
	
	public function getAF_BC_Activo(){
        return $this->AF_BC_Activo;
    }
    public function setAF_BC_Activo($AF_BC_Activo){
        $this->AF_BC_Activo=$AF_BC_Activo;
    }
	
    public function getId_Usuario(){
        return $this->Id_Usuario;
    }
    public function setId_Usuario($Id_Usuario){
        $this->Id_Usuario=$Id_Usuario;
    }
	
	public function getNo_Usuario(){
        return $this->No_Usuario;
    }
    public function setNo_Usuario($No_Usuario){
        $this->No_Usuario=$No_Usuario;
    }
	
	public function getExiste_Imagen(){
        return $this->Existe_Imagen;
    }
	
    public function setExiste_Imagen($Existe_Imagen){
        $this->Existe_Imagen=$Existe_Imagen;
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
	
	public function getId_Gestor_Reasignado(){
        return $this->Id_Gestor_Reasignado;
    }
    public function setId_Gestor_Reasignado($Id_Gestor_Reasignado){
        $this->Id_Gestor_Reasignado=$Id_Gestor_Reasignado;
    }
	
	public function getNo_Gestor(){
        return $this->No_Gestor;
    }
    public function setNo_Gestor($No_Gestor){
        $this->No_Gestor=$No_Gestor;
    }
	
	public function getExiste_Imagen_Gestor(){
        return $this->Existe_Imagen_Gestor;
    }
    public function setExiste_Imagen_Gestor($Existe_Imagen_Gestor){
        $this->Existe_Imagen_Gestor=$Existe_Imagen_Gestor;
    }
	
	public function getNombre_Gestor(){
        return $this->Nombre_Gestor;
    }
    public function setNombre_Gestor($Nombre_Gestor){
        $this->Nombre_Gestor=$Nombre_Gestor;
    }
	
	public function getGestor(){
        return $this->Gestor;
    }
    public function setGestor($Gestor){
        $this->Gestor=$Gestor;
    }	
	
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
	
	public function getId_Categoria(){
        return $this->Id_Categoria;
    }
    public function setId_Categoria($Id_Categoria){
        $this->Id_Categoria=$Id_Categoria;
    }
	
	
	public function getId_Subcategoria(){
        return $this->Id_Subcategoria;
    }
    public function setId_Subcategoria($Id_Subcategoria){
        $this->Id_Subcategoria=$Id_Subcategoria;
    }
    public function getId_Medio(){
        return $this->Id_Medio;
    }
    public function setId_Medio($Id_Medio){
        $this->Id_Medio=$Id_Medio;
    }
	public function getDesc_Medio(){
        return $this->Desc_Medio;
    }
    public function setDesc_Medio($Desc_Medio){
        $this->Desc_Medio=$Desc_Medio;
    }
	public function getSeccion(){
        return $this->Seccion;
    }
    public function setSeccion($Seccion){
        $this->Seccion=$Seccion;
    }
    public function getTitulo(){
        return $this->Titulo;
    }
    public function setTitulo($Titulo){
        $this->Titulo=$Titulo;
    }
    public function getId_Actividad(){
        return $this->Id_Actividad;
    }
    public function setId_Actividad($Id_Actividad){
        $this->Id_Actividad=$Id_Actividad;
    }
	public function getId_Det_Actividad(){
        return $this->Id_Det_Actividad;
    }
    public function setId_Det_Actividad($Id_Det_Actividad){
        $this->Id_Det_Actividad=$Id_Det_Actividad;
    }
    public function getDesc_Motivo_Reporte(){
        return $this->Desc_Motivo_Reporte;
    }
    public function setDesc_Motivo_Reporte($Desc_Motivo_Reporte){
        $this->Desc_Motivo_Reporte=$Desc_Motivo_Reporte;
    }
    public function getPrioridad(){
        return $this->Prioridad;
    }
    public function setPrioridad($Prioridad){
        $this->Prioridad=$Prioridad;
    }
    public function getUrl_archivo(){
        return $this->Url_archivo;
    }
    public function setUrl_archivo($Url_archivo){
        $this->Url_archivo=$Url_archivo;
    }
	public function getArchivo_Binario(){
        return $this->Archivo_Binario;
    }
    public function setArchivo_Binario($Archivo_Binario){
        $this->Archivo_Binario=$Archivo_Binario;
    }

	public function getArchivo_Binario2(){
        return $this->Archivo_Binario2;
    }
    public function setArchivo_Binario2($Archivo_Binario2){
        $this->Archivo_Binario2=$Archivo_Binario2;
    }
	
	public function getArchivo_Binario3(){
        return $this->Archivo_Binario3;
    }
    public function setArchivo_Binario3($Archivo_Binario3){
        $this->Archivo_Binario3=$Archivo_Binario3;
    }	
	
	public function getArchivo_Binario4(){
        return $this->Archivo_Binario4;
    }
    public function setArchivo_Binario4($Archivo_Binario4){
        $this->Archivo_Binario4=$Archivo_Binario4;
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

    public function getEstatus_Proceso(){
        return $this->Estatus_Proceso;
    }
    public function setEstatus_Proceso($Estatus_Proceso){
        $this->Estatus_Proceso=$Estatus_Proceso;
    }
	
	public function getLo_Realiza(){
        return $this->Lo_Realiza;
    }
    public function setLo_Realiza($Lo_Realiza){
        $this->Lo_Realiza=$Lo_Realiza;
    }
	
	public function getId_Estatus_Proceso(){
        return $this->Id_Estatus_Proceso;
    }
    public function setId_Estatus_Proceso($Id_Estatus_Proceso){
        $this->Id_Estatus_Proceso=$Id_Estatus_Proceso;
    }

	public function getArea(){
        return $this->Area;
    }
    public function setArea($Area){
        $this->Area=$Area;
    }

	public function getNombreSeccion(){
        return $this->NombreSeccion;
    }
    public function setNombreSeccion($NombreSeccion){
        $this->NombreSeccion=$NombreSeccion;
    }

	public function getCategoria(){
        return $this->Categoria;
    }
    public function setCategoria($Categoria){
        $this->Categoria=$Categoria;
    }
	
	public function getUsuario(){
        return $this->Usuario;
    }
    public function setUsuario($Usuario){
        $this->Usuario=$Usuario;
    }
	
	public function getSubcategoria(){
        return $this->Subcategoria;
    }
    public function setSubcategoria($Subcategoria){
        $this->Subcategoria=$Subcategoria;
    }
	
	public function getMotivo(){
        return $this->Motivo;
    }
    public function setMotivo($Motivo){
        $this->Motivo=$Motivo;
    }

	public function getTituloCierre(){
        return $this->TituloCierre;
    }
    public function setTituloCierre($TituloCierre){
        $this->TituloCierre=$TituloCierre;
    }
	
	public function getComentarioCierre(){
        return $this->ComentarioCierre;
    }
    public function setComentarioCierre($ComentarioCierre){
        $this->ComentarioCierre=$ComentarioCierre;
    }
		
		public function getComentarioCierreGestor(){
        return $this->ComentarioCierreGestor;
    }
    public function setComentarioCierreGestor($ComentarioCierreGestor){
        $this->ComentarioCierreGestor=$ComentarioCierreGestor;
    }
	
	public function getId_Motivo_Aparente(){
        return $this->Id_Motivo_Aparente;
    }
    public function setId_Motivo_Aparente($Id_Motivo_Aparente){
        $this->Id_Motivo_Aparente=$Id_Motivo_Aparente;
    }
	
	public function getDesc_Motivo_Aparente(){
        return $this->Desc_Motivo_Aparente;
    }
    public function setDesc_Motivo_Aparente($Desc_Motivo_Aparente){
        $this->Desc_Motivo_Aparente=$Desc_Motivo_Aparente;
    }
	
	public function getId_Motivo_Real(){
        return $this->Id_Motivo_Real;
    }
    public function setId_Motivo_Real($Id_Motivo_Real){
        $this->Id_Motivo_Real=$Id_Motivo_Real;
    }
	
	public function getDesc_Motivo_Real(){
        return $this->Desc_Motivo_Real;
    }
    public function setDesc_Motivo_Real($Desc_Motivo_Real){
        $this->Desc_Motivo_Real=$Desc_Motivo_Real;
    }
	
	public function getId_Est_Equipo(){
        return $this->Id_Est_Equipo;
    }
    public function setId_Est_Equipo($Id_Est_Equipo){
        $this->Id_Est_Equipo=$Id_Est_Equipo;
    }
	
	public function getDesc_Est_Equipo(){
        return $this->Desc_Est_Equipo;
    }
    public function setDesc_Est_Equipo($Desc_Est_Equipo){
        $this->Desc_Est_Equipo=$Desc_Est_Equipo;
    }
	///////////////////
	public function getMarca(){
        return $this->Marca;
    }
    public function setMarca($Marca){
        $this->Marca=$Marca;
    }

	public function getModelo(){
        return $this->Modelo;
    }
    public function setModelo($Modelo){
        $this->Modelo=$Modelo;
    }
	
	public function getNo_Serie(){
        return $this->No_Serie;
    }
    public function setNo_Serie($No_Serie){
        $this->No_Serie=$No_Serie;
    }
	
	public function getUbic_Prim(){
        return $this->Ubic_Prim;
    }
    public function setUbic_Prim($Ubic_Prim){
        $this->Ubic_Prim=$Ubic_Prim;
    }
	
	public function getUbic_Sec(){
        return $this->Ubic_Sec;
    }
    public function setUbic_Sec($Ubic_Sec){
        $this->Ubic_Sec=$Ubic_Sec;
    }
	
	public function getUbic_Esp(){
        return $this->Ubic_Esp;
    }
    public function setUbic_Esp($Ubic_Esp){
        $this->Ubic_Esp=$Ubic_Esp;
    }
	
	public function getFech_Solicitud(){
        return $this->Fech_Solicitud;
    }
    public function setFech_Solicitud($Fech_Solicitud){
        $this->Fech_Solicitud=$Fech_Solicitud;
    }
	
	public function getFech_Seguimiento(){
        return $this->Fech_Seguimiento;
    }
    public function setFech_Seguimiento($Fech_Seguimiento){
        $this->Fech_Seguimiento=$Fech_Seguimiento;
    }
	
	public function getFech_Espera_Cierre(){
        return $this->Fech_Espera_Cierre;
    }
    public function setFech_Espera_Cierre($Fech_Espera_Cierre){
        $this->Fech_Espera_Cierre=$Fech_Espera_Cierre;
    }
	
	public function getFech_Cierre(){
        return $this->Fech_Cierre;
    }
    public function setFech_Cierre($Fech_Cierre){
        $this->Fech_Cierre=$Fech_Cierre;
    }
		
		public function getGestor_Finaliza(){
        return $this->Gestor_Finaliza;
    }
    public function setGestor_Finaliza($Gestor_Finaliza){
        $this->Gestor_Finaliza=$Gestor_Finaliza;
    }
	
		public function getDireccion_Ip_Sol(){
        return $this->Direccion_Ip_Sol;
    }
    public function setDireccion_Ip_Sol($Direccion_Ip_Sol){
        $this->Direccion_Ip_Sol=$Direccion_Ip_Sol;
    }
	

	public function getActivo_Externo(){
      return $this->Activo_Externo;
  }
  public function setActivo_Externo($Activo_Externo){
      $this->Activo_Externo=$Activo_Externo;
  }
	public function getAF_BC_Ext(){
      return $this->AF_BC_Ext;
  }
  public function setAF_BC_Ext($AF_BC_Ext){
      $this->AF_BC_Ext=$AF_BC_Ext;
  }
	public function getNombre_Act_Ext(){
      return $this->Nombre_Act_Ext;
  }
  public function setNombre_Act_Ext($Nombre_Act_Ext){
      $this->Nombre_Act_Ext=$Nombre_Act_Ext;
  }
	
	public function getMarca_Act_Ext(){
      return $this->Marca_Act_Ext;
  }
  public function setMarca_Act_Ext($Marca_Act_Ext){
      $this->Marca_Act_Ext=$Marca_Act_Ext;
  }
	
	public function getModelo_Act_Ext(){
      return $this->Modelo_Act_Ext;
  }
  public function setModelo_Act_Ext($Modelo_Act_Ext){
      $this->Modelo_Act_Ext=$Modelo_Act_Ext;
  }
	
	public function getNo_Serie_Act_Ext(){
      return $this->No_Serie_Act_Ext;
  }
  public function setNo_Serie_Act_Ext($No_Serie_Act_Ext){
      $this->No_Serie_Act_Ext=$No_Serie_Act_Ext;
  }
	
	public function getId_Ubic_Prim(){
      return $this->Id_Ubic_Prim;
  }
  public function setId_Ubic_Prim($Id_Ubic_Prim){
      $this->Id_Ubic_Prim=$Id_Ubic_Prim;
  }
	
	public function getDesc_Ubic_Prim_Act_Ext(){
      return $this->Desc_Ubic_Prim_Act_Ext;
  }
  public function setDesc_Ubic_Prim_Act_Ext($Desc_Ubic_Prim_Act_Ext){
      $this->Desc_Ubic_Prim_Act_Ext=$Desc_Ubic_Prim_Act_Ext;
  }
	
	public function getId_Ubic_Sec(){
      return $this->Id_Ubic_Sec;
  }
  public function setId_Ubic_Sec($Id_Ubic_Sec){
      $this->Id_Ubic_Sec=$Id_Ubic_Sec;
  }

	public function getDesc_Ubic_Sec_Act_Ext(){
      return $this->Desc_Ubic_Sec_Act_Ext;
  }
  public function setDesc_Ubic_Sec_Act_Ext($Desc_Ubic_Sec_Act_Ext){
      $this->Desc_Ubic_Sec_Act_Ext=$Desc_Ubic_Sec_Act_Ext;
  }
	
	public function getCantidad_Equ_Ext(){
      return $this->Cantidad_Equ_Ext;
  }
	public function setCantidad_Equ_Ext($Cantidad_Equ_Ext){
      $this->Cantidad_Equ_Ext=$Cantidad_Equ_Ext;
  }
	
	
	
	public function getPre_Re_Procedimiento(){
      return $this->Pre_Re_Procedimiento;
  }
  public function setPre_Re_Procedimiento($Pre_Re_Procedimiento){
      $this->Pre_Re_Procedimiento=$Pre_Re_Procedimiento;
  }
	public function getPre_Re_Fecha_Hora_Cirugia(){
      return $this->Pre_Re_Fecha_Hora_Cirugia;
  }
  public function setPre_Re_Fecha_Hora_Cirugia($Pre_Re_Fecha_Hora_Cirugia){
      $this->Pre_Re_Fecha_Hora_Cirugia=$Pre_Re_Fecha_Hora_Cirugia;
  }
	public function getPre_Re_Quirofano(){
      return $this->Pre_Re_Quirofano;
  }
  public function setPre_Re_Quirofano($Pre_Re_Quirofano){
      $this->Pre_Re_Quirofano=$Pre_Re_Quirofano;
  }
	public function getPre_Re_Paciente(){
      return $this->Pre_Re_Paciente;
  }
  public function setPre_Re_Paciente($Pre_Re_Paciente){
      $this->Pre_Re_Paciente=$Pre_Re_Paciente;
  }
	public function getPre_Re_Cirujano(){
      return $this->Pre_Re_Cirujano;
  }
  public function setPre_Re_Cirujano($Pre_Re_Cirujano){
      $this->Pre_Re_Cirujano=$Pre_Re_Cirujano;
  }
	
	
	
	public function getEmpresa_Ext(){
      return $this->Empresa_Ext;
  }
  public function setEmpresa_Ext($Empresa_Ext){
      $this->Empresa_Ext=$Empresa_Ext;
  }
	
	public function getNombre_Completo_Ext(){
      return $this->Nombre_Completo_Ext;
  }
  public function setNombre_Completo_Ext($Nombre_Completo_Ext){
      $this->Nombre_Completo_Ext=$Nombre_Completo_Ext;
  }
	
	public function getTelefono_Ext(){
      return $this->Telefono_Ext;
  }
  public function setTelefono_Ext($Telefono_Ext){
      $this->Telefono_Ext=$Telefono_Ext;
  }
	
	public function getCorreo_Ext(){
      return $this->Correo_Ext;
  }
  public function setCorreo_Ext($Correo_Ext){
      $this->Correo_Ext=$Correo_Ext;
  }
	
	public function getPre_Registro_Ext(){
      return $this->Pre_Registro_Ext;
  }
  public function setPre_Registro_Ext($Pre_Registro_Ext){
      $this->Pre_Registro_Ext=$Pre_Registro_Ext;
  }
	
	public function getObserv_Pre_Reg_Ext(){
      return $this->Observ_Pre_Reg_Ext;
  }
  public function setObserv_Pre_Reg_Ext($Observ_Pre_Reg_Ext){
      $this->Observ_Pre_Reg_Ext=$Observ_Pre_Reg_Ext;
  }
	
	public function getEstatus_Recepcion(){
      return $this->Estatus_Recepcion;
  }
  public function setEstatus_Recepcion($Estatus_Recepcion){
      $this->Estatus_Recepcion=$Estatus_Recepcion;
  }
	
	public function getComentarios_Recepcion(){
      return $this->Comentarios_Recepcion;
  }
  public function setComentarios_Recepcion($Comentarios_Recepcion){
      $this->Comentarios_Recepcion=$Comentarios_Recepcion;
  }
	
	public function getId_Motivo_Rechazo(){
      return $this->Id_Motivo_Rechazo;
  }
  public function setId_Motivo_Rechazo($Id_Motivo_Rechazo){
      $this->Id_Motivo_Rechazo=$Id_Motivo_Rechazo;
  }
	
	public function getEsApp(){
      return $this->EsApp;
  }
  public function setEsApp($EsApp){
      $this->EsApp=$EsApp;
  }
	
	public function getId_Cirugia(){
      return $this->Id_Cirugia;
  }
  public function setId_Cirugia($Id_Cirugia){
      $this->Id_Cirugia=$Id_Cirugia;
  }
	
	public function getUsuario_Assist(){
      return $this->Usuario_Assist;
  }
  public function setUsuario_Assist($Usuario_Assist){
      $this->Usuario_Assist=$Usuario_Assist;
  }
	
	public function getGestor_Assist(){
      return $this->Gestor_Assist;
  }
  public function setGestor_Assist($Gestor_Assist){
      $this->Gestor_Assist=$Gestor_Assist;
  }
 public function getUsuario_Gestor(){
      return $this->Usuario_Gestor;
  }
  public function setUsuario_Gestor($Usuario_Gestor){
      $this->Usuario_Gestor=$Usuario_Gestor;
  }

	
	
    public function toString(){
        return array("Id_Solicitud"=>$this->Id_Solicitud,
                        "Id_Solicitud_Anterior"=>$this->Id_Solicitud_Anterior,
                        "Asist_Especial"=>$this->Asist_Especial,
                        "Id_Activo"=>$this->Id_Activo,
                        "AF_BC"=>$this->AF_BC,
                        "Nombre_Activo"=>$this->Nombre_Activo,
                        "Foto"=>$this->Foto,
                        "Desc_Lar_Activo"=>$this->Desc_Lar_Activo,
                        "AF_BC_Activo"=>$this->AF_BC_Activo,
                        "Id_Usuario"=>$this->Id_Usuario,
                        "No_Usuario"=>$this->No_Usuario,
                        "Existe_Imagen"=>$this->Existe_Imagen,
                        "Id_Area"=>$this->Id_Area,
                        "Id_Medio"=>$this->Id_Medio,
                        "Desc_Medio"=>$this->Desc_Medio,
                        "Seccion"=>$this->Seccion,
                        "Titulo"=>$this->Titulo,
                        "Id_Actividad"=>$this->Id_Actividad,
                        "Id_Det_Actividad"=>$this->Id_Det_Actividad,
                        "Desc_Motivo_Reporte"=>$this->Desc_Motivo_Reporte,
                        "Prioridad"=>$this->Prioridad,
                        "Url_archivo"=>$this->Url_archivo,
                        //"Archivo_Binario"=>$this->Archivo_Binario,
                        "Fech_Inser"=>$this->Fech_Inser,
                        "Usr_Inser"=>$this->Usr_Inser,
                        "Fech_Mod"=>$this->Fech_Mod,
                        "Usr_Mod"=>$this->Usr_Mod,
                        "Estatus_Reg"=>$this->Estatus_Reg
                        ,"Estatus_Proceso"=>$this->Estatus_Proceso
                        ,"Lo_Realiza"=>$this->Lo_Realiza
                        ,"Id_Estatus_Proceso"=>$this->Id_Estatus_Proceso
                        ,"Area"=>$this->Area
                        ,"NombreSeccion"=>$this->NombreSeccion
                        ,"Id_Categoria"=>$this->Id_Categoria
                        ,"Id_Subcategoria"=>$this->Id_Subcategoria
                        ,"Categoria"=>$this->Categoria
                        ,"Subcategoria"=>$this->Subcategoria
                        ,"Motivo"=>$this->Motivo
                        ,"Usuario"=>$this->Usuario
                        ,"Id_Gestor"=>$this->Id_Gestor
                        ,"Nombre_Ejecutante"=>$this->Nombre_Ejecutante
                        ,"No_Gestor"=>$this->No_Gestor
                        ,"Existe_Imagen_Gestor"=>$this->Existe_Imagen_Gestor
                        ,"Id_Gestor_Reasignado"=>$this->Id_Gestor_Reasignado
                        ,"Gestor"=>$this->Gestor
                        ,"TituloCierre"=>$this->TituloCierre
                        ,"ComentarioCierre"=>$this->ComentarioCierre
                        ,"ComentarioCierreGestor"=>$this->ComentarioCierreGestor
                        ,"Id_Motivo_Aparente"=>$this->Id_Motivo_Aparente
                        ,"Desc_Motivo_Aparente"=>$this->Desc_Motivo_Aparente
                        ,"Id_Motivo_Real"=>$this->Id_Motivo_Real
                        ,"Desc_Motivo_Real"=>$this->Desc_Motivo_Real
                        ,"Id_Est_Equipo"=>$this->Id_Est_Equipo
                        ,"Desc_Est_Equipo"=>$this->Desc_Est_Equipo
                        ,"Marca"=>$this->Marca
                        ,"Modelo"=>$this->Modelo 
                        ,"No_Serie"=>$this->No_Serie
                        ,"Ubic_Prim"=>$this->Ubic_Prim
                        ,"Ubic_Sec"=>$this->Ubic_Sec
                        ,"Ubic_Esp"=>$this->Ubic_Esp
                        ,"Fech_Solicitud"=>$this->Fech_Solicitud
                        ,"Fech_Seguimiento"=>$this->Fech_Seguimiento
                        ,"Fech_Espera_Cierre"=>$this->Fech_Espera_Cierre
                        ,"Fech_Cierre"=>$this->Fech_Cierre
                        ,"Gestor_Finaliza"=>$this->Gestor_Finaliza
                        ,"Direccion_Ip_Sol"=>$this->Direccion_Ip_Sol
                        ,"Activo_Externo"=>$this->Activo_Externo
                        ,"AF_BC_Ext"=>$this->AF_BC_Ext
                        ,"Nombre_Act_Ext"=>$this->Nombre_Act_Ext
                        ,"Marca_Act_Ext"=>$this->Marca_Act_Ext
                        ,"Modelo_Act_Ext"=>$this->Modelo_Act_Ext
                        ,"No_Serie_Act_Ext"=>$this->No_Serie_Act_Ext
                        ,"Id_Ubic_Prim"=>$this->Id_Ubic_Prim
                        ,"Desc_Ubic_Prim_Act_Ext"=>$this->Desc_Ubic_Prim_Act_Ext
                        ,"Id_Ubic_Sec"=>$this->Id_Ubic_Sec
                        ,"Desc_Ubic_Sec_Act_Ext"=>$this->Desc_Ubic_Sec_Act_Ext
                        ,"Cantidad_Equ_Ext"=>$this->Cantidad_Equ_Ext
                        ,"Pre_Re_Procedimiento"=>$this->Pre_Re_Procedimiento
                        ,"Pre_Re_Fecha_Hora_Cirugia"=>$this->Pre_Re_Fecha_Hora_Cirugia
                        ,"Pre_Re_Quirofano"=>$this->Pre_Re_Quirofano
                        ,"Pre_Re_Paciente"=>$this->Pre_Re_Paciente
                        ,"Pre_Re_Cirujano"=>$this->Pre_Re_Cirujano
                        ,"Empresa_Ext"=>$this->Empresa_Ext
                        ,"Nombre_Completo_Ext"=>$this->Nombre_Completo_Ext
                        ,"Telefono_Ext"=>$this->Telefono_Ext
                        ,"Correo_Ext"=>$this->Correo_Ext
                        ,"Pre_Registro_Ext"=>$this->Pre_Registro_Ext
                        ,"Observ_Pre_Reg_Ext"=>$this->Observ_Pre_Reg_Ext
                        ,"Estatus_Recepcion"=>$this->Estatus_Recepcion
                        ,"Comentarios_Recepcion"=>$this->Comentarios_Recepcion
                        ,"Id_Motivo_Rechazo"=>$this->Id_Motivo_Rechazo
                        ,"EsApp"=>$this->EsApp
                        ,"Id_Cirugia"=>$this->Id_Cirugia
                        ,"Usuario_Assist"=>$this->Usuario_Assist
                        ,"Gestor_Assist"=>$this->Gestor_Assist
                        ,"Usuario_Gestor"=>$this->Usuario_Gestor
                        ,"No_Usuario_Inicial"=>$this->No_Usuario_Inicial
                        ,"Nombre_Usuario_Inicial"=>$this->Nombre_Usuario_Inicial
);
    }
}
?>