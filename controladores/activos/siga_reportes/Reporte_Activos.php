<?php
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");

@$Val1=$_POST['Val1'];
@$Val2=$_POST['Val2'];
@$Val3=$_POST['Val3'];
@$Val4=$_POST['Val4'];
@$Val5=$_POST['Val5'];
@$Val6=$_POST['Val6'];
@$Val7=$_POST['Val7'];
@$Val8=$_POST['Val8'];
@$Val9=$_POST['Val9'];
@$Val10=$_POST['Val10'];
@$Val11=$_POST['Val11'];
@$Val12=$_POST['Val12'];

@$Val13=$_POST['Val13'];
@$Val14=$_POST['Val14'];
@$Val15=$_POST['Val15'];
@$Val16=$_POST['Val16'];
@$Val17=$_POST['Val17'];
@$Val18=$_POST['Val18'];
@$Val19=$_POST['Val19'];
@$Val20=$_POST['Val20'];
@$Val21=$_POST['Val21'];
@$Val22=$_POST['Val22'];
@$Val23=$_POST['Val23'];
@$Val24=$_POST['Val24'];
@$Val25=$_POST['Val25'];
@$Baja=$_POST['hddbaja'];
@$Check_Seleccionados=explode( '-', $_POST['Check_Seleccionados'] );
@$Filtros="";

