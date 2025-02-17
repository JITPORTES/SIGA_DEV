<?php
	include_once(dirname(__FILE__) . "/../../modelos/activos/dto/siga_activos/Siga_activosDTO.Class.php");
	include_once(dirname(__FILE__) . "/../../datos/connect/Proveedor.Class.php");

	class ActivoFijoInventarioConsultasModel extends Siga_activosDTO {
		// Propiedades de la Clase
		protected $_proveedor;
		public $draw;
		public $columns;
		public $order;
		public $start;
		public $length;
		public $search;
		public $orden;
		public $estatus;
		public $perfil;
		public $Fech_Inicial;
		public $Fech_Final;
		public $Tab;
		public $NombreTabla;
		public $lstFiltrosSuperior;
		// Importante!!!! El nombre de las propiedades debe coincidir con el nombre almacenado en la columna Nom_Columna de la tabla "siga_activo_fijo_inventario_columnas"
		public $Filtro_AF_BC;
		public $Filtro_Nombre_Activo;
		public $Filtro_Clasificacion;
		public $Filtro_Marca;
		public $Filtro_Modelo;
		public $Filtro_NumSerie;
		public $Filtro_Id_Propiedad;
		public $Filtro_Nombre_Completo;
		public $Filtro_Id_Ubic_Sec;
		public $Filtro_FechaAlta;
		public $Filtro_MontoFactura;
		public $Filtro_ImporteSeguros;
		public $Filtro_Estatus;
		public $Filtro_FechaBaja_UsrSolicitante;
		public $Filtro_FechaBaja_UsrDirFinanciera;
		public $Filtro_FechaBaja_UsrContabilidad;
		public $Filtro_EstatusWorkflowBaja;
		public $Filtro_Motivo_Baja;
		public $Filtro_Clase;
		public $Filtro_Departamento;
		public $Filtro_UbicacionPrimariaProcedencia;
		public $Filtro_UbicacionSecundariaProcedencia;
		public $Filtro_UbicacionPrimaria;
		public $Filtro_Area;
		public $Filtro_UbicacionEspecifica;
		public $Filtro_DescCorta;
		public $Filtro_DescLarga;
		public $Filtro_MotivoAlta;
		public $Filtro_Familia;
		public $Filtro_SubFamilia;
		public $Filtro_TipoActivo;
		public $Filtro_ParticipaCertificacion;
		public $Filtro_ParticipaSeguros;
		public $Filtro_Num_Empleado;
		public $Filtro_TipoValeResguardo;
		public $Filtro_Garantia;
		public $Filtro_ExtGarantia;
		public $Filtro_NumOrdenCompra;
		public $Filtro_FechaFactura;
		public $Filtro_NumFactura;
		public $Filtro_UUID;
		public $Filtro_FolioFiscal;
		public $Filtro_NumContrato;
		public $Filtro_VidaUtilFabricante;
		public $Filtro_VidaUtilCHS;
		public $Filtro_FechaVencimiento;
		public $Filtro_NombreProveedor;
		public $Filtro_Contacto;
		public $Filtro_Telefono;
		public $Filtro_DocRecibida;
		public $Filtro_Correo;
		public $Filtro_CentroCosto;
		public $Filtro_NumCapex;
		public $Filtro_Prorrateo;
		public $Filtro_ParticipaDepreciacion;
		public $Filtro_FechaInicioDepr;
		public $Filtro_CuentContAct;
		public $Filtro_CuentContActB10;
		public $Filtro_CuentContResult;
		public $Filtro_CuentContResultB10;
		public $Filtro_CuentContDep;
		public $Filtro_CuentContDepB10;
		public $Filtro_UsuarioRegistro;

		public $Filtro_Nom_Usuario_Reponsable;


		// Métodos del modelo
		// Obtiene la lista de Archivos ligados a un Activo dado/proceso de Baja
		public function ActivoFijoInventarioConsultasReportesDataTableGet(ActivoFijoInventarioConsultasModel $parametrosConsulta)
		{
			// Definición de la conexión
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			// Variables globales
			$recordsTotal = 0;
			// Array con la información de los registros 
			$data = array();
			// Utilizada para buscar alguna palabra en las columnas que componen el DataTable
			$criterios = "";

			try {
				$clase_biomedica = "";
				if($parametrosConsulta->perfil == 68) { $clase_biomedica = " and S.Id_Clase=17 "; }
				
				$FechInicio = "";
				if($parametrosConsulta->Fech_Inicial != "") {
					$FechInicio = $parametrosConsulta->Fech_Inicial[6] . $parametrosConsulta->Fech_Inicial[7] . $parametrosConsulta->Fech_Inicial[8] . $parametrosConsulta->Fech_Inicial[9] . "-" . $parametrosConsulta->Fech_Inicial[3] . $parametrosConsulta->Fech_Inicial[4] . "-" . $parametrosConsulta->Fech_Inicial[0] . $parametrosConsulta->Fech_Inicial[1];
				}
				
				$FechFin = "";
				if($parametrosConsulta->Fech_Final != "") {
					$FechFin = $parametrosConsulta->Fech_Final[6] . $parametrosConsulta->Fech_Final[7] . $parametrosConsulta->Fech_Final[8] . $parametrosConsulta->Fech_Final[9] . "-" . $parametrosConsulta->Fech_Final[3] . $parametrosConsulta->Fech_Final[4] . "-" . $parametrosConsulta->Fech_Final[0] . $parametrosConsulta->Fech_Final[1];
				}
				
				$Filtros_Fech_Baja = "";
				$Campo = "";
				if($parametrosConsulta->estatus == "baja" || $parametrosConsulta->estatus == "baja2" || $parametrosConsulta->estatus == "baja3") {
					if($parametrosConsulta->estatus == "baja") { $Campo = "FechaBaja_UsrSolicitante"; }
					if($parametrosConsulta->estatus == "baja2") { $Campo = "FechaBaja_UsrDirFinanciera"; }
					if($parametrosConsulta->estatus == "baja3") { $Campo = "FechaBaja_UsrContabilidad"; }
					
					if($FechInicio != "" && $FechFin != "") {
						$Filtros_Fech_Baja = " where " . $Campo . " between convert(date,'" . $FechInicio . "') and convert(date,'" . $FechFin ."') ";
					}
					else {
						if($FechInicio != "" && $FechFin == "") {
							$Filtros_Fech_Baja = " where " . $Campo . " = convert(date,'" . $FechInicio . "') ";
						}
						else {
							if($FechInicio == "" && $FechFin != "") {
								$Filtros_Fech_Baja = " where " . $Campo . " = convert(date,'" . $FechFin . "') ";
							}
						}
					}
				}
				
				// Arma los criterios cuando se trata de buscar alguna palabra en todos los campos que son ordenables
				if ($parametrosConsulta->search != '' AND $parametrosConsulta->search["value"] != '') {
					$listaCriterios = [];
					foreach ($parametrosConsulta->columns as $value) {
						if($value["data"] != 'Id_Activo' AND $value["data"] != 'Area' AND $value["data"] != 'function') {
							array_push($listaCriterios, $value["data"] . " LIKE '%" . $parametrosConsulta->search["value"] . "%'");
						}
						//if($value["data"] != 'Id_Activo' AND $value["data"] != 'Area' AND $value["data"] != 'function')
						//$criterios .= ' ' . $value["data"] . " LIKE '%" . $parametrosConsulta->search["value"] . "%'" . ' OR';
					}
					//$criterios = $criterios != "" ? ('WHERE (' . substr($criterios, 0, -2) . ')') : '';
					$criterios = count($listaCriterios) > 0 ? " WHERE (" . implode(" OR ", $listaCriterios) . ") " :  "";
				}
	
				// Ordenamiento por omisión en caso de que no se haya ordenado por alguna columna
				$ordenamiento = " ORDER BY Fech_Inser DESC ";
				if($parametrosConsulta->estatus == "tablereubicacion") {
					// Cuando sea reubicació, se ordena la reubicación más reciente
					$ordenamiento = " ORDER BY Fecha_Reubicacion DESC ";
				}
				
				if ($parametrosConsulta->order != '' && count($parametrosConsulta->order) > 0) {
					// Orden: Ascendente o Descendente
					$ordenAscDesc = $parametrosConsulta->order[0];
					// Nombre de la columna a partir del index de la columna seleccionada
					$nombreColumnaOrdanamiento = $parametrosConsulta->columns[$ordenAscDesc["column"]];
					if($nombreColumnaOrdanamiento["data"] != "function") {
						$ordenamiento = " ORDER BY " . $nombreColumnaOrdanamiento["data"] . " " . $ordenAscDesc["dir"];
					}
				}


				/*
				if($parametrosConsulta->order != '' AND count($parametrosConsulta->order)> 0 ) {
					
					$order = $parametrosConsulta->order[0];
					$aux = $parametrosConsulta->columns[$order["column"]];
					
					if($parametrosConsulta->aux["data"] !="function") {
						//$ordenamiento=' ORDER BY '. $parametrosConsulta->aux["data"] . ' ' . $parametrosConsulta->order["dir"];
						$ordenamiento=' ORDER BY '. $parametrosConsulta->$order->aux["data"] . ' ' . $parametrosConsulta->order["dir"];
					}
					
					/*
					//Alta
					if($parametrosConsulta->estatus == "soloactivos") {
						if($parametrosConsulta->order["column"] == 4) {
							$ordenamiento = ' ORDER BY Foto ' . $parametrosConsulta->order["dir"];
						}
									
						//if($order["column"]==5){
						//	$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_usr_solicitante, 103) '.$order["dir"];
						//}
						//
						//if($order["column"]==6){
						//	$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_dir_financiera, 103) '.$order["dir"];
						//}
						//
						//if($order["column"]==7){
						//	$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_usr_contabilidad, 103) '.$order["dir"];
						//}
									
						if($parametrosConsulta->order["column"]==16){//Monto Activo
							$ordenamiento = ' ORDER BY MontoF ' . $parametrosConsulta->order["dir"];
						}
									
						if($order["column"]==17){//Importe Seguros
							$ordenamiento = ' ORDER BY ImporteSeguros ' . $parametrosConsulta->order["dir"];
						}
					}
	
					//Proceso de baja
					if($parametrosConsulta->estatus=="baja") {
						if($parametrosConsulta->order["column"]==3){
							$ordenamiento = ' ORDER BY Foto ' . $parametrosConsulta->order["dir"];
						}
									
						if($parametrosConsulta->order["column"]==22) { //Monto Activo
							$ordenamiento=' ORDER BY MontoF '.$order["dir"];
						}
					}
								
					//Baja Definitiva
					if($parametrosConsulta->estatus == "baja3") {
						if($parametrosConsulta->order["column"] == 3) {
							$ordenamiento=' ORDER BY Foto ' . $parametrosConsulta->order["dir"];
						}
						
						if($order["column"] == 5) {
							$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_usr_solicitante, 103) ' . $parametrosConsulta->order["dir"];
						}
						
						if($order["column"] == 6) {
							$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_dir_financiera, 103) ' . $parametrosConsulta->order["dir"];
						}
						
						if($order["column"] == 7) {
							$ordenamiento = ' ORDER BY CONVERT (date, fecha_baja_usr_contabilidad, 103) ' . $parametrosConsulta->order["dir"];
						}
						if($order["column"]==22) { //Monto Activo
							$ordenamiento=' ORDER BY MontoF ' . $parametrosConsulta->order["dir"];
						}
					}
								
					//Reubicación
					if($parametrosConsulta->estatus == "reubicacion") {
						if($order["column"] == 4) {
							$ordenamiento=' ORDER BY Foto ' . $parametrosConsulta->order["dir"];
						}
						if($order["column"]==18){//Monto Activo
							$ordenamiento=' ORDER BY MontoF ' . $parametrosConsulta->order["dir"];
						}
					}
				}
				*/

				// Paginación del recordset y en donde inicia y en que registro cierra
				$pagina = '';
				if($parametrosConsulta->start != '' && $parametrosConsulta->length != '') {
					$pagina = ' OFFSET ' . $parametrosConsulta->start .' ROWS FETCH NEXT ' . $parametrosConsulta->length . ' ROWS ONLY ';
				}
	
					
				if($Filtros_Fech_Baja != ""){
					if($criterios != ""){
						$criterios = str_replace("WHERE", " AND ", $criterios);
					}
				}
	
				/*
				echo " SELECT S.Id_Activo,S.AF_BC,S.Foto,S.Nombre_Activo,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,
				(select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,
				(select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad=S.Id_Propiedad) as Propiedad,
				(select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,
				(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,
				(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria
				FROM siga_activos S where 0=0 "
						. "".$criterios.$ordenamiento.$pagina;*/
						
				$baja = "";
				$baja_reubicacion = "";
				if($parametrosConsulta->Tab == "0") {
					$baja_reubicacion=" ,SB.Id_Baja as Id_Baja_Reubicacion ";
					$baja=" right join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo and SB.EstatusBaja=0 and Estatus_Cancelacion <> 1 ";
				}
				
				if($parametrosConsulta->Tab == "1") {
					$baja_reubicacion = " ,SB.Id_Baja as Id_Baja_Reubicacion ";
					$baja = " right join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo and SB.EstatusBaja=1 and Estatus_Cancelacion <> 1 ";
				}
				
				
				$reubicacion = "";
				if($parametrosConsulta->estatus == "tablereubicacion") {
					$baja_reubicacion = " , SR.Id_Activo_Reubicacion as Id_Baja_Reubicacion ";
					$reubicacion = " right join siga_reubicacion_activo SR on S.Id_Activo=SR.Id_Activo ";
				}
				
				$EstatusReg = " AND S.Estatus_Reg <> 3 ";
				if($parametrosConsulta->estatus != "baja" && $parametrosConsulta->estatus != "baja2" && $parametrosConsulta->estatus != "baja3" && $parametrosConsulta->estatus != "tablereubicacion") {
					$baja_reubicacion = " , S.Id_Activo as Id_Baja_Reubicacion ";
				}

				$baja="";
				$baja_reubicacion="";
				if($parametrosConsulta->Tab == "0") {
					// ACTIVOS QUE ESTAN EN PROCESO DE BAJA
					$baja_reubicacion=" ,SB.Id_Baja as Id_Baja_Reubicacion ";
					//$baja=" right join siga_baja_activo SB on S.Id_Activo = SB.Id_Activo and SB.EstatusBaja = 0 and Estatus_Cancelacion = 0 ";
					$baja=" right join siga_baja_activo SB on S.Id_Activo = SB.Id_Activo ";
					// Se consideran los Activos que está en proceso de baja. Para ello se debe tomar en cuenta el último registro de la actividad en la tabla de bajas ya que es un histórico 
					// y no se deberán considerar los registros previos siendo que ya hay un nuevo registro que los anula. En caso de que sea en la misma fecha, se toma también el último registro más reciente por Id.
					$baja .= " INNER JOIN
								(
									/*-- https://stackoverflow.com/questions/28722276/sql-select-top-1-for-each-group/28727802 --*/
									SELECT TOP 1 WITH TIES
										Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
									FROM siga_baja_activo
									ORDER BY
										ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
								) B_2
							ON SB.Fecha_Baja = B_2.UltimoRegistro
							AND SB.Id_Activo = B_2.Id_Activo
							AND SB.Id_baja = B_2.UltimoMovimiento ";
					$baja .= " AND SB.EstatusBaja = 0 AND SB.Estatus_Cancelacion = 0 ";
				}
				
				if($parametrosConsulta->Tab == "1") {
					// ACTIVOS DADOS DE BAJA DEFINITIVA
					$baja_reubicacion=" ,SB.Id_Baja as Id_Baja_Reubicacion ";
					//$baja=" right join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo and SB.EstatusBaja = 1 and Estatus_Cancelacion <> 1 ";
					$baja = " right join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo ";
					// Se consideran los Activos que fueron dados de baja definitivamente. Para ello se debe tomar en cuenta el último registro de la actividad en la tabla de bajas ya que es un histórico 
					// y no se deberán considerar los registros previos siendo que ya hay un nuevo registro que los anula. En caso de que sea en la misma fecha, se toma también el último registro más reciente por Id.
					$baja .= " INNER JOIN
								(
									/*-- https://stackoverflow.com/questions/28722276/sql-select-top-1-for-each-group/28727802 --*/
									SELECT TOP 1 WITH TIES
										Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
									FROM siga_baja_activo
									ORDER BY
										ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
								) B_2
							ON SB.Fecha_Baja = B_2.UltimoRegistro
							AND SB.Id_Activo = B_2.Id_Activo
							AND SB.Id_baja = B_2.UltimoMovimiento ";
					$baja .= " AND SB.EstatusBaja = 1 AND SB.Estatus_Cancelacion = 0 ";
				}
				
				$reubicacion = "";
				if($parametrosConsulta->estatus == "tablereubicacion") {
					$baja_reubicacion = ", SR.Id_Activo_Reubicacion AS Id_Baja_Reubicacion ";
					$reubicacion = " right join siga_reubicacion_activo SR on S.Id_Activo=SR.Id_Activo ";
				}
				
				if($parametrosConsulta->estatus != "baja" && $parametrosConsulta->estatus != "baja2" && $parametrosConsulta->estatus != "baja3" && $parametrosConsulta->estatus != "tablereubicacion") {
					$baja_reubicacion = ", S.Id_Activo AS Id_Baja_Reubicacion ";
				}
				
				
				// Tabla
				$arrayFiltrosExcel = [];
				if($parametrosConsulta->NombreTabla == "tablaactivos") {
					// Activos que no han tenido cambios desde que se dieron de alta
					// También se consideran los Activos que fueron dados de baja o siguieron un proceso pero volvieron a estar en Operación y para ello se considera el último registro en la tabla de bajas en caso de que exista
					array_push($arrayFiltrosExcel, " AND (
							S.Id_Activo not in (select Id_Activo from siga_baja_activo)
							OR
							S.Id_Activo IN (
								SELECT B_1.Id_Activo
								FROM siga_baja_activo B_1
								INNER JOIN 
									(
										/*-- https://stackoverflow.com/questions/28722276/sql-select-top-1-for-each-group/28727802 --*/
										SELECT TOP 1 WITH TIES
											Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
										FROM siga_baja_activo
										ORDER BY
											ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
									) B_2
								ON B_1.Fecha_Baja = B_2.UltimoRegistro
								AND B_1.Id_Activo = B_2.Id_Activo
								AND B_1.Id_Baja = B_2.UltimoMovimiento
								WHERE
								/*-- Cancelados y que siguen en operación --*/
								B_1.Estatus_Cancelacion = 1 AND B_1.EstatusBaja = 0
							)
						)");
				}
				
				// FILTROS UTILIZANDO EL FILTRO DE COLUMNAS TIPO EXCEL EN LOS ENCABEZADOS DE LA TABLA
				// Columnas que solo son textos dentro de la tabla de Activos
				$lstFiltrosSuperior = [];
				// Recupera la variable en donde vienen especificados los campos de manera dinamica
				if($parametrosConsulta->lstFiltrosSuperior != null) {
					$lstFiltrosSuperior = explode("|", $parametrosConsulta->lstFiltrosSuperior);
					// Deben coincidir los nombre dinamicos establecidos en el catálogo para identificar cada campo sin que se escriba código para cada uno de manera tradicional
					for($i = 0; $i < count($lstFiltrosSuperior); $i++) {
						// Verifica que se hayn mandado elementos seleccionados en los chekbox correspondientes
						switch(trim($lstFiltrosSuperior[$i])) {
							// 3. Clasificación
							case "Clasificacion":
								array_push($arrayFiltrosExcel, " AND (SELECT C.Id_Clasificacion FROM siga_cat_clasificacion C WHERE C.Id_Clasificacion = S.Id_Clasificacion) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;
							// 8. Usuario Responsable y también 37. Número de Empleado
							case "Nombre_Completo":
							case "Num_Empleado":
								array_push($arrayFiltrosExcel, " AND S.Num_Empleado IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;
							// 10. Fecha de Alta
							case "FechaAlta":
								array_push($arrayFiltrosExcel, " AND CAST(S.Fech_Inser as DATE) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;
							// 11. Monto Activo
							case "MontoFactura":
								array_push($arrayFiltrosExcel, " AND (SELECT P.MontoFactura FROM siga_activo_proveedor P WHERE S.Id_Activo = P.Id_Activo) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;
							// 14. Fecha Baja Usuario Solicitante
							case "FechaBaja_UsrSolicitante":
								array_push($arrayFiltrosExcel, " AND S.Id_Activo IN (SELECT Id_Activo FROM siga_workflow_activo WHERE Aceptado = 1 AND CveWorkFlow = 1 AND CONVERT(VARCHAR, FechaAceptado, 103) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ")) ");
								break;
							// 15. Fecha Baja Dirección Financiera
							case "FechaBaja_UsrDirFinanciera":
								array_push($arrayFiltrosExcel, " AND S.Id_Activo IN (SELECT Id_Activo FROM siga_workflow_activo WHERE Aceptado = 1 AND CveWorkFlow = 4 AND CONVERT(VARCHAR, FechaAceptado, 103) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ")) ");
								break;
							// 16. Por Fecha Baja Contabilidad
							case "FechaBaja_UsrContabilidad":
								array_push($arrayFiltrosExcel, " AND S.Id_Activo IN (SELECT Id_Activo FROM siga_workflow_activo WHERE Aceptado = 1 AND CveWorkFlow = 5 AND CONVERT(VARCHAR, FechaAceptado, 103) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ")) ");
								break;
							// 17. Por Estatus (Workflow)
							case "WorkFlowPaso":
								if($parametrosConsulta->NombreTabla == "tablaactivos") {
									array_push($arrayFiltrosExcel, " AND S.Id_Activo IN (SELECT W_A.Id_Activo FROM siga_workflow_activos W_A WHERE W_A.Id_Activo = S.Id_Activo AND (W_A.Id_Baja IS NULL AND W_A.Id_Activo_Reubicacion IS NULL) GROUP BY W_A.Id_Activo HAVING MAX(W_A.CveWorkflow) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ")) ");
								}
								else if($parametrosConsulta->NombreTabla == "tablereubicacion") {
									array_push($arrayFiltrosExcel, " AND S.Id_Activo IN (SELECT W_A.Id_Activo FROM siga_workflow_activos W_A WHERE W_A.Id_Activo = S.Id_Activo AND (W_A.Id_Baja IS NULL AND W_A.Id_Activo_Reubicacion = SR.Id_Activo_Reubicacion) GROUP BY W_A.Id_Activo HAVING MAX(W_A.CveWorkflow) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ")) ");
								}
								else {
									array_push($arrayFiltrosExcel, " AND S.Id_Activo IN (SELECT W.Id_Activo FROM siga_workflow_activo W WHERE W.Aceptado = 1 GROUP BY W.Id_Activo HAVING MAX(W.CveWorkflow) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ")) ");
								}
								break;
							// 18. Por Motivo Baja
							case "Motivo_Baja":
								array_push($arrayFiltrosExcel, " AND S.Id_Activo IN (SELECT Id_Activo FROM siga_baja_activo WHERE Motivo_Baja IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ")) ");
								break;
							// 21. Ubicación Primaria Procedencia
							case "UbicacionPrimariaProcedencia":
								array_push($arrayFiltrosExcel, " AND (SELECT TOP(1) H.Id_Ubic_Prim FROM siga_historico_reubicacion H WHERE H.Id_Activo = S.Id_Activo) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;
							// 22. Ubicación Secundaria Procedencia
							case "UbicacionSecundariaProcedencia":
								array_push($arrayFiltrosExcel, " AND (SELECT TOP(1) H.Id_Ubic_Sec FROM siga_historico_reubicacion H WHERE H.Id_Activo = S.Id_Activo) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;
							// 34. Monto Factura
							case "Monto_F":
								array_push($arrayFiltrosExcel, " AND (SELECT P.Monto_F FROM siga_activo_proveedor P WHERE S.Id_Activo = P.Id_Activo) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;
							// 67. Frecuencia
							case "Frecuencia":
								array_push($arrayFiltrosExcel, " AND (SELECT TOP(1) Act.Id_Frecuencia FROM siga_actividades Act WHERE Act.Id_Area = S.Id_Area AND Act.Id_Activo = S.Id_Activo ORDER BY Act.Fech_Inser DESC) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;
							// 67. Realiza (Interno/Externo Mantenimiento Preventivo)
							case "Realiza":
								array_push($arrayFiltrosExcel, " AND (SELECT TOP(1) Act.Realiza FROM siga_actividades Act WHERE Act.Id_Area = S.Id_Area AND Act.Id_Activo = S.Id_Activo ORDER BY Act.Fech_Inser DESC) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;


							// PROVEEDORES
							// 41. Numero de Orden de Compra, 42. Fecha de Factura, 43. Número de Factura, 44. UUID, 45. Folio Fiscal, 46, Núm. Contrato, 47. Núm. Contrato
							// 48. Vida Util CHS, 49. Fecha Vencimiento, 50. Nombre Proveedor, 51. Contacto, 52. Teléfono, 53. Doc. Recibida, 54, Correo
							case "NumOrdenCompra":
							case "NumFactura":
							case "FechaFactura":
							case "UUID":
							case "Folio_Fiscal":
							case "NumContrato":
							case "VidaUtilFabricante":
							case "VidaUtilCHS":
							case "Fecha_Vencimiento":
							case "NombreProveedor":
							case "Contacto":
							case "Telefono":
							case "DocRecibida":
							case "Correo":
								array_push($arrayFiltrosExcel, " AND (P." . $lstFiltrosSuperior[$i] . ") IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;

							// CONTABILIDAD
							case "Centro_Costos":
							case "No_Capex":
							case "Prorrateo":
							case "Participa_Depreciacion":
							case "Fecha_Inicio_Depr":
							case "Cuent_Cont_Act":
							case "Cuent_Cont_Act_B10":
							case "Cuent_Cont_Result":
							case "Cuent_Cont_Result_B10":
							case "Cuent_Cont_Dep":
							case "Cuent_Cont_Dep_B10":
								array_push($arrayFiltrosExcel, " AND (C." . $lstFiltrosSuperior[$i] . ") IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;

							// Lista de campos que son texto simple o identificadores y están directamente relacionados con la tabla de Activos
							default:
								array_push($arrayFiltrosExcel, " AND RTRIM(LTRIM(S." . trim($lstFiltrosSuperior[$i]) . ")) IN (" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . ") ");
								break;
						}
					}
				}

				$Area = "";
				if($parametrosConsulta->getId_Area()!="") {
					if($parametrosConsulta->getId_Area()!='5') {
						// Mostrar los activos basados en el historico de reubicaciones por area
						if($parametrosConsulta->estatus == "tablereubicacion") {
							if($FechInicio!=""&&$FechFin!="") {
								$Area="	and SR.Fech_Inser between convert(date,'".$FechInicio."') and convert(date,'".$FechFin."') ";
							}
							else {
								if($FechInicio!=""&&$FechFin=="") {
									$Area = " AND SR.Fech_Inser = convert(date,'".$FechInicio."') ";
								}
								else {
									if($FechInicio==""&&$FechFin!="") {
										$Area = " AND SR.Fech_Inser = convert(date,'".$FechFin."')  ";
									}
								}
							}
							$Area .= " and (S.Id_Area=" . $parametrosConsulta->getId_Area()." or S.Id_Activo in ( select Id_Activo from siga_historico_reubicacion where Id_Area=" . $parametrosConsulta->getId_Area() . ") )";
						}
						else {
							$Area .= " and S.Id_Area=" . $parametrosConsulta->getId_Area()." ";
						}
					}
				}
					
				$Num_Empleado="";
				if($parametrosConsulta->getNum_Empleado()!=""){
					$Area .= " and S.Num_Empleado=" . $parametrosConsulta->getNum_Empleado() . " ";
				}
		
				//MontoFactura
				$sqltotal = "SELECT S.Id_Activo,
					S.AF_BC,
					S.Foto,
					S.Nombre_Activo,
					S.Marca,
					S.Modelo,
					S.NumSerie,
					S.Nombre_Completo,
					(select Nom_Area from siga_catareas A where A.id_Area = S.Id_Area) AS Id_Area,
					(select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,
					(select Des_Departamento from siga_cat_departamento D where D.Id_Departamento=S.Id_Departamento) as Id_Departamento,
					(select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad = S.Id_Propiedad) as Id_Propiedad,
					(select Desc_Estatus from siga_cat_estatus C where C.Id_Estatus=S.Id_Situacion_Activo) as Id_Situacion_Activo,
					(select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,
					(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as Id_Ubic_Prim,
					(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as Id_Ubic_Sec,
					S.Especifica AS UbicacionEspecifica,
					--isnull(S.Fech_Inser,'') as FechaAlta,
					--FORMAT(CAST(S.Fech_Inser AS DATE),'yyyy-MM-dd') as FechaAlta,
					FORMAT(CAST(S.Fech_Inser AS DATE),'yyyy-MM-dd') as Fech_Inser,
					--FORMAT(S.Fech_Inser,'yyyy-MM-dd') as FechaAlta,
					--convert(varchar,S.Fech_Inser,23) as FechaAlta,
					S.Fech_Inser as FechaAlta,

					--S.Fech_Inser,
					(SELECT F.Desc_Familia FROM siga_cat_familia F WHERE F.Id_Familia = S.Id_Familia) AS Id_Familia,
					(SELECT S_F.Desc_Subfamilia FROM siga_cat_subfamilia S_F WHERE S_F.Id_Subfamilia = S.Id_Subfamilia) AS Id_SubFamilia,
					(SELECT M_A.Desc_Motivo_Alta FROM siga_cat_motivo_alta M_A WHERE M_A.Id_Motivo_Alta = S.Id_Motivo_Alta) AS Id_Motivo_Alta,
					S.DescLarga,
					(CASE WHEN S.ParticipaCertificacion = 1 THEN 'Si' ELSE 'No' END) AS ParticipaCertificacion,
					(CASE WHEN S.ParticipaSeguros = 1 THEN 'Si' ELSE 'No' END) AS ParticipaSeguros,
					S.Num_Empleado,
					(SELECT V.Desc_Tipo_Vale_Resg FROM siga_cat_tipo_vale_resg V WHERE V.Id_Tipo_Vale_Resg = S.Id_Tipo_Vale_Resg) AS Id_Tipo_Vale_Resg,
					S.Garantia,
					S.ExtGarantia,
					(SELECT U.Nombre_Usuario FROM siga_usuarios U WHERE U.Id_Usuario = S.Usr_Inser) AS Usr_Inser,
					(SELECT T_A.Desc_Tipo_Activo FROM siga_cat_tipo_activo T_A WHERE T_A.Id_Tipo_Activo = S.Id_Tipo_Activo) AS Id_Tipo_Activo,
					ISNULL((SELECT siga_condicion_de_recepcion_descripcion FROM siga_cat_condicion_de_recepcion WHERE siga_condicion_de_recepcion_id=s.siga_activos_condicion_recepcion),'') AS siga_activos_condicion_recepcion,
					FORMAT(CAST(S.siga_activos_fch_recepcion_equipo AS DATE),'yyyy-MM-dd') AS siga_activos_fch_recepcion_equipo,					
					FORMAT(CAST(S.siga_activos_fch_operacion AS DATE),'yyyy-MM-dd') AS siga_activos_fch_operacion,
					/* Proveedores */
					P.NumOrdenCompra,
					P.NumFactura,
					P.FechaFactura,
					P.UUID,
					P.Folio_Fiscal,
					P.NumContrato,
					P.VidaUtilFabricante,
					P.VidaUtilCHS,
					P.Fecha_Vencimiento,
					P.NombreProveedor,
					P.Contacto,
					P.Telefono,
					P.DocRecibida,
					P.Correo,
					P.Link,

					/* Contabilidad */
					(SELECT C_C.Desc_Centro_de_costos FROM siga_cat_centro_de_costos C_C WHERE C_C.Id_Centros_de_costos = C.Centro_Costos) AS Centro_Costos,
					C.No_Capex,
					C.Prorrateo,
					(CASE WHEN C.Participa_Depreciacion = 1 THEN 'Si' ELSE 'No' END) AS Participa_Depreciacion,
					C.Fecha_Inicio_Depr,
					C.Cuent_Cont_Act,
					C.Cuent_Cont_Act_B10,
					C.Cuent_Cont_Result,
					C.Cuent_Cont_Result_B10,
					C.Cuent_Cont_Dep,
					C.Cuent_Cont_Dep_B10,
					
					/* Mantenimiento Preventivo */
					(SELECT TOP 1
						(SELECT TOP 1 Desc_Frecuencia FROM siga_cat_frecuencia WHERE siga_cat_frecuencia.Id_Frecuencia = siga_actividades.Id_Frecuencia)
						FROM siga_actividades WHERE siga_actividades.Id_Area=S.Id_Area AND siga_actividades.Id_Activo=S.Id_Activo ORDER BY Fech_Inser DESC
					) AS Frecuencia,
					(SELECT TOP 1 Realiza FROM siga_actividades WHERE siga_actividades.Id_Area = S.Id_Area AND siga_actividades.Id_Activo = S.Id_Activo ORDER BY Fech_Inser DESC) AS Realiza, ";
		
				if($parametrosConsulta->estatus == "baja" || $parametrosConsulta->estatus == "baja2" || $parametrosConsulta->estatus=="baja3") {
					$sqltotal .= "	SB.Comentarios,
									(SELECT top 1  rtrim(ltrim(us.No_Usuario))+'-'+rtrim(ltrim(us.Nombre_Usuario)) from siga_usuarios us where us.Id_Usuario=SB.Usuario) as Usuario_Solicitante_Baja, 
									(select top 1 Desc_Destino_Final from siga_cast_destino_final dest_f where dest_f.Id_Destino_final=SB.Destino) as Destino_Final,
									(select top 1 Desc_Motivo_baja from siga_cast_motivo_baja mot_b where mot_b.Id_Motivo_baja=SB.Motivo_Baja) as Motivo_Baja,
									(select top 1 FechaAceptado from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=1) as FechaBaja_UsrSolicitante,
									(select top 1 (select top 1  rtrim(ltrim(usr.No_Usuario))+'-'+rtrim(ltrim(usr.Nombre_Usuario)) from siga_usuarios usr where usr.Id_Usuario=sw.Id_Usuario) from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=2) as Usuario_Responsable_Baja,
									/*(select top 1 FechaAceptado from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=2) as fecha_baja_usr_responsable,*/
									(select top 1 FechaAceptado from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=4) as FechaBaja_UsrDirFinanciera,
									(select top 1 FechaAceptado from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=5) as FechaBaja_UsrContabilidad, ";
				}
				
				// $sqltotal .= "	CONVERT(VARCHAR, CONVERT(VARCHAR, CAST((select top 1 MontoFactura from siga_activo_proveedor T where T.Id_Activo=S.Id_Activo)  AS MONEY), 1)) AS MontoFactura,
				// 				CONVERT(VARCHAR, CONVERT(VARCHAR, CAST((select top 1 Monto_F from siga_activo_proveedor T where T.Id_Activo=S.Id_Activo)  AS MONEY), 1)) AS Monto_F,
				// 				CONVERT(VARCHAR, CONVERT(VARCHAR, CAST(ImporteSeguros  AS MONEY), 1)) as ImporteSeguros, ";

				$sqltotal .= "	(select top 1 CAST(MontoFactura as NUMERIC(10,2)) from siga_activo_proveedor T where T.Id_Activo=S.Id_Activo) AS MontoFactura,
								(select top 1 CAST(Monto_F as NUMERIC(10,2)) from siga_activo_proveedor T where T.Id_Activo=S.Id_Activo) AS Monto_F,
								CONVERT(NUMERIC(10,2), ImporteSeguros) AS ImporteSeguros, ";

				if($parametrosConsulta->estatus == "tablereubicacion") {
					$sqltotal .= "	(select top 1  Desc_Ubic_Prim from siga_cat_ubic_prim where (select top 1 HR.Id_Ubic_Prim from siga_historico_reubicacion HR where HR.Id_Activo_Reubicacion=SR.Id_Activo_Reubicacion)=siga_cat_ubic_prim.Id_Ubic_Prim) AS UbicacionPrimariaProcedencia,
									(select top 1  Desc_Ubic_Sec from siga_cat_ubic_sec where (select top 1 HR.Id_Ubic_Sec from siga_historico_reubicacion HR where HR.Id_Activo_Reubicacion=SR.Id_Activo_Reubicacion)=siga_cat_ubic_sec.Id_Ubic_Sec) AS UbicacionSecundariaProcedencia,
									(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=SR.Id_Ubic_Prim) as UbicacionPrimariaReu,
									(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=SR.Id_Ubic_Sec) as UbicacionSecundariaReu,
									Ubic_Especifica,
									(select Nom_Area from siga_catareas T where T.Id_Area=SR.Id_Area) as Id_AreaReu,SR.Fech_Inser as Fecha_Reubicacion,";
				}
				else {
					// No aplica para otras tablas que no sean Reubicación
					$sqltotal .= "	'' AS UbicacionPrimariaProcedencia,
									'' AS UbicacionSecundariaProcedencia,
									'' as Id_AreaReu,";
				}
				
				$sqltotal .= "(select isnull(FORMAT(Fecha_Baja,'dd/MM/yyyy'),'') from siga_baja_activo A where A.Id_Activo=S.Id_Activo and Estatus_Cancelacion<>1) as Fecha_Baja, ";

				// Determina el paso correspondiente en el workflow
				if($parametrosConsulta->estatus == "tablaactivos") {
					$sqltotal .= " (SELECT MAX(CveWorkflow) FROM siga_workflow_activos W_A WHERE W_A.Id_Activo = S.Id_Activo AND (Id_Baja IS NULL AND Id_Activo_Reubicacion IS NULL)) AS WorkFlowPaso, ";
				}
				else if($parametrosConsulta->estatus == "tablereubicacion") {
					// Paso máximo del workflow del activo cuando es una reubicación
					$sqltotal .= " (SELECT TOP(1) CveWorkflow FROM siga_workflow_activos W_A WHERE W_A.Id_Activo = S.Id_Activo AND (Id_Baja IS NULL AND Id_Activo_Reubicacion IS NOT NULL) AND Id_Activo_Reubicacion = SR.Id_Activo_Reubicacion ORDER BY FechaAlta DESC) AS WorkFlowPaso " . $baja_reubicacion . ", ";
				}
				else {
					$sqltotal .= " (select WorkFlowPaso from siga_baja_activo A where A.Id_Activo=S.Id_Activo and Estatus_Cancelacion<>1) as WorkFlowPaso " . $baja_reubicacion . ", ";				
				}
				// Número total de pasos x workflow
				$sqltotal .= "	(SELECT MAX(CveWorkflow) FROM siga_workflow WHERE ProcesoNombre = '" . $parametrosConsulta->NombreTabla . "' AND Aplica = 1) AS WorkFlowPasoTotal,
								(SELECT COUNT(*) FROM siga_activo_accesorio_consumible A_C WHERE A_C.Id_Activo = S.Id_Activo) AS CuentaAccesoriosConsumibles
				FROM siga_activos S
				LEFT JOIN siga_activo_proveedor P ON P.Id_Activo = S.Id_Activo
				LEFT JOIN (SELECT * FROM siga_activos_contabilidad WHERE Fech_Inser IS NOT NULL) C ON S.Id_Activo = C.Id_Activo
				" . $baja . " " . $reubicacion . " where 0=0 " . $clase_biomedica . $EstatusReg . $Area . implode(" ", $arrayFiltrosExcel) . $Num_Empleado;
		
				/*
				$sql = "select * from (".$sqltotal.") siga_activos " . $Filtros_Fech_Baja . $criterios . $ordenamiento . $pagina;
				$sql = str_replace("ORDER BY FechaAlta desc", "ORDER BY Fech_Inser desc", $sql);
				$sql = str_replace("ORDER BY FechaAlta asc", "ORDER BY Fech_Inser asc", $sql);
				*/

				$sql = "; WITH TempResult AS( ".$sqltotal." )
						SELECT *, NumRegistrosConsulta = COUNT(*) OVER() FROM TempResult " .
						$Filtros_Fech_Baja . $criterios . $ordenamiento . $pagina;
				/*
				$sql = str_replace("ORDER BY FechaAlta desc", "ORDER BY Fech_Inser desc", $sql);
				$sql = str_replace("ORDER BY FechaAlta asc", "ORDER BY Fech_Inser asc", $sql);
				*/
				// Ejecución de la sentencia de consulta
				$reader = $conn->execute($sql);

				if($reader) {
					// Recorre los registros encontrados
					while($row = $_proveedor->fetch_array($reader, 0)) {
							$recordsTotal = $row["NumRegistrosConsulta"];
							$data[] = array("Id_Activo" => $row["Id_Activo"],
							
							"AF_BC" => trim($row["AF_BC"]),
							"Marca" => trim($row["Marca"]),
							//"Modelo" => $sql,
							"Modelo" => $row["Modelo"],
							"NumSerie" => $row["NumSerie"],
							"Tipo_Vale" => $row["Tipo_Vale"],
							"Foto" => $row["Foto"],
							"Nombre_Activo" => $row["Nombre_Activo"],
							"Id_Area" => $row["Id_Area"],
							"Id_Departamento" => $row["Id_Departamento"],
							"Clasificacion" => $row["Clasificacion"],
							"Id_Propiedad" => $row["Id_Propiedad"],
							"Id_Situacion_Activo" => $row["Id_Situacion_Activo"],
							"TipoActivo" => $row["TipoActivo"],
							"DescCorta" => $row["DescCorta"],
							"Nombre_Completo" => $row["Nombre_Completo"],
							"Num_Empleado" => $row["Num_Empleado"],
							"Id_Ubic_Prim" => $row["Id_Ubic_Prim"],
							"Id_Ubic_Sec" => $row["Id_Ubic_Sec"],
							"UbicacionEspecifica" => $row["UbicacionEspecifica"],
							"ParticipaCertificacion" => $row["ParticipaCertificacion"],
							"ParticipaSeguros" => $row["ParticipaSeguros"],
							"Id_Tipo_Vale_Resg" => $row["Id_Tipo_Vale_Resg"],
							"Garantia" => $row["Garantia"],
							"ExtGarantia" => $row["ExtGarantia"],
							"Usr_Inser" => $row["Usr_Inser"],
							"FechaAlta" => $row["FechaAlta"],

							/* Bajas */
							"Fecha_Baja" => $row["Fecha_Baja"],
							"WorkFlowPaso" => $row["WorkFlowPaso"],
							"WorkFlowPasoTotal" => $row["WorkFlowPasoTotal"],
							"FechaBaja_UsrSolicitante" => $row["FechaBaja_UsrSolicitante"],
							//"fecha_baja_usr_responsable" => $row["fecha_baja_usr_responsable"],
							"FechaBaja_UsrDirFinanciera" => $row["FechaBaja_UsrDirFinanciera"],
							"FechaBaja_UsrContabilidad" =>$row["FechaBaja_UsrContabilidad"],
							"Fecha_Reubicacion" => $row["Fecha_Reubicacion"],
							"Usuario_Solicitante_Baja" => $row["Usuario_Solicitante_Baja"],
							"Usuario_Responsable_Baja" => $row["Usuario_Responsable_Baja"],
							"Motivo_Baja" => $row["Motivo_Baja"],
							"Comentarios" => $row["Comentarios"],

							/* Reubicación */
							"Id_Baja_Reubicacion" => $row["Id_Baja_Reubicacion"],
							"UbicacionPrimariaProcedencia" => $row["UbicacionPrimariaProcedencia"],
							"UbicacionSecundariaProcedencia" => $row["UbicacionSecundariaProcedencia"],
							"Id_Familia" => $row["Id_Familia"],
							"Id_SubFamilia" => $row["Id_SubFamilia"],
							"Id_Motivo_Alta" => $row["Id_Motivo_Alta"],
							"ImporteSeguros" => $row["ImporteSeguros"],
							"DescLarga" => $row["DescLarga"],
							"Id_Tipo_Activo" => $row["Id_Tipo_Activo"],
							"CuentaAccesoriosConsumibles" => $row["CuentaAccesoriosConsumibles"],
							"Destino_Final" => $row["Destino_Final"],
							"UbicacionPrimariaReu" => $row["UbicacionPrimariaReu"],
							"UbicacionSecundariaReu" => $row["UbicacionSecundariaReu"],
							"Ubic_Especifica" => $row["Ubic_Especifica"],
							"Id_AreaReu" =>$row["Id_AreaReu"],

							/* Proveedores */
							"NumOrdenCompra" => $row["NumOrdenCompra"],
							"NumFactura" => $row["NumFactura"],
							"FechaFactura" => $row["FechaFactura"],
							"NumContrato" => $row["NumContrato"],
							"Folio_Fiscal" => $row["Folio_Fiscal"],
							//"FechaFactura" => $row["FechaFactura"],
							"UUID" => $row["UUID"],
							"VidaUtilFabricante" => $row["VidaUtilFabricante"],
							"VidaUtilCHS" => $row["VidaUtilCHS"],
							"Fecha_Vencimiento" => $row["Fecha_Vencimiento"],
							"NombreProveedor" => $row["NombreProveedor"],
							"Contacto" => $row["Contacto"],
							"Telefono" => $row["Telefono"],
							"DocRecibida" => $row["DocRecibida"],
							"Correo" => $row["Correo"],
							"MontoFactura" => $row["MontoFactura"],
							"Monto_F" => $row["Monto_F"],
							"siga_activos_condicion_recepcion" => $row["siga_activos_condicion_recepcion"],							
							"siga_activos_fch_recepcion_equipo" => $row["siga_activos_fch_recepcion_equipo"],
							"siga_activos_fch_operacion" => $row["siga_activos_fch_operacion"],							
							"Link" => "<a href='".$row["Link"]."' target='_blank'>Link</a>",

							/* Contabilidad */
							"Centro_Costos" => $row["Centro_Costos"],
							"No_Capex" => $row["No_Capex"],
							"Prorrateo" => $row["Prorrateo"],
							"Participa_Depreciacion" => $row["Participa_Depreciacion"],
							"Fecha_Inicio_Depr" => $row["Fecha_Inicio_Depr"],
							"Cuent_Cont_Act" => $row["Cuent_Cont_Act"],
							"Cuent_Cont_Act_B10" => $row["Cuent_Cont_Act_B10"],
							"Cuent_Cont_Result" => $row["Cuent_Cont_Result"],
							"Cuent_Cont_Result_B10" => $row["Cuent_Cont_Result_B10"],
							"Cuent_Cont_Dep" => $row["Cuent_Cont_Dep"],
							"Cuent_Cont_Dep_B10" => $row["Cuent_Cont_Dep_B10"],

							/* Mantenimiento preventivo */
							"Frecuencia" => $row["Frecuencia"] != null ? $row["Frecuencia"] : "NO ASIGNADO",
							"Realiza" => $row["Realiza"] != null ? ($row["Realiza"] == 0 ? "Interno" : "Externo") : "NO ASIGNADO",
						);
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$data[] = array(
							"Id_Activo" => abs($conn->_errorNo()) * -1,
							"Modelo" => $conn->_errorDescripcion()[2],
							"Sql" => $sql
					);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
				$data[] = array(
					"Id_Activo" => -1,
					"Modelo" => $e->getMessage()
				);
			}
			finally {
				// Cierra la conexión a la BD y libera el Recordset utilizado
				$_proveedor->free_result($reader);
				$_proveedor->close();
			}

			// Retorna el elemento
			return trim('{"draw":"' . $parametrosConsulta->draw . '", "recordsTotal":"' . $recordsTotal. '", "recordsFiltered":"' . $recordsTotal . '", "data":' . json_encode($data) . ', "cuenta":"#cuenta#"}');
		}


		// Obtiene la lista de elementos para generar un Filtro Tipo Excel
		public function FiltroSuperiorGenericoGet(ActivoFijoInventarioConsultasModel $parametrosConsulta) {
			// Definición de la conexión
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();
			// Variables globales
			$recordsTotal = 0;
			// Array con la información de los registros 
			$data = array();

			try {
				$arrayParametros = [];
				// Definición de la columna tipo Excel a generar
				if($parametrosConsulta->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosConsulta->Id_Area); }
				if($parametrosConsulta->NombreTabla != null) { array_push($arrayParametros, "@NombreTabla='" . $parametrosConsulta->NombreTabla . "'"); }
				if($parametrosConsulta->NombreCampo != null) { array_push($arrayParametros, "@NombreCampo='" . $parametrosConsulta->NombreCampo . "'"); }
				// Lista de Filtros que fueron seleccionados antes que el campo que se va a recuperar
				// Recupera la variable en donde vienen especificados los campos de manera dinamica
				$lstFiltrosSuperior = [];
				if($parametrosConsulta->lstFiltrosSuperior != null) {
					$lstFiltrosSuperior = explode("|", $parametrosConsulta->lstFiltrosSuperior);
					// Deben coincidir los nombre dinamicos establecidos en el catálogo para identificar cada campo sin que se escriba código para cada uno de manera tradicional
					for($i = 0; $i < count($lstFiltrosSuperior); $i++) {
						if($parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } != null) {
							array_push($arrayParametros, "@FiltroSuperior_" . trim($lstFiltrosSuperior[$i]) . "='" . $parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } . "'");
						}
					}
				}

				// Ejecución de la cadena
				$sql = "EXEC sp_siga_activo_fijo_inventario_filtro_excel_get " . implode(",", $arrayParametros);
				$reader = $conn->execute($sql);
				if($reader) {
					// Recorre los registros encontrados y los almacena en un arreglo
					while($row = $_proveedor->fetch_array($reader, 0)) {
						$data[] = array(
							"DespliegueValor" => $row["DespliegueValor"],
							"DespliegueTexto" => $row["DespliegueTexto"],
							"Sql" => $sql
						);
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$data[] = array(
						"DespliegueValor" => abs($conn->_errorNo()) * -1,
						"DespliegueTexto" => $conn->_errorDescripcion()[2],
						"Sql" => $sql
					);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
				$data[] = array(
					"DespliegueValor" => -1,
					"DespliegueTexto" => $e->getMessage()
				);
			}
			finally {
				// Cierra la conexión a la BD y libera el Recordset utilizado
				$_proveedor->free_result($reader);
				$_proveedor->close();
			}
			// Retorna el elemento
			return '{ "totalCount":"' . count($data) . '", "data":' . json_encode($data) . ', "estatus":"' . $sql . '", "mensaje":"Registros Encontrados", "cuenta":"#cuenta#" }';
		}
	}
?>