<?php
//session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_actividades/Siga_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_actividades/Siga_actividadesController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");

class Siga_actividadesFacade {
	private $proveedor;

	public function __construct() {
	}

	public function validarSiga_actividades($Siga_actividadesDto) {
		$Siga_actividadesDto->setId_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getId_Actividad(),"utf8"):strtoupper($Siga_actividadesDto->getId_Actividad()))))));
		if($this->esFecha($Siga_actividadesDto->getId_Actividad())) {
			$Siga_actividadesDto->setId_Actividad($this->fechaMysql($Siga_actividadesDto->getId_Actividad()));
		}
		
		$Siga_actividadesDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getId_Area(),"utf8"):strtoupper($Siga_actividadesDto->getId_Area()))))));
		if($this->esFecha($Siga_actividadesDto->getId_Area())) {
			$Siga_actividadesDto->setId_Area($this->fechaMysql($Siga_actividadesDto->getId_Area()));
		}

		$Siga_actividadesDto->setTipo_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getTipo_Actividad(),"utf8"):strtoupper($Siga_actividadesDto->getTipo_Actividad()))))));
		if($this->esFecha($Siga_actividadesDto->getTipo_Actividad())) {
			$Siga_actividadesDto->setTipo_Actividad($this->fechaMysql($Siga_actividadesDto->getTipo_Actividad()));
		}

		$Siga_actividadesDto->setId_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getId_Activo(),"utf8"):strtoupper($Siga_actividadesDto->getId_Activo()))))));
		if($this->esFecha($Siga_actividadesDto->getId_Activo())){
			$Siga_actividadesDto->setId_Activo($this->fechaMysql($Siga_actividadesDto->getId_Activo()));
		}

		$Siga_actividadesDto->setNombre_Rutina(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getNombre_Rutina(),"utf8"):strtoupper($Siga_actividadesDto->getNombre_Rutina()))))));
		if($this->esFecha($Siga_actividadesDto->getNombre_Rutina())){
			$Siga_actividadesDto->setNombre_Rutina($this->fechaMysql($Siga_actividadesDto->getNombre_Rutina()));
		}

		$Siga_actividadesDto->setId_Frecuencia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getId_Frecuencia(),"utf8"):strtoupper($Siga_actividadesDto->getId_Frecuencia()))))));
		if($this->esFecha($Siga_actividadesDto->getId_Frecuencia())){
			$Siga_actividadesDto->setId_Frecuencia($this->fechaMysql($Siga_actividadesDto->getId_Frecuencia()));
		}

		$Siga_actividadesDto->setDescripcion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getDescripcion(),"utf8"):strtoupper($Siga_actividadesDto->getDescripcion()))))));
		if($this->esFecha($Siga_actividadesDto->getDescripcion())){
			$Siga_actividadesDto->setDescripcion($this->fechaMysql($Siga_actividadesDto->getDescripcion()));
		}

		$Siga_actividadesDto->setRealiza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getRealiza(),"utf8"):strtoupper($Siga_actividadesDto->getRealiza()))))));
		if($this->esFecha($Siga_actividadesDto->getRealiza())){
			$Siga_actividadesDto->setRealiza($this->fechaMysql($Siga_actividadesDto->getRealiza()));
		}

		$Siga_actividadesDto->seturl_documentos_adjuntos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->geturl_documentos_adjuntos(),"utf8"):strtoupper($Siga_actividadesDto->geturl_documentos_adjuntos()))))));
		if($this->esFecha($Siga_actividadesDto->geturl_documentos_adjuntos())){
			$Siga_actividadesDto->seturl_documentos_adjuntos($this->fechaMysql($Siga_actividadesDto->geturl_documentos_adjuntos()));
		}
		$Siga_actividadesDto->setvincular_mesa_ayuda(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getvincular_mesa_ayuda(),"utf8"):strtoupper($Siga_actividadesDto->getvincular_mesa_ayuda()))))));
		if($this->esFecha($Siga_actividadesDto->getvincular_mesa_ayuda())){
			$Siga_actividadesDto->setvincular_mesa_ayuda($this->fechaMysql($Siga_actividadesDto->getvincular_mesa_ayuda()));
		}
		$Siga_actividadesDto->setUsuario_Responsable(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getUsuario_Responsable(),"utf8"):strtoupper($Siga_actividadesDto->getUsuario_Responsable()))))));
		if($this->esFecha($Siga_actividadesDto->getUsuario_Responsable())){
			$Siga_actividadesDto->setUsuario_Responsable($this->fechaMysql($Siga_actividadesDto->getUsuario_Responsable()));
		}
		$Siga_actividadesDto->setMotivo_Servicio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getMotivo_Servicio(),"utf8"):strtoupper($Siga_actividadesDto->getMotivo_Servicio()))))));
		if($this->esFecha($Siga_actividadesDto->getMotivo_Servicio())){
			$Siga_actividadesDto->setMotivo_Servicio($this->fechaMysql($Siga_actividadesDto->getMotivo_Servicio()));
		}
		$Siga_actividadesDto->setFecha_Programada(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getFecha_Programada(),"utf8"):strtoupper($Siga_actividadesDto->getFecha_Programada()))))));
		if($this->esFecha($Siga_actividadesDto->getFecha_Programada())){
			$Siga_actividadesDto->setFecha_Programada($this->fechaMysql($Siga_actividadesDto->getFecha_Programada()));
		}
		$Siga_actividadesDto->setFecha_Realizada(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getFecha_Realizada(),"utf8"):strtoupper($Siga_actividadesDto->getFecha_Realizada()))))));
		if($this->esFecha($Siga_actividadesDto->getFecha_Realizada())){
			$Siga_actividadesDto->setFecha_Realizada($this->fechaMysql($Siga_actividadesDto->getFecha_Realizada()));
		}
		$Siga_actividadesDto->setMant_RAC1(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getMant_RAC1(),"utf8"):strtoupper($Siga_actividadesDto->getMant_RAC1()))))));
		if($this->esFecha($Siga_actividadesDto->getMant_RAC1())){
		$Siga_actividadesDto->setMant_RAC1($this->fechaMysql($Siga_actividadesDto->getMant_RAC1()));
		}
		$Siga_actividadesDto->setMant_RAC2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getMant_RAC2(),"utf8"):strtoupper($Siga_actividadesDto->getMant_RAC2()))))));
		if($this->esFecha($Siga_actividadesDto->getMant_RAC2())){
			$Siga_actividadesDto->setMant_RAC2($this->fechaMysql($Siga_actividadesDto->getMant_RAC2()));
		}
		$Siga_actividadesDto->setMant_RAC3(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getMant_RAC3(),"utf8"):strtoupper($Siga_actividadesDto->getMant_RAC3()))))));
		if($this->esFecha($Siga_actividadesDto->getMant_RAC3())){
			$Siga_actividadesDto->setMant_RAC3($this->fechaMysql($Siga_actividadesDto->getMant_RAC3()));
		}
		$Siga_actividadesDto->setMant_RAC4(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getMant_RAC4(),"utf8"):strtoupper($Siga_actividadesDto->getMant_RAC4()))))));
		if($this->esFecha($Siga_actividadesDto->getMant_RAC4())){
			$Siga_actividadesDto->setMant_RAC4($this->fechaMysql($Siga_actividadesDto->getMant_RAC4()));
		}
		$Siga_actividadesDto->setHoras(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getHoras(),"utf8"):strtoupper($Siga_actividadesDto->getHoras()))))));
		if($this->esFecha($Siga_actividadesDto->getHoras())){
			$Siga_actividadesDto->setHoras($this->fechaMysql($Siga_actividadesDto->getHoras()));
		}
		$Siga_actividadesDto->setCostos_Materiales_CE(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getCostos_Materiales_CE(),"utf8"):strtoupper($Siga_actividadesDto->getCostos_Materiales_CE()))))));
		if($this->esFecha($Siga_actividadesDto->getCostos_Materiales_CE())){
			$Siga_actividadesDto->setCostos_Materiales_CE($this->fechaMysql($Siga_actividadesDto->getCostos_Materiales_CE()));
		}
		$Siga_actividadesDto->setMano_Obra_CE(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getMano_Obra_CE(),"utf8"):strtoupper($Siga_actividadesDto->getMano_Obra_CE()))))));
		if($this->esFecha($Siga_actividadesDto->getMano_Obra_CE())){
		$Siga_actividadesDto->setMano_Obra_CE($this->fechaMysql($Siga_actividadesDto->getMano_Obra_CE()));
		}
		$Siga_actividadesDto->setTotal_CE(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getTotal_CE(),"utf8"):strtoupper($Siga_actividadesDto->getTotal_CE()))))));
		if($this->esFecha($Siga_actividadesDto->getTotal_CE())){
			$Siga_actividadesDto->setTotal_CE($this->fechaMysql($Siga_actividadesDto->getTotal_CE()));
		}
		$Siga_actividadesDto->setCostos_Materiales_CI(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getCostos_Materiales_CI(),"utf8"):strtoupper($Siga_actividadesDto->getCostos_Materiales_CI()))))));
		if($this->esFecha($Siga_actividadesDto->getCostos_Materiales_CI())){
			$Siga_actividadesDto->setCostos_Materiales_CI($this->fechaMysql($Siga_actividadesDto->getCostos_Materiales_CI()));
		}
		$Siga_actividadesDto->setMano_Obra_CI(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getMano_Obra_CI(),"utf8"):strtoupper($Siga_actividadesDto->getMano_Obra_CI()))))));
		if($this->esFecha($Siga_actividadesDto->getMano_Obra_CI())){
			$Siga_actividadesDto->setMano_Obra_CI($this->fechaMysql($Siga_actividadesDto->getMano_Obra_CI()));
		}
		$Siga_actividadesDto->setTotal_CI(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getTotal_CI(),"utf8"):strtoupper($Siga_actividadesDto->getTotal_CI()))))));
		if($this->esFecha($Siga_actividadesDto->getTotal_CI())){
		$Siga_actividadesDto->setTotal_CI($this->fechaMysql($Siga_actividadesDto->getTotal_CI()));
		}
		$Siga_actividadesDto->setAhorro(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getAhorro(),"utf8"):strtoupper($Siga_actividadesDto->getAhorro()))))));
		if($this->esFecha($Siga_actividadesDto->getAhorro())){
			$Siga_actividadesDto->setAhorro($this->fechaMysql($Siga_actividadesDto->getAhorro()));
		}
		$Siga_actividadesDto->setComentarios(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getComentarios(),"utf8"):strtoupper($Siga_actividadesDto->getComentarios()))))));
		if($this->esFecha($Siga_actividadesDto->getComentarios())){
			$Siga_actividadesDto->setComentarios($this->fechaMysql($Siga_actividadesDto->getComentarios()));
		}
		$Siga_actividadesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getFech_Inser(),"utf8"):strtoupper($Siga_actividadesDto->getFech_Inser()))))));
		if($this->esFecha($Siga_actividadesDto->getFech_Inser())){
			$Siga_actividadesDto->setFech_Inser($this->fechaMysql($Siga_actividadesDto->getFech_Inser()));
		}
		$Siga_actividadesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getUsr_Inser(),"utf8"):strtoupper($Siga_actividadesDto->getUsr_Inser()))))));
		if($this->esFecha($Siga_actividadesDto->getUsr_Inser())){
			$Siga_actividadesDto->setUsr_Inser($this->fechaMysql($Siga_actividadesDto->getUsr_Inser()));
		}
		$Siga_actividadesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getFech_Mod(),"utf8"):strtoupper($Siga_actividadesDto->getFech_Mod()))))));
		if($this->esFecha($Siga_actividadesDto->getFech_Mod())){
			$Siga_actividadesDto->setFech_Mod($this->fechaMysql($Siga_actividadesDto->getFech_Mod()));
		}
		$Siga_actividadesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getUsr_Mod(),"utf8"):strtoupper($Siga_actividadesDto->getUsr_Mod()))))));
		if($this->esFecha($Siga_actividadesDto->getUsr_Mod())){
			$Siga_actividadesDto->setUsr_Mod($this->fechaMysql($Siga_actividadesDto->getUsr_Mod()));
		}
		$Siga_actividadesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_actividadesDto->getEstatus_Reg()))))));
		if($this->esFecha($Siga_actividadesDto->getEstatus_Reg())){
			$Siga_actividadesDto->setEstatus_Reg($this->fechaMysql($Siga_actividadesDto->getEstatus_Reg()));
		}
		$Siga_actividadesDto->setCampo_1(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getCampo_1(),"utf8"):strtoupper($Siga_actividadesDto->getCampo_1()))))));
		if($this->esFecha($Siga_actividadesDto->getCampo_1())){
			$Siga_actividadesDto->setCampo_1($this->fechaMysql($Siga_actividadesDto->getCampo_1()));
		}
		$Siga_actividadesDto->setCampo_2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getCampo_2(),"utf8"):strtoupper($Siga_actividadesDto->getCampo_2()))))));
		if($this->esFecha($Siga_actividadesDto->getCampo_2())){
			$Siga_actividadesDto->setCampo_2($this->fechaMysql($Siga_actividadesDto->getCampo_2()));
		}
		$Siga_actividadesDto->setCampo_3(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getCampo_3(),"utf8"):strtoupper($Siga_actividadesDto->getCampo_3()))))));
		if($this->esFecha($Siga_actividadesDto->getCampo_3())){
			$Siga_actividadesDto->setCampo_3($this->fechaMysql($Siga_actividadesDto->getCampo_3()));
		}
		$Siga_actividadesDto->setCampo_4(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getCampo_4(),"utf8"):strtoupper($Siga_actividadesDto->getCampo_4()))))));
		if($this->esFecha($Siga_actividadesDto->getCampo_4())){
			$Siga_actividadesDto->setCampo_4($this->fechaMysql($Siga_actividadesDto->getCampo_4()));
		}
		$Siga_actividadesDto->setCampo_5(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getCampo_5(),"utf8"):strtoupper($Siga_actividadesDto->getCampo_5()))))));
		if($this->esFecha($Siga_actividadesDto->getCampo_5())){
			$Siga_actividadesDto->setCampo_5($this->fechaMysql($Siga_actividadesDto->getCampo_5()));
		}
		$Siga_actividadesDto->setCampo_6(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividadesDto->getCampo_6(),"utf8"):strtoupper($Siga_actividadesDto->getCampo_6()))))));
		if($this->esFecha($Siga_actividadesDto->getCampo_6())){
			$Siga_actividadesDto->setCampo_6($this->fechaMysql($Siga_actividadesDto->getCampo_6()));
		}
		return $Siga_actividadesDto;
	}


	public function selectSiga_actividades_detalle($Siga_actividadesDto, $Fecha_Det_Programada){
		//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->selectSiga_actividades_detalle($Siga_actividadesDto, $Fecha_Det_Programada);
		//if($Siga_actividadesDto!=""){
		//$dtoToJson = new DtoToJson($Siga_actividadesDto);
		//return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
		//}
		//$jsonDto = new Encode_JSON();
		//return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function selectSiga_mantenimiento_correctivo($Siga_actividadesDto, $Fecha_Det_Programada){
		//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->selectSiga_mantenimiento_correctivo($Siga_actividadesDto, $Fecha_Det_Programada);
		//if($Siga_actividadesDto!=""){
		//$dtoToJson = new DtoToJson($Siga_actividadesDto);
		//return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
		//}
		//$jsonDto = new Encode_JSON();
		//return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function select_calendario_global($Siga_actividadesDto, $Busqueda, $Id_Gestor, $Nombre_Ejecutante){

		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->select_calendario_global($Siga_actividadesDto, $Busqueda, $Id_Gestor, $Nombre_Ejecutante);
		
		//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		//if($Siga_actividadesDto!=""){
		//$dtoToJson = new DtoToJson($Siga_actividadesDto);
		//return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
		//}
		//$jsonDto = new Encode_JSON();
		//return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function selectSiga_actividades($Siga_actividadesDto){
		$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->selectSiga_actividades($Siga_actividadesDto);
		if($Siga_actividadesDto!=""){
			$dtoToJson = new DtoToJson($Siga_actividadesDto);
			return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
		}
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
	}


	public function llenarDataTable($siga_actividadesDto,$draw,$columns,$order,$start,$length,$search) {
		$Siga_actividadesController = new Siga_actividadesController();
		return $Siga_actividadesController->llenarDataTable($siga_actividadesDto,$draw,$columns,$order,$start,$length,$search);
	}


	public function insertSiga_actividades($Siga_actividadesDto, $Array_det_actividades, $Hasta_Anio, $Fecha_Calendario){
		//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		$Siga_actividadesController = new Siga_actividadesController();
		$Frecuencia=$Siga_actividadesDto->getId_Frecuencia();
		$Id_Activo=$Siga_actividadesDto->getId_Activo();
		$Usr_Inser=$Siga_actividadesDto->getUsr_Inser();
		$Dias=0;
		$Fech_Actividad_1 = $Array_det_actividades[0][7];
		$Array_Primera_Rutina="";

		if($Fech_Actividad_1 != "") {
			if($Fecha_Calendario!=""){
				$Siga_actividadesController->Elimino_Actividades_Calendario($Id_Activo, $Fecha_Calendario, $Usr_Inser);
			}
	
			$Fech_Actividad_1=   substr($Fech_Actividad_1, 6, 9)."-".substr($Fech_Actividad_1,3, 2)."-".substr($Fech_Actividad_1,0, 2);
			$Fech_Act_1_Sin_Format= (int) date("Ymd", strtotime($Fech_Actividad_1));
			$Sigue_Anio=$Hasta_Anio;
			if($Hasta_Anio=="") {
				$Sigue_Anio=$Fech_Act_1_Sin_Format;
			}
			switch ($Frecuencia) {
				case 1://Semanal
					$Dias=7;
					$Mes=0;
					break;
				case 2://Mensual
					$Dias=30;
					$Mes=1;
					break;
				case 3://Bimestral
					$Dias=60;
					$Mes=2;
					break;
				case 4://Trimestral
					$Dias=90;
					$Mes=3;
					break;
				case 5://Cuatrimestral
					$Dias=120;
					$Mes=6;
					break;
				case 6://Semestral
					$Dias=182;
					$Mes=6;
					break;
				case 7://Anual
					$Dias=365;
					$Mes=12;
					break;
				case 9://Diario
					$Dias=1;
					$Mes=0;
					break;
				case 10://Quincenal
					$Dias=15;
					$Mes=0;
					break;
			}
	
			$Dias_Suma=$Dias;
			$Mes_Suma=$Mes;
			$contador=0;
			$Array_General=array();
			for ($j = $Fech_Act_1_Sin_Format; $j <= $Sigue_Anio; $j++) {
				$contador=$contador+1;
				if($Mes>0){
					if($contador<=1){
						$j=$Fech_Act_1_Sin_Format;	
						$Sig_Fech=$Fech_Act_1_Sin_Format;
					}
					else{
						$Sig_Fech = strtotime ( ''.+$Mes.' month' , strtotime ( $Fech_Actividad_1 ) ) ;//Sumo los dias a la primera actividad
						$Sig_Fech = (int) date ( 'Ymd' , $Sig_Fech );//Formateo y paso a entero la fecha
						$j=$Sig_Fech;//Paso la fecha formateada a la variable $i del ciclo for
						$Mes=$Mes+$Mes_Suma;//Sumo los dias por cada vez que se	
						//echo $j; echo "<br>";
					}
				}
				else{
					if($contador<=1){
						$j=$Fech_Act_1_Sin_Format;	
						$Sig_Fech=$Fech_Act_1_Sin_Format;
					}
					else{
						$Sig_Fech = strtotime ( ''.+$Dias.' day' , strtotime ( $Fech_Actividad_1 ) ) ;//Sumo los dias a la primera actividad
						$Sig_Fech = (int) date ( 'Ymd' , $Sig_Fech );//Formateo y paso a entero la fecha
						$j=$Sig_Fech;//Paso la fecha formateada a la variable $i del ciclo for
						$Dias=$Dias+$Dias_Suma;//Sumo los dias por cada vez que se	
			
						//echo $j; echo "<br>";
					}
				}
		
				if($Sig_Fech<=$Sigue_Anio) {
					for($i=0; $i<count($Array_det_actividades); $i++) {
						$cont_act_det=$cont_act_det+1;
						$Array_Actividades_Detalle=[];
						$Fecha_Programada=substr($Array_det_actividades[$i][7], 6, 9)."-".substr($Array_det_actividades[$i][7],3, 2)."-".substr($Array_det_actividades[$i][7],0, 2);
						$Fecha_Programada_Sin_Format=substr($Array_det_actividades[$i][7], 6, 9)."".substr($Array_det_actividades[$i][7],3, 2)."".substr($Array_det_actividades[$i][7],0, 2);
				
						if($Mes>0){
							$Sig_Fech_p = strtotime ( ''.+($Mes-$Mes_Suma).' month' , strtotime ( $Fecha_Programada ) ) ;//Sumo los meses a la primera actividad
							$Sig_Fech_p = (int) date ( 'Ymd' , $Sig_Fech_p );//Formateo y paso a entero la fecha
						}
						else{
							$Sig_Fech_p = strtotime ( ''.+($Dias-$Dias_Suma).' day' , strtotime ( $Fecha_Programada ) ) ;//Sumo los dias a la primera actividad
							$Sig_Fech_p = (int) date ( 'Ymd' , $Sig_Fech_p );//Formateo y paso a entero la fecha
						}
						$Array_Actividades_Detalle[0]=$Array_det_actividades[$i][0];
						$Array_Actividades_Detalle[1]=$Array_det_actividades[$i][1];
						$Array_Actividades_Detalle[2]=$Array_det_actividades[$i][2];
						$Array_Actividades_Detalle[3]=$Array_det_actividades[$i][3];
						$Array_Actividades_Detalle[4]=$Array_det_actividades[$i][4];
						$Array_Actividades_Detalle[5]=$Array_det_actividades[$i][5];
						$Array_Actividades_Detalle[6]=$Array_det_actividades[$i][6];
						$Array_Actividades_Detalle[7]=$Sig_Fech_p;
						$Array_Actividades_Detalle[8]=$Array_det_actividades[$i][8];
						$Array_Actividades_Detalle[9]=$Array_det_actividades[$i][9];
						$Array_Actividades_Detalle[10]=$Array_det_actividades[$i][10];
						$Array_General[$i]=$Array_Actividades_Detalle;
					}
					if($contador==1){
						$Array_Primera_Rutina=$Siga_actividadesController->insertSiga_actividades($Siga_actividadesDto, $Array_General, $Sigue_Anio);			
					}
					else{
						if($Hasta_Anio!=""){
							$Siga_actividadesController->insertSiga_actividades($Siga_actividadesDto, $Array_General, $Sigue_Anio);
						}
					}
				}
			}
	
			/*
			for ($i = $Fech_Act_1_Sin_Format; $i <= $Hasta_Anio; $i++) {
				$contador=$contador+1;	
				if($contador<=1){
					$i=$Fech_Act_1_Sin_Format;
					$Sig_Fech=$Fech_Act_1_Sin_Format;
				}else{
			
					$Sig_Fech = strtotime ( ''.+$Dias.' day' , strtotime ( $Fech_Actividad_1 ) ) ;//Sumo los dias a la primera actividad
					$Sig_Fech = (int) date ( 'Ymd' , $Sig_Fech );//Formateo y paso a entero la fecha
					$i=$Sig_Fech;//Paso la fecha formateada a la variable $i del ciclo for
					$Dias=$Dias+$Dias_Suma;//Sumo los dias por cada vez que se	
					//echo date("d-m-Y",strtotime("30-01-2020"."+ 1 month")); 
				}
		
				if($Sig_Fech<=$Hasta_Anio){
			
					for($j=0; $j<count($Array_det_actividades); $j++) {
						$cont_act_det=$cont_act_det+1;
						$Array_Actividades_Detalle=[];
						$Fecha_Programada=substr($Array_det_actividades[$j][7], 6, 9)."-".substr($Array_det_actividades[$j][7],3, 2)."-".substr($Array_det_actividades[$j][7],0, 2);
						$Fecha_Programada_Sin_Format=substr($Array_det_actividades[$j][7], 6, 9)."".substr($Array_det_actividades[$j][7],3, 2)."".substr($Array_det_actividades[$j][7],0, 2);
				
						$Sig_Fech_p = strtotime ( ''.+($Dias-$Dias_Suma).' day' , strtotime ( $Fecha_Programada ) ) ;//Sumo los dias a la primera actividad
						$Sig_Fech_p = (int) date ( 'Ymd' , $Sig_Fech_p );//Formateo y paso a entero la fecha
				
						$Array_Actividades_Detalle[0]=$Array_det_actividades[$j][0];
						$Array_Actividades_Detalle[1]=$Array_det_actividades[$j][1];
						$Array_Actividades_Detalle[2]=$Array_det_actividades[$j][2];
						$Array_Actividades_Detalle[3]=$Array_det_actividades[$j][3];
						$Array_Actividades_Detalle[4]=$Array_det_actividades[$j][4];
						$Array_Actividades_Detalle[5]=$Array_det_actividades[$j][5];
						$Array_Actividades_Detalle[6]=$Array_det_actividades[$j][6];
						$Array_Actividades_Detalle[7]=$Sig_Fech_p;
						$Array_Actividades_Detalle[8]=$Array_det_actividades[$j][8];
						$Array_Actividades_Detalle[9]=$Array_det_actividades[$j][9];
						$Array_Actividades_Detalle[10]=$Array_det_actividades[$j][10];
						$Array_General[$j]=$Array_Actividades_Detalle;
					}
			
					if($contador==1){
						$Array_Primera_Rutina=$Siga_actividadesController->insertSiga_actividades($Siga_actividadesDto, $Array_General, $Hasta_Anio);			
					}else{	
						$Siga_actividadesController->insertSiga_actividades($Siga_actividadesDto, $Array_General, $Hasta_Anio);
					}
			
				}
			}*/
		}
		else {
		}

		//$Siga_actividadesDto = $Siga_actividadesController->insertSiga_actividades($Siga_actividadesDto, $Array_det_actividades, $Hasta_Anio);
		shell_exec("C:\\ejecutables\\Inserta_Actividades_A_Mesa_Ayuda.exe");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Array_Primera_Rutina);
	}


	public function insertMant_Predictivo($Siga_actividadesDto){
		//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->insertMant_Predictivo($Siga_actividadesDto);
		shell_exec("C:\\ejecutables\\Inserta_Actividades_A_Mesa_Ayuda.exe");

		if($Siga_actividadesDto!="") {
			$dtoToJson = new DtoToJson($Siga_actividadesDto);
			return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
		}
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function updateMant_Predictivo($Siga_actividadesDto){
		//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->updateMant_Predictivo($Siga_actividadesDto);
		shell_exec("C:\\ejecutables\\Inserta_Actividades_A_Mesa_Ayuda.exe");
		if($Siga_actividadesDto!=""){
			$dtoToJson = new DtoToJson($Siga_actividadesDto);
			return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
		}
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function Rutina_Mant_Preventiv($Siga_actividadesDto){
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->Rutina_Mant_Preventiv($Siga_actividadesDto);

		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function grafica_servicios_registrados($Array_Param_G,$Siga_actividadesDto){
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->grafica_servicios_registrados($Array_Param_G,$Siga_actividadesDto);

		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function Actividades_Global($Array_Param_G,$Siga_actividadesDto, $Anio_Global){
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->Actividades_Global($Array_Param_G,$Siga_actividadesDto, $Anio_Global);
	
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function cmb_gestores($Id_Area, $Id_Seccion){
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->cmb_gestores($Id_Area, $Id_Seccion);
	
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function cmb_ejecutantes($Id_Area){
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->cmb_ejecutantes($Id_Area);
	
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function eliminar_programacion($Id_Actividad, $Usr_Mod){
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->eliminar_programacion($Id_Actividad, $Usr_Mod);
	
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function updateSiga_actividades($Siga_actividadesDto, $Array_det_actividades, $Estatus_Realizado){
		//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		$Siga_actividadesController = new Siga_actividadesController();
		shell_exec("C:\\ejecutables\\Inserta_Actividades_A_Mesa_Ayuda.exe");
		if($Estatus_Realizado==""){
			$Siga_actividadesDto = $Siga_actividadesController->updateSiga_actividades($Siga_actividadesDto, $Array_det_actividades);
		}
		else{
			$Siga_actividadesDto = $Siga_actividadesController->update_det_realizado($Siga_actividadesDto, $Array_det_actividades);
		}

		//if($Siga_actividadesDto!=""){
		//$dtoToJson = new DtoToJson($Siga_actividadesDto);
		//return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
		//}
		//$jsonDto = new Encode_JSON();
		//return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));

		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function updateSiga_actividades_mesa($Siga_actividadesDto, $Array_det_actividades){
		//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->updateSiga_actividades_mesa($Siga_actividadesDto, $Array_det_actividades);
		shell_exec("C:\\ejecutables\\Inserta_Actividades_A_Mesa_Ayuda.exe");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($Siga_actividadesDto);
	}


	public function deleteSiga_actividades($Siga_actividadesDto){
		//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
		$Siga_actividadesController = new Siga_actividadesController();
		$Siga_actividadesDto = $Siga_actividadesController->deleteSiga_actividades($Siga_actividadesDto);
		if($Siga_actividadesDto==true){
			$jsonDto = new Encode_JSON();
			return $jsonDto->encode(array("totalCount"=>"0","text"=>"REGISTRO ELIMINADO DE FORMA CORRECTA"));
		}
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL LA BAJA"));
	}


	private function esFecha($fecha) {
		if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $fecha)) {
			return true;
		}
		return false;
	}


	private function esFechaMysql($fecha) {
		if (preg_match('/^\d{4}\-\d{1,2}\-\d{1,2}$/', $fecha)) {
			return true;
		}
		return false;
	}


	private function fechaMysql($fecha) {
		list($dia, $mes, $year) = explode("/", $fecha);
		return $year . "-" . $mes . "-" . $dia;
	}


	private function fechaNormal($fecha) {
		list($dia, $mes, $year) = explode("/", $fecha);
		return $year . "-" . $mes . "-" . $dia;
	}
}


@$Id_Actividad=$_POST["Id_Actividad"];
@$Id_Area=$_POST["Id_Area"];
@$Id_Seccion=$_POST["Id_Seccion"];
@$Tipo_Actividad=$_POST["Tipo_Actividad"];
@$Id_Activo=$_POST["Id_Activo"];
@$Nombre_Rutina=$_POST["Nombre_Rutina"];
@$Id_Frecuencia=$_POST["Id_Frecuencia"];
@$Descripcion=$_POST["Descripcion"];
@$Id_Gestor=$_POST["Id_Gestor"];
@$Nombre_Ejecutante=$_POST["Nombre_Ejecutante"];
@$Realiza=$_POST["Realiza"];
@$url_documentos_adjuntos=$_POST["url_documentos_adjuntos"];
@$vincular_mesa_ayuda=$_POST["vincular_mesa_ayuda"];
@$Usuario_Responsable=$_POST["Usuario_Responsable"];
@$Motivo_Servicio=$_POST["Motivo_Servicio"];
@$Fecha_Programada=$_POST["Fecha_Programada"];
@$Fecha_Realizada=$_POST["Fecha_Realizada"];
@$Mant_RAC1=$_POST["Mant_RAC1"];
@$Mant_RAC2=$_POST["Mant_RAC2"];
@$Mant_RAC3=$_POST["Mant_RAC3"];
@$Mant_RAC4=$_POST["Mant_RAC4"];
@$Cantidad_1=$_POST["Cantidad_1"];
@$Cantidad_2=$_POST["Cantidad_2"];
@$Cantidad_3=$_POST["Cantidad_3"];
@$Cantidad_4=$_POST["Cantidad_4"];
@$Costo_1=$_POST["Costo_1"];
@$Costo_2=$_POST["Costo_2"];
@$Costo_3=$_POST["Costo_3"];
@$Costo_4=$_POST["Costo_4"];
@$Horas=$_POST["Horas"];
@$Costos_Materiales_CE=$_POST["Costos_Materiales_CE"];
@$Mano_Obra_CE=$_POST["Mano_Obra_CE"];
@$Total_CE=$_POST["Total_CE"];
@$Costos_Materiales_CI=$_POST["Costos_Materiales_CI"];
@$Mano_Obra_CI=$_POST["Mano_Obra_CI"];
@$Total_CI=$_POST["Total_CI"];
@$Ahorro=$_POST["Ahorro"];
@$Comentarios=$_POST["Comentarios"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$Id_Motivo_Real=$_POST["Id_Motivo_Real"];
@$Campo_1=$_POST["Campo_1"];
@$Campo_2=$_POST["Campo_2"];
@$Campo_3=$_POST["Campo_3"];
@$Campo_4=$_POST["Campo_4"];
@$Campo_5=$_POST["Campo_5"];
@$Campo_6=$_POST["Campo_6"];
@$Hasta_Anio=$_POST["Hasta_Anio"];
@$accion=$_POST["accion"];
////////////////////////////////
@$Fecha_Det_Programada=$_POST["Fecha_Det_Programada"];

@$Fecha_Programada_rutina= date("Ymd", strtotime($_POST["Fecha_Det_Programada"]));
//@$Fecha_Programada_rutina=$_POST["Fecha_Det_Programada"];
@$Estatus_Realizado=$_POST["Estatus_Realizado"];
//
@$Anio_Global=$_POST["Anio_Global"];
@$Array_Param_G=$_POST["Array_Param_G"];
//
@$Array_det_actividades=$_POST["Array_det_actividades"];
@$Busqueda=$_POST["Busqueda"];
@$Fecha_Calendario=$_POST["Fecha_Calendario"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';

$siga_actividadesFacade = new Siga_actividadesFacade();
$siga_actividadesDto = new Siga_actividadesDTO();

$siga_actividadesDto->setId_Actividad($Id_Actividad);
$siga_actividadesDto->setId_Area($Id_Area);
$siga_actividadesDto->setTipo_Actividad($Tipo_Actividad);
$siga_actividadesDto->setId_Activo($Id_Activo);
$siga_actividadesDto->setNombre_Rutina($Nombre_Rutina);
$siga_actividadesDto->setId_Frecuencia($Id_Frecuencia);
$siga_actividadesDto->setDescripcion($Descripcion);
$siga_actividadesDto->setId_Gestor($Id_Gestor);
$siga_actividadesDto->setNombre_Ejecutante($Nombre_Ejecutante);
$siga_actividadesDto->setRealiza($Realiza);
$siga_actividadesDto->setUrl_documentos_adjuntos($url_documentos_adjuntos);
$siga_actividadesDto->setVincular_mesa_ayuda($vincular_mesa_ayuda);
$siga_actividadesDto->setUsuario_Responsable($Usuario_Responsable);
$siga_actividadesDto->setMotivo_Servicio($Motivo_Servicio);
$siga_actividadesDto->setFecha_Programada($Fecha_Programada);
$siga_actividadesDto->setFecha_Realizada($Fecha_Realizada);
$siga_actividadesDto->setMant_RAC1($Mant_RAC1);
$siga_actividadesDto->setMant_RAC2($Mant_RAC2);
$siga_actividadesDto->setMant_RAC3($Mant_RAC3);
$siga_actividadesDto->setMant_RAC4($Mant_RAC4);
$siga_actividadesDto->setCantidad_1($Cantidad_1);
$siga_actividadesDto->setCantidad_2($Cantidad_2);
$siga_actividadesDto->setCantidad_3($Cantidad_3);
$siga_actividadesDto->setCantidad_4($Cantidad_4);
$siga_actividadesDto->setCosto_1($Costo_1);
$siga_actividadesDto->setCosto_2($Costo_2);
$siga_actividadesDto->setCosto_3($Costo_3);
$siga_actividadesDto->setCosto_4($Costo_4);
$siga_actividadesDto->setHoras($Horas);
$siga_actividadesDto->setCostos_Materiales_CE($Costos_Materiales_CE);
$siga_actividadesDto->setMano_Obra_CE($Mano_Obra_CE);
$siga_actividadesDto->setTotal_CE($Total_CE);
$siga_actividadesDto->setCostos_Materiales_CI($Costos_Materiales_CI);
$siga_actividadesDto->setMano_Obra_CI($Mano_Obra_CI);
$siga_actividadesDto->setTotal_CI($Total_CI);
$siga_actividadesDto->setAhorro($Ahorro);
$siga_actividadesDto->setComentarios($Comentarios);
$siga_actividadesDto->setFech_Inser($Fech_Inser);
$siga_actividadesDto->setUsr_Inser($Usr_Inser);
$siga_actividadesDto->setFech_Mod($Fech_Mod);
$siga_actividadesDto->setUsr_Mod($Usr_Mod);
$siga_actividadesDto->setEstatus_Reg($Estatus_Reg);
$siga_actividadesDto->setId_Motivo_Real($Id_Motivo_Real);
$siga_actividadesDto->setCampo_1($Campo_1);
$siga_actividadesDto->setCampo_2($Campo_2);
$siga_actividadesDto->setCampo_3($Campo_3);
$siga_actividadesDto->setCampo_4($Campo_4);
$siga_actividadesDto->setCampo_5($Campo_5);
$siga_actividadesDto->setCampo_6($Campo_6);


if(($accion=="guardar") && ($Id_Actividad == "")) {
	// Actualiza la lista de registros para mantenimiento en bloque
	$siga_actividadesDto = $siga_actividadesFacade->insertSiga_actividades($siga_actividadesDto, $Array_det_actividades, $Hasta_Anio, $Fecha_Calendario);
	echo $siga_actividadesDto;
}

if(($accion=="guardar_man_correctivo")) {
	$siga_actividadesDto = $siga_actividadesFacade->insertMant_Predictivo($siga_actividadesDto);
	echo $siga_actividadesDto;
}

if(($accion=="modificar_man_correctivo")){
	$siga_actividadesDto = $siga_actividadesFacade->updateMant_Predictivo($siga_actividadesDto);
	echo $siga_actividadesDto;
}
else if(($accion=="guardar") && ($Id_Actividad != "")){
	// Actualiza un registro en especifico para mantenimiento
	$siga_actividadesDto = $siga_actividadesFacade->updateSiga_actividades($siga_actividadesDto, $Array_det_actividades, $Estatus_Realizado);
	echo $siga_actividadesDto;
}
else if($accion=="consultar"){
	$siga_actividadesDto = $siga_actividadesFacade->selectSiga_actividades($siga_actividadesDto);
	echo $siga_actividadesDto;
}
else if($accion=="consultar_actividades"){
	$siga_actividadesDto = $siga_actividadesFacade->selectSiga_actividades_detalle($siga_actividadesDto, $Fecha_Programada_rutina);
	echo $siga_actividadesDto;
}
else if($accion=="calendario_global"){
	$siga_actividadesDto = $siga_actividadesFacade->select_calendario_global($siga_actividadesDto, $Busqueda, $Id_Gestor, $Nombre_Ejecutante);
	echo $siga_actividadesDto;
}
else if( ($accion=="baja") && ($Id_Actividad!="") ){
	$siga_actividadesDto = $siga_actividadesFacade->deleteSiga_actividades($siga_actividadesDto);
	echo $siga_actividadesDto;
}
else if( ($accion=="seleccionar") && ($Id_Actividad!="") ){
	$siga_actividadesDto = $siga_actividadesFacade->selectSiga_actividades($siga_actividadesDto);
	echo $siga_actividadesDto;
}
/////Funciones Mesa de Ayuda (Actividades)
else if(($accion=="update_actividades_mesa")){
	$siga_actividadesDto = $siga_actividadesFacade->updateSiga_actividades_mesa($siga_actividadesDto, $Array_det_actividades);
	echo $siga_actividadesDto;
}
else if($accion=="grafica_servicios_registrados"){
	$siga_actividadesDto = $siga_actividadesFacade->grafica_servicios_registrados($Array_Param_G,$siga_actividadesDto);
	echo $siga_actividadesDto;
}
else if($accion=="Rutina_Mant_Preventiv"){
	$siga_actividadesDto = $siga_actividadesFacade->Rutina_Mant_Preventiv($siga_actividadesDto);
	echo $siga_actividadesDto;
}
else if($accion=="Actividades_Global"){
	$siga_actividadesDto=$siga_actividadesFacade->Actividades_Global($Array_Param_G,$siga_actividadesDto, $Anio_Global);
	echo $siga_actividadesDto;
}
else if($accion=="cmb_gestores"){
	$siga_actividadesDto=$siga_actividadesFacade->cmb_gestores($Id_Area, $Id_Seccion);
	echo $siga_actividadesDto;
}
else if($accion=="cmb_ejecutantes"){
	$siga_actividadesDto=$siga_actividadesFacade->cmb_ejecutantes($Id_Area);
	echo $siga_actividadesDto;
}
else if($accion=="eliminar_programacion"){
	$siga_actividadesDto=$siga_actividadesFacade->eliminar_programacion($Id_Actividad, $Usr_Mod);
	echo $siga_actividadesDto;
}
///////////////////////////////////////////
else if (isset ($draw) && ($draw != "")) {
	$columns = isset($_POST["columns"])?$_POST["columns"]:'';
	$order = isset($_POST["order"])?$_POST["order"]:'';
	$start = isset($_POST["start"])?$_POST["start"]:'';
	$length = isset($_POST["length"])?$_POST["length"]:'';
	$search = isset($_POST["search"])?$_POST["search"]:'';
	echo  $siga_actividadesDto=$siga_actividadesFacade->llenarDataTable($siga_actividadesDto, $draw,$columns,$order,$start,$length,$search); 
}
?>