$proveedor = new Proveedor('sqlserver', 'activos');
$proveedor->connect();
			

			
			if(($Val1!="") ||($Val2!="") ||($Val3!="") ||($Val4!="") ||($Val5!="") ||($Val6!="") ||($Val7!="") ||($Val8!="") ||($Val9!="") ||($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
			}
			
			if($Val1!=""){
				$Filtros.="Id_Activo in(".$Val1.")";
				if(($Val2!="") ||($Val3!="") ||($Val4!="") ||($Val5!="") ||($Val6!="") ||($Val7!="") ||($Val8!="") ||($Val9!="") ||($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val2!=""){
				$Filtros.="Id_Ubic_Prim in(".$Val2.")";
				if(($Val3!="") ||($Val4!="") ||($Val5!="") ||($Val6!="") ||($Val7!="") ||($Val8!="") ||($Val9!="") ||($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val3!=""){
				$Filtros.="Id_Ubic_Sec in(".$Val3.")";
				if(($Val4!="") ||($Val5!="") ||($Val6!="") ||($Val7!="") ||($Val8!="") ||($Val9!="") ||($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val4!=""){
				$Filtros.="S.Id_Area in(".$Val4.")";
				if(($Val5!="") ||($Val6!="") ||($Val7!="") ||($Val8!="") ||($Val9!="") ||($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val5!=""){
				$Filtros.="Id_Propiedad in(".$Val5.")";
				if(($Val6!="") ||($Val7!="") ||($Val8!="") ||($Val9!="") ||($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val6!=""){
				$Filtros.="Id_Familia in(".$Val6.")";
				if(($Val7!="") ||($Val8!="") ||($Val9!="") ||($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val7!=""){
				$Filtros.="Id_Subfamilia in(".$Val7.")";
				if(($Val8!="") ||($Val9!="") ||($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val8!=""){
				$Filtros.="Id_Departamento in(".$Val8.")";
				if(($Val9!="") ||($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val9!=""){
				$Filtros.="Num_Empleado in(".$Val9.")";
				if(($Val10!="") ||($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val10!=""){
				$Filtros.="Id_Motivo_Alta in(".$Val10.")";
				if(($Val11!="") ||($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val11!=""){
				$Filtros.="Id_Tipo_Activo in(".$Val11.")";
				if(($Val12!="")||($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val12!=""){
				$Filtros.="Id_Tipo_Vale_Resg in(".$Val12.")";
				if(($Val13!="") ||($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val13!=""){
				$Filtros.="Id_Clasificacion in(".$Val13.")";
				if(($Val14!="") ||($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val14!=""){
				$Filtros.="rtrim(ltrim(Marca)) in(".$Val14.")";
				if(($Val15!="") ||($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val15!=""){
				$Filtros.="rtrim(ltrim(Modelo)) in(".$Val15.")";
				if(($Val16!="") ||($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val16!=""){
				$Filtros.="rtrim(ltrim(NumSerie)) in(".$Val16.")";
				if(($Val17!="") ||($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val17!=""){
				$Filtros.="ParticipaPre in(".$Val17.")";
				if(($Val18!="") ||($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val18!=""){
				$Filtros.="ParticipaSeguros in(".$Val18.")";
				if(($Val19!="") ||($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val19!=""){
				$Filtros.="ImporteSeguros='".$Val19."'";
				if(($Val20!="") ||($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val20!=""){
				$Filtros.="ParticipaCertificacion in(".$Val20.")";
				if(($Val21!="") ||($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val21!=""){
				$Filtros.="Garantia='".$Val21."'";
				if(($Val22!="") ||($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val22!=""){
				$Filtros.="ExtGarantia='".$Val22."'";
				if(($Val23!="") ||($Val24!="") ||($Val25!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($Val23!=""){
				$Filtros.="DescLarga='".$Val23."'";
				if(($Val24!="") ||($Val25!="") ){
				$Filtros.=" AND ";
				}
			}
			
			if($Val24!=""){
				$Filtros.="DescCorta='".$Val24."'";
				if(($Val25!="") ){
				$Filtros.=" AND ";
				}
			}
			
			if($Val25!=""){
				$Filtros.="Especifica like'%".$Val25."%'";
			}
			


			$Sql_Baja = "";
			/*
			if($Baja == 0){
				//$Sql_Baja=" and  S.Id_Activo not in (select Id_Activo from siga_baja_activo where Estatus_Cancelacion<>1)";
				$Sql_Baja=" and  SB.EstatusBaja is null ";
			}
			else{
				//$Sql_Baja=" and SB.Estatus_Cancelacion<>1 ";
			}
			*/
			if($Baja == 0) {
				// Lista de Activos en Operación
				// Considera los Activos que no han tenido operaciones de Baja
				$Sql_Baja = " AND ( SB.Id_baja IS NULL ";
				// Considera además los activos que estuvieron dados de baja o en proceso pero volvieron a Operación
				// Cuando haya más de 1 movimiento en la baja, se toma el que haya ocurrido más reciente y si se trata de la misma fecha,
				// toma el último que se insertó en la Base de datos ya que debería ser el último movimiento
				// Estatus_Cancelacion = 1 y EstatusBaja = 0: Baja en proceso
				$Sql_Baja .= "		OR (
										 S.Id_Activo IN (
											SELECT B_1.Id_Activo
											FROM siga_baja_activo B_1
												INNER JOIN
													(
														SELECT TOP 1 WITH TIES
															Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
														FROM siga_baja_activo
														ORDER BY
															ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
													) B_2
												ON B_1.Fecha_Baja = B_2.UltimoRegistro
											AND B_1.Id_Activo = B_2.Id_Activo
											AND B_1.Id_baja = B_2.UltimoMovimiento
											WHERE
												B_1.Estatus_Cancelacion = 1 AND B_1.EstatusBaja = 0
										)
									)
								)";
			}
			else {
				// Lista de Activos que están en Proceso de Baja o que son Baja definitiva
				// Cuando haya más de 1 movimiento en la baja, se toma el que haya ocurrido más reciente y si se trata de la misma fecha,
				// toma el último que se insertó en la Base de datos ya que debería ser el último movimiento
				// Estatus_Cancelacion = 0 y EstatusBaja = 1: Baja definitiva
				// Estatus_Cancelacion = 0 y EstatusBaja = 0: No derfinido pero en algún lugar debe estar considerado
				$Sql_Baja = " AND (S.Id_Activo IN (
										SELECT B_1.Id_Activo
										FROM siga_baja_activo B_1
											INNER JOIN
												(
													SELECT TOP 1 WITH TIES
														Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
													FROM siga_baja_activo
													ORDER BY
														ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
												) B_2
											ON B_1.Fecha_Baja = B_2.UltimoRegistro
										AND B_1.Id_Activo = B_2.Id_Activo
										AND B_1.Id_baja = B_2.UltimoMovimiento
										WHERE
											(B_1.Estatus_Cancelacion = 0 AND B_1.EstatusBaja = 0)
											OR
											(B_1.Estatus_Cancelacion = 0 AND B_1.EstatusBaja = 1)
									)
								)";
			}


			$sql="SELECT DISTINCT S.Id_Activo,convert(varchar, S.Fech_Inser, 111) as Fech_Inser,S.AF_BC,S.Foto,S.Nombre_Activo,S.Num_Empleado, S.Especifica, S.Nombre_Completo,S.Marca, S.Modelo, S.NumSerie,S.DescLarga,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,";
			$sql.=" S.ParticipaPre, S.ParticipaSeguros, S.ImporteSeguros, S.ParticipaCertificacion,S.Garantia,S.ExtGarantia,S.Anexo,";
			$sql.=" (select top 1 (select top 1 Desc_Frecuencia from siga_cat_frecuencia where siga_cat_frecuencia.Id_Frecuencia=siga_actividades.Id_Frecuencia) as Frecuencia ";
			$sql.=" from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Frecuencia, ";
			$sql.="	( select top 1 Realiza from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Realiza,";
			$sql.=" (select top 1 rtrim(ltrim(No_Usuario))+' - '+ rtrim(ltrim(Nombre_Usuario)) as Usuario_Registro from siga_usuarios where Id_Usuario=S.Usr_Inser) as Usuario_Registro, ";
			$sql.=" (select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,";
			$sql.=" (select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad=S.Id_Propiedad) as Propiedad,";
			$sql.=" (select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,";
			$sql.=" (select Desc_Tipo_Vale_Resg from siga_cat_tipo_vale_resg T where T.Id_Tipo_Vale_Resg=S.Id_Tipo_Vale_Resg) as Tipo_Vale,";
			$sql.=" (select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,";
			$sql.=" (select Desc_Motivo_Alta from siga_cat_motivo_alta M where M.Id_Motivo_Alta=S.Id_Motivo_Alta) as Motivo_Alta,";
			$sql.=" (select Des_Departamento from siga_cat_departamento D where D.Id_Departamento=S.Id_Departamento) as Departamento,";
			$sql.=" (select Desc_Familia from siga_cat_familia F where F.Id_Familia=S.Id_Familia) as Familia,";
			$sql.=" (select Desc_Subfamilia from siga_cat_subfamilia Su where Su.Id_Subfamilia=S.Id_Subfamilia) as Subfamilia,";
			$sql.=" (select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria,";
			
			//Datos Proveedor
			$sql .= "NumOrdenCompra,NumFactura,FechaFactura,UUID,Folio_Fiscal,Monto_F,MontoFactura,NumContrato,VidaUtilFabricante,";
			$sql .= "VidaUtilCHS,AP.Garantia as Garantia_P ,AP.ExtGarantia as ExtGarantia_P,Fecha_Vencimiento,Poliza_Url,NombreProveedor,Contacto,Telefono,DocRecibida,";
			$sql .= "Correo,Link,isnull(S.siga_activos_fch_recepcion_equipo,'') as siga_activos_fch_recepcion_equipo, ISNULL(S.siga_activos_fch_operacion,'') as siga_activos_fch_operacion,S.siga_activos_condicion_recepcion,";
			$sql .= "(SELECT siga_condicion_de_recepcion_descripcion FROM siga_cat_condicion_de_recepcion WHERE siga_condicion_de_recepcion_id=S.siga_activos_condicion_recepcion) as siga_activos_condicion_recepcion,";

			$sql .= "(SELECT STUFF((SELECT ', (' + A_C.SKU + ') ' + A_C.Descripcion FROM siga_activo_accesorio_consumible A_C WHERE A_C.Tipo = 1 AND S.Id_Activo = A_C.Id_Activo ORDER BY A_C.SKU DESC FOR XML PATH ('')),1,1,'')) AS Accesorios,";
			$sql .= "(SELECT STUFF((SELECT ', (' + A_C.SKU + ') ' + A_C.Descripcion FROM siga_activo_accesorio_consumible A_C WHERE A_C.Tipo = 2 AND S.Id_Activo = A_C.Id_Activo ORDER BY A_C.SKU DESC FOR XML PATH ('')),1,1,'')) AS Consumibles,";

			//Datos Contabilidad
			$sql.=" CC.Desc_Centro_de_costos as Centro_Costos, No_Capex, Prorrateo, case when Participa_Depreciacion='1' then 'Si' when Participa_Depreciacion='0' then 'No' end as Participa_Depreciacion, Fecha_Inicio_Depr,";
			$sql.=" Cuent_Cont_Act, Cuent_Cont_Act_B10, Cuent_Cont_Result, Cuent_Cont_Result_B10, Cuent_Cont_Dep, Cuent_Cont_Dep_B10";
			$sql.=" FROM siga_activos S ";
			$sql.=" left outer join siga_activo_proveedor AP on S.Id_Activo=AP.id_Activo ";
			//$sql.=" left outer join siga_activos_contabilidad AC on S.Id_Activo=AC.Id_Activo ";
			$sql.=" left outer join (select * from siga_activos_contabilidad where Fech_Inser is not null) AC on S.Id_Activo=AC.Id_Activo ";
			$sql.=" left outer join siga_cat_centro_de_costos CC on AC.Centro_Costos=CC.Id_Centros_de_costos 
					left outer join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo 
			";
			$sql.=" where 0=0 and S.Estatus_Reg <> '3' ".$Filtros.$Sql_Baja;

$proveedor->execute($sql);

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../../../PHPExcel/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
						 ->setLastModifiedBy("Maarten Balliauw")
						 ->setTitle("Office 2007 XLSX Test Document")
						 ->setSubject("Office 2007 XLSX Test Document")
						 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
						 ->setKeywords("office 2007 openxml php")
						 ->setCategory("Test result file");
if($Check_Seleccionados[0]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[0].'1', 'AF/BC', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[0].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[1]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[1].'1', 'Nombre Activo', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[1].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[2]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[2].'1', 'Área', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[2].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[3]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[3].'1', 'Ubicación Primaria', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[3].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[4]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[4].'1', 'Ubicación Secundaria', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[4].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[5]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[5].'1', 'Ubicación Especifica', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[5].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[6]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[6].'1', 'Descripción Larga', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[6].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[7]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[7].'1', 'Descripción Corta', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[7].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[8]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[8].'1', 'Motivo Alta', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[8].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[9]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[9].'1', 'Propiedad', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[9].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[10]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[10].'1', 'Clasificación', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[10].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[11]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[11].'1', 'Familia', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[11].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[12]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[12].'1', 'Subfamilia', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[12].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[13]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[13].'1', 'Marca', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[13].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[14]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[14].'1', 'Modelo', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[14].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[15]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[15].'1', 'Numero de Serie', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[15].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[16]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[16].'1', 'Tipo de activo', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[16].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[17]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[17].'1', 'Participa en Pre', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[17].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[18]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[18].'1', 'Participa en Seguros', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[18].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[19]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[19].'1', 'Importe Seguros', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[19].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[20]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[20].'1', 'Participa Certificacion', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[20].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[21]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[21].'1', 'Num. Empleado', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[21].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[22]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[22].'1', 'Nombre Resguardo', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[22].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[23]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[23].'1', 'Tipo Vale', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[23].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[24]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[24].'1', 'Garantia', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[24].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[25]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[25].'1', 'Ext. Garantia', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[25].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[26]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[26].'1', 'Departamento', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[26].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
//Datos Proveedor
if($Check_Seleccionados[27]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[27].'1', 'Num. Orden Compra', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[27].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[28]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[28].'1', 'Num. Factura', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[28].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[29]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[29].'1', 'Fecha Factura', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[29].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[30]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[30].'1', 'UUID', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[30].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[31]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[31].'1', 'Folio Fiscal', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[31].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[32]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[32].'1', 'Monto Activo', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[32].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[33]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[33].'1', 'Monto Factura', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[33].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[34]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[34].'1', 'Núm. Contrato', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[34].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[35]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[35].'1', 'Vida Util Fabricante', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[35].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[36]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[36].'1', 'Vida Util CHS', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[36].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[37]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[37].'1', 'Garantia', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[37].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[38]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[38].'1', 'Ext. Garantia', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[38].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[39]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[39].'1', 'Fech. Vencimiento', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[39].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[40]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[40].'1', 'Nombre Proveedor', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[40].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[41]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[41].'1', 'Contacto', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[41].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[42]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[42].'1', 'Telefono', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[42].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[43]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[43].'1', 'Doc. Recibida', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[43].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[44]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[44].'1', 'Accesorios', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[44].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[45]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[45].'1', 'Correo', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[45].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[46]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[46].'1', 'Consumibles', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[46].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[62]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[62].'1', 'Link', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[62].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[63]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[63].'1', 'siga_activos_fch_recepcion_equipo', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[63].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[64]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[64].'1', 'siga_activos_fch_operacion', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[64].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[65]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[65].'1', 'siga_activos_condicion_recepcion', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[65].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	

//Datos Proveedor
if($Check_Seleccionados[47]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[47].'1', 'Centro de Costos', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[47].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[48]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[48].'1', 'No. Capex', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[48].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[49]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[49].'1', 'Prorrateo', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[49].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[50]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[50].'1', 'Participa Depreciacion', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[50].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[51]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[51].'1', 'Fecha Inicio Depr.', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[51].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[52]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[52].'1', 'Cuenta Cont. Act.', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[52].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[53]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[53].'1', 'Cuenta Cont. Act. B10', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[53].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[54]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[54].'1', 'Cuenta Cont. Result.', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[54].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[55]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[55].'1', 'Cuenta Cont. Result. B10', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[55].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
if($Check_Seleccionados[56]!="0"){ $objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[56].'1', 'Cuenta Cont. Dep.', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[56].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[57]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[57].'1', 'Cuenta Cont. Dep. B10', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[57].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	

if($Check_Seleccionados[58]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[58].'1', 'Fecha Alta', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[58].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[59]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[59].'1', 'Usuario Registro', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[59].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[60]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[60].'1', 'Frecuencia', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[60].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	
if($Check_Seleccionados[61]!="0"){$objPHPExcel->getActiveSheet()->SetCellValue(''.$Check_Seleccionados[61].'1', 'Interno/Externo', PHPExcel_Cell_DataType::TYPE_STRING);	$objPHPExcel->getActiveSheet()->getStyle(''.$Check_Seleccionados[61].'1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}	

	 
if (!$proveedor->error()){
	if ($proveedor->rows($proveedor->stmt) > 0) {
		$contador = 0;
		$i=2; //celda inicial en la cual empezara a realizar el barrido de la grilla de excel
		while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
			$ParticipaPre="";
			$ParticipaSeguros="";
			$ParticipaCertificacion="";
			if($row["ParticipaPre"]==0){$ParticipaPre="NO";}else{if($row["ParticipaPre"]==1){$ParticipaPre="SI";}}
			if($row["ParticipaSeguros"]==0){$ParticipaSeguros="NO";}else{if($row["ParticipaSeguros"]==1){$ParticipaSeguros="SI";}}
			if($row["ParticipaCertificacion"]==0){$ParticipaCertificacion="NO";}else{if($row["ParticipaCertificacion"]==1){$ParticipaCertificacion="SI";}}

			if($row["Link"]==''){
				$link ='S/D';
			}else{
				$link= '=Hyperlink("'.$row["Link"].'","Link")';
			}
		
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0);
      if($Check_Seleccionados[0]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[0])->setWidth(14); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[0].''.$i.'', rtrim(ltrim($row["AF_BC"])));}
			if($Check_Seleccionados[1]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[1])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[1].''.$i.'', rtrim(ltrim($row["Nombre_Activo"])));}
			if($Check_Seleccionados[2]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[2])->setWidth(10); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[2].''.$i.'', rtrim(ltrim($row["Area"])));}
			if($Check_Seleccionados[3]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[3])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[3].''.$i.'', rtrim(ltrim($row["UbicacionPrimaria"])));}
			if($Check_Seleccionados[4]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[4])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[4].''.$i.'', rtrim(ltrim($row["UbicacionSecundaria"])));}
			if($Check_Seleccionados[5]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[5])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[5].''.$i.'', rtrim(ltrim($row["Especifica"])));}
			if($Check_Seleccionados[6]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[6])->setWidth(35); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[6].''.$i.'', rtrim(ltrim($row["DescLarga"])));}
			if($Check_Seleccionados[7]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[7])->setWidth(35); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[7].''.$i.'', rtrim(ltrim($row["DescCorta"])));}
			if($Check_Seleccionados[8]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[8])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[8].''.$i.'', rtrim(ltrim($row["Motivo_Alta"])));}
			if($Check_Seleccionados[9]!="0") {$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[9])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[9].''.$i.'', rtrim(ltrim($row["Propiedad"])));}
			if($Check_Seleccionados[10]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[10])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[10].''.$i.'', rtrim(ltrim($row["Clasificacion"])));}
			if($Check_Seleccionados[11]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[11])->setWidth(15); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[11].''.$i.'', rtrim(ltrim($row["Familia"])));}
			if($Check_Seleccionados[12]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[12])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[12].''.$i.'', rtrim(ltrim($row["Subfamilia"])));}
			if($Check_Seleccionados[13]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[13])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[13].''.$i.'', rtrim(ltrim($row["Marca"])));}
			if($Check_Seleccionados[14]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[14])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[14].''.$i.'', rtrim(ltrim($row["Modelo"])));}
			if($Check_Seleccionados[15]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[15])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[15].''.$i.'', rtrim(ltrim($row["NumSerie"])));}
			if($Check_Seleccionados[16]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[16])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[16].''.$i.'', rtrim(ltrim($row["TipoActivo"])));}
			if($Check_Seleccionados[17]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[17])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[17].''.$i.'', rtrim(ltrim($ParticipaPre)));}
			if($Check_Seleccionados[18]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[18])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[18].''.$i.'', rtrim(ltrim($ParticipaSeguros)));}
			if($Check_Seleccionados[19]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[19])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[19].''.$i.'', rtrim(ltrim($row["ImporteSeguros"])));}
			if($Check_Seleccionados[20]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[20])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[20].''.$i.'', rtrim(ltrim($ParticipaCertificacion)));}
			if($Check_Seleccionados[21]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[21])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[21].''.$i.'', rtrim(ltrim($row["Num_Empleado"])));}
			if($Check_Seleccionados[22]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[22])->setWidth(40); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[22].''.$i.'', rtrim(ltrim($row["Nombre_Completo"])));}
			if($Check_Seleccionados[23]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[23])->setWidth(14); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[23].''.$i.'', rtrim(ltrim($row["Tipo_Vale"])));}
			if($Check_Seleccionados[24]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[24])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[24].''.$i.'', rtrim(ltrim($row["Garantia"])));}
			if($Check_Seleccionados[25]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[25])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[25].''.$i.'', rtrim(ltrim($row["ExtGarantia"])));}
			if($Check_Seleccionados[26]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[26])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[26].''.$i.'', rtrim(ltrim($row["Departamento"])));}
			//Datos Proveedor
			if($Check_Seleccionados[27]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[27])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[27].''.$i.'', rtrim(ltrim($row["NumOrdenCompra"])));}
			if($Check_Seleccionados[28]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[28])->setWidth(10); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[28].''.$i.'', rtrim(ltrim($row["NumFactura"])));}
			if($Check_Seleccionados[29]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[29])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[29].''.$i.'', rtrim(ltrim($row["FechaFactura"])));}
			if($Check_Seleccionados[30]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[30])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[30].''.$i.'', rtrim(ltrim($row["UUID"])));}
			if($Check_Seleccionados[31]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[31])->setWidth(35); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[31].''.$i.'', rtrim(ltrim($row["Folio_Fiscal"])));}
			if($Check_Seleccionados[32]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[32])->setWidth(35); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[32].''.$i.'', rtrim(ltrim($row["MontoFactura"])));}
			if($Check_Seleccionados[33]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[33])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[33].''.$i.'', rtrim(ltrim($row["Monto_F"])));}
			// if($Check_Seleccionados[32]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[32])->setWidth(35); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[32].''.$i.'', rtrim(ltrim($row["Monto_F"])));}
			// if($Check_Seleccionados[33]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[33])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[33].''.$i.'', rtrim(ltrim($row["MontoFactura"])));}

			
			if($Check_Seleccionados[34]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[34])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[34].''.$i.'', rtrim(ltrim($row["NumContrato"])));}
			if($Check_Seleccionados[35]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[35])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[35].''.$i.'', rtrim(ltrim($row["VidaUtilFabricante"])));}
			if($Check_Seleccionados[36]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[36])->setWidth(15); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[36].''.$i.'', rtrim(ltrim($row["VidaUtilCHS"])));}
			if($Check_Seleccionados[37]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[37])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[37].''.$i.'', rtrim(ltrim($row["Garantia_P"])));}
			if($Check_Seleccionados[38]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[38])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[38].''.$i.'', rtrim(ltrim($row["ExtGarantia_P"])));}
			if($Check_Seleccionados[39]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[39])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[39].''.$i.'', rtrim(ltrim($row["Fecha_Vencimiento"])));}
			if($Check_Seleccionados[40]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[40])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[40].''.$i.'', rtrim(ltrim($row["NombreProveedor"])));}
			if($Check_Seleccionados[41]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[41])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[41].''.$i.'', rtrim(ltrim($row["Contacto"])));}
			if($Check_Seleccionados[42]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[42])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[42].''.$i.'', rtrim(ltrim($row["Telefono"])));}
			if($Check_Seleccionados[43]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[43])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[43].''.$i.'', rtrim(ltrim($row["DocRecibida"])));}
			if($Check_Seleccionados[44]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[44])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[44].''.$i.'', rtrim(ltrim($row["Accesorios"])));}
			if($Check_Seleccionados[45]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[45])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[45].''.$i.'', rtrim(ltrim($row["Correo"])));}
			if($Check_Seleccionados[46]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[46])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[46].''.$i.'', rtrim(ltrim($row["Consumibles"])));}
			if($Check_Seleccionados[62]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[62])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[62].''.$i.'', rtrim(ltrim($link)));}
			
			if($Check_Seleccionados[63]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[63])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[63].''.$i.'', rtrim(ltrim($row["siga_activos_fch_recepcion_equipo"])));}
			if($Check_Seleccionados[64]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[64])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[64].''.$i.'', rtrim(ltrim($row["siga_activos_fch_operacion"])));}
			if($Check_Seleccionados[65]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[65])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[65].''.$i.'', rtrim(ltrim($row["siga_activos_condicion_recepcion"])));}
			
			//Datos Contables
			if($Check_Seleccionados[47]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[47])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[47].''.$i.'', rtrim(ltrim($row["Centro_Costos"])));}
			if($Check_Seleccionados[48]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[48])->setWidth(10); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[48].''.$i.'', rtrim(ltrim($row["No_Capex"])));}
			if($Check_Seleccionados[49]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[49])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[49].''.$i.'', rtrim(ltrim($row["Prorrateo"])));}
			if($Check_Seleccionados[50]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[50])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[50].''.$i.'', rtrim(ltrim($row["Participa_Depreciacion"])));}
			if($Check_Seleccionados[51]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[51])->setWidth(35); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[51].''.$i.'', rtrim(ltrim($row["Fecha_Inicio_Depr"])));}
			if($Check_Seleccionados[52]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[52])->setWidth(35); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[52].''.$i.'', rtrim(ltrim($row["Cuent_Cont_Act"])));}
			if($Check_Seleccionados[53]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[53])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[53].''.$i.'', rtrim(ltrim($row["Cuent_Cont_Act_B10"])));}
			if($Check_Seleccionados[54]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[54])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[54].''.$i.'', rtrim(ltrim($row["Cuent_Cont_Result"])));}
			if($Check_Seleccionados[55]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[55])->setWidth(25); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[55].''.$i.'', rtrim(ltrim($row["Cuent_Cont_Result_B10"])));}
			if($Check_Seleccionados[56]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[56])->setWidth(15); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[56].''.$i.'', rtrim(ltrim($row["Cuent_Cont_Dep"])));}
			if($Check_Seleccionados[57]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[57])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[57].''.$i.'', rtrim(ltrim($row["Cuent_Cont_Dep_B10"])));}
			
			if($Check_Seleccionados[58]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[58])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[58].''.$i.'', rtrim(ltrim($row["Fech_Inser"])));}
			if($Check_Seleccionados[59]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[59])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[59].''.$i.'', rtrim(ltrim($row["Usuario_Registro"])));}
			$Frecuencia="NO ASIGNADO";if($row["Frecuencia"]!=NULL){$Frecuencia=$row["Frecuencia"];}
			if($Check_Seleccionados[60]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[60])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[60].''.$i.'', rtrim(ltrim($Frecuencia)));}
			$Realiza="NO ASIGNADO"; if($row["Realiza"]!=NULL){if($row["Realiza"]==0){$Realiza="Interno";}else{$Realiza="Externo";}}
			if($Check_Seleccionados[61]!="0"){$objPHPExcel->getActiveSheet()->getColumnDimension($Check_Seleccionados[61])->setWidth(20); $objPHPExcel->getActiveSheet()->setCellValue(''.$Check_Seleccionados[61].''.$i.'', rtrim(ltrim($Realiza)));}
			
			$contador = $contador+1;
			$i++;
			
		}
	}	
}else{
	echo "error";
}							 

$proveedor->close();

// Add some data
//$objPHPExcel->setActiveSheetIndex(0)
//            ->setCellValue('A1', 'Hello')
//            ->setCellValue('B2', 'world!')
//            ->setCellValue('C1', 'Hello')
//            ->setCellValue('D2', 'world!');
//
// Miscellaneous glyphs, UTF-8
//$objPHPExcel->setActiveSheetIndex(0)
//            ->setCellValue('A4', 'Miscellaneous glyphs')
//            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Inventario');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Inventario Siga.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
