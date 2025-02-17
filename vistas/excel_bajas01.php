<?php 
@$Id_Area=$_POST["Id_Area"];
@$Fech_Inicial=$_POST["Fech_Inicial"];
@$estatus=$_POST["estatus"];
@$Tab=$_POST["Tab"];
@$perfil=$_POST["perfil"];
@$Fech_Final=$_POST["Fech_Final"];


  // $ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];

 	// if (strpos($ip, '192.168') !== false) {
	// 	$rutaip = "https://apps2.hospitalsatelite.com";
	// }
	// else
	// {
	// 	$rutaip = "https://apps2.hospitalsatelite.com";
	// }
	//$rutaip = "https://apps2.hospitalsatelite.com";

	$url = "https://apps2.hospitalsatelite.com/siga/fachadas/activos/siga_activos/Siga_activosFacade.Class.php";
  $cliente = curl_init();
	curl_setopt($cliente, CURLOPT_URL, $url);
	curl_setopt($cliente, CURLOPT_POST, 1);
	curl_setopt($cliente, CURLOPT_POSTFIELDS, "start=0&length=100000&Fech_Inicial=".$Fech_Inicial."&Id_Area=".$Id_Area."&estatus=".$estatus."&Tab=".$Tab."&perfil=".$perfil."&Fech_Final=".$Fech_Final."&draw=1");
	curl_setopt($cliente, CURLOPT_RETURNTRANSFER, 1);
	$Resp_cont_enc_m=curl_exec($cliente);
	curl_close($cliente);
	//echo $url;
	$Resp_cont_enc_m=json_decode($Resp_cont_enc_m, true);
	//print_r($Resp_cont_enc_m);
	
	
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../PHPExcel/PHPExcel.php';

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

 $objPHPExcel->getActiveSheet()->setCellValue('A1', "AF/BC");$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setWidth(10);
 $objPHPExcel->getActiveSheet()->setCellValue('B1', "Estatus de Baja");$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth(15);
 $objPHPExcel->getActiveSheet()->setCellValue('C1', "Nombre del activo");$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth(40);
 $objPHPExcel->getActiveSheet()->setCellValue('D1', "Área");$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setWidth(15);
 $objPHPExcel->getActiveSheet()->setCellValue('E1', "Clasificación");$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("E")->setWidth(15);
 $objPHPExcel->getActiveSheet()->setCellValue('F1', "Marca");$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("F")->setWidth(15);
 $objPHPExcel->getActiveSheet()->setCellValue('G1', "Modelo");$objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("G")->setWidth(15);
 $objPHPExcel->getActiveSheet()->setCellValue('H1', "Número de serie");$objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("H")->setWidth(15);
 $objPHPExcel->getActiveSheet()->setCellValue('I1', "Propiedad");$objPHPExcel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("I")->setWidth(15);
 $objPHPExcel->getActiveSheet()->setCellValue('J1', "Clase");$objPHPExcel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("J")->setWidth(15);
 $objPHPExcel->getActiveSheet()->setCellValue('K1', "Descripción");$objPHPExcel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("K")->setWidth(40);
 $objPHPExcel->getActiveSheet()->setCellValue('L1', "Ubicación Primaria");$objPHPExcel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("L")->setWidth(20);
 $objPHPExcel->getActiveSheet()->setCellValue('M1', "Ubicación Secundaria");$objPHPExcel->getActiveSheet()->getStyle('M1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);	$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setWidth(20);
 $objPHPExcel->getActiveSheet()->setCellValue('N1', "Fecha Alta Activo");$objPHPExcel->getActiveSheet()->getStyle('N1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("N")->setWidth(20);

 $objPHPExcel->getActiveSheet()->setCellValue('O1', "Monto Factura");$objPHPExcel->getActiveSheet()->getStyle('O1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("O")->setWidth(20);
 $objPHPExcel->getActiveSheet()->setCellValue('P1', "Usuario Solicitante Baja");$objPHPExcel->getActiveSheet()->getStyle('P1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("P")->setWidth(25);
 $objPHPExcel->getActiveSheet()->setCellValue('Q1', "Fecha Baja Usuario Solicitante");$objPHPExcel->getActiveSheet()->getStyle('Q1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("Q")->setWidth(25);
 $objPHPExcel->getActiveSheet()->setCellValue('R1', "Usuario Responsable Resguardo");$objPHPExcel->getActiveSheet()->getStyle('R1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("R")->setWidth(25);
 $objPHPExcel->getActiveSheet()->setCellValue('S1', "Fecha Responsable Resguardo");$objPHPExcel->getActiveSheet()->getStyle('S1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("S")->setWidth(25);
 $objPHPExcel->getActiveSheet()->setCellValue('T1', "Fecha Baja Dirección Financiera");$objPHPExcel->getActiveSheet()->getStyle('T1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("T")->setWidth(25);
 $objPHPExcel->getActiveSheet()->setCellValue('U1', "Fecha Baja Contabilidad");$objPHPExcel->getActiveSheet()->getStyle('U1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("U")->setWidth(25);
 $objPHPExcel->getActiveSheet()->setCellValue('V1', "Motivo Baja");$objPHPExcel->getActiveSheet()->getStyle('V1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("V")->setWidth(25);
 $objPHPExcel->getActiveSheet()->setCellValue('W1', "Comentarios");$objPHPExcel->getActiveSheet()->getStyle('W1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);	$objPHPExcel->getActiveSheet()->getColumnDimension("W")->setWidth(40);
 $objPHPExcel->getActiveSheet()->setCellValue('X1', "Destino Final");$objPHPExcel->getActiveSheet()->getStyle('X1')->getFont()->setBold(true)->setSize(13)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); $objPHPExcel->getActiveSheet()->getColumnDimension("X")->setWidth(20);

 $Cont=2;
 if($Resp_cont_enc_m['recordsTotal']>0){
	for($i=0;$i<$Resp_cont_enc_m['recordsTotal'];$i++){
		$objPHPExcel->getActiveSheet()->setCellValue('A'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['AF_BC'])));$objPHPExcel->getActiveSheet()->getStyle('A'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		if($Resp_cont_enc_m['data'][$i]['WorkFlowPaso']!=null){
			$objPHPExcel->getActiveSheet()->setCellValue('B'. $Cont, 'Paso '.$Resp_cont_enc_m['data'][$i]['WorkFlowPaso'].' de 5');$objPHPExcel->getActiveSheet()->getStyle('B'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		}else{
			$objPHPExcel->getActiveSheet()->setCellValue('B'. $Cont, 'Paso 1 de 5');$objPHPExcel->getActiveSheet()->getStyle('B'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		}
		
		$Monto_Factura="";
		if(rtrim(ltrim($Resp_cont_enc_m['data'][$i]['MontoFactura']))!=NULL){
			if(rtrim(ltrim($Resp_cont_enc_m['data'][$i]['MontoFactura']))!=""){
				$Monto_Factura='$ '.rtrim(ltrim($Resp_cont_enc_m['data'][$i]['MontoFactura']));
			}
		}
		$objPHPExcel->getActiveSheet()->setCellValue('C'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Nombre_Activo'])));$objPHPExcel->getActiveSheet()->getStyle('C'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('D'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Area'])));$objPHPExcel->getActiveSheet()->getStyle('D'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('E'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Clasificacion'])));$objPHPExcel->getActiveSheet()->getStyle('E'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('F'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Marca'])));$objPHPExcel->getActiveSheet()->getStyle('F'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('G'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Modelo'])));$objPHPExcel->getActiveSheet()->getStyle('G'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('H'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['NumSerie'])));$objPHPExcel->getActiveSheet()->getStyle('H'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('I'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Propiedad'])));$objPHPExcel->getActiveSheet()->getStyle('I'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('J'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['TipoActivo'])));$objPHPExcel->getActiveSheet()->getStyle('J'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('K'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['DescCorta'])));$objPHPExcel->getActiveSheet()->getStyle('K'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('L'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['UbicacionPrimaria'])));$objPHPExcel->getActiveSheet()->getStyle('L'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('M'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['UbicacionSecundaria'])));$objPHPExcel->getActiveSheet()->getStyle('M'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('N'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['FechaAlta'])));$objPHPExcel->getActiveSheet()->getStyle('N'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('O'. $Cont, $Monto_Factura);$objPHPExcel->getActiveSheet()->getStyle('O'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('P'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Usuario_Solicitante_Baja'])));$objPHPExcel->getActiveSheet()->getStyle('P'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('Q'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['fecha_baja_usr_solicitante'])));$objPHPExcel->getActiveSheet()->getStyle('Q'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('R'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Usuario_Responsable_Baja'])));$objPHPExcel->getActiveSheet()->getStyle('R'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('S'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['fecha_baja_usr_responsable'])));$objPHPExcel->getActiveSheet()->getStyle('S'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('T'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['fecha_baja_dir_financiera'])));$objPHPExcel->getActiveSheet()->getStyle('T'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('U'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['fecha_baja_usr_contabilidad'])));$objPHPExcel->getActiveSheet()->getStyle('U'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('V'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Motivo_Baja'])));$objPHPExcel->getActiveSheet()->getStyle('V'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('W'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Comentarios'])));$objPHPExcel->getActiveSheet()->getStyle('W'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$objPHPExcel->getActiveSheet()->setCellValue('X'. $Cont, rtrim(ltrim($Resp_cont_enc_m['data'][$i]['Destino_Final'])));$objPHPExcel->getActiveSheet()->getStyle('X'. $Cont)->getFont()->setBold(false)->setSize(12)->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
				
		$Cont=$Cont+1;
	}
 }
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('BajasSIGA');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="BajasSIGA.xls"');
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